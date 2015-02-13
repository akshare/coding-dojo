<?php	
	session_start();

	require_once('new-connection.php');

	function sanitize_query($post){
		foreach($post as $key => $value){
			$post[$key] = escape_this_string(($value));
		}
		return $post;
	}

	if(isset($_GET['action']) && ($_GET['action'] == "logout")){
		session_unset();
		$_SESSION['error'] = "You have been logged out!";
		header('Location: index.php');
		exit();
	}

	//call function to authentcate user
	if(isset($_POST['login']) && $_POST['login'] == "login"){
		login_user($_POST);
	}

	//call function to post a new message
	if(isset($_POST['new_message']) && ($_POST['new_message'] == "new_message") && (isset($_SESSION['logged_in'])) && ($_SESSION['logged_in'] == "TRUE")){
		post_message($_POST);
	}

	//call function to post a new comment
	if(isset($_POST['new_comment']) && ($_POST['new_comment'] == "new_comment") && (isset($_SESSION['logged_in'])) && ($_SESSION['logged_in'] == "TRUE")){
		post_comment($_POST);
	}

	//function to authenticate user
	function login_user($post){
		sanitize_query($post);
		$query_login = "SELECT id, first_name, last_name FROM users WHERE email = '{$post['email']}' AND password = '{$post['password']}'";
		$login = fetch_record($query_login);
		if(count($login) > 0){
			$_SESSION['logged_in'] = "TRUE";
			$_SESSION['user_id'] = $login['id'];
			$_SESSION['first_name'] = $login['first_name'];
			$_SESSION['last_name'] = $login['last_name'];
			header('Location: index.php');
			exit();
		}
		else{
			$_SESSION['error'] = "Login Failed!";
			header('Location: index.php');
			exit();
		}
	}

	//call function to delete message
	if(isset($_POST['action']) && ($_POST['action'] == "delete_message") && (!empty($_POST['message_id']))){
		delete_message_comments($_POST['message_id']);
	}

	//function to delete message and comments
	function delete_message_comments($message_id){
		$query_delete_comments = "DELETE FROM comments WHERE message_id = $message_id"; 
		$query_delete_messages = "DELETE FROM messages WHERE id = $message_id"; 
		run_mysql_query($query_delete_comments);
		run_mysql_query($query_delete_messages);
		$_SESSION['error'] = "Message and comments for message ID: ". $message_id ." has been deleted!";
		header('Location: index.php');
		exit();
	}

	//function to post a new message
	function post_message($post){
		sanitize_query($post);
		$query_insert = "INSERT INTO messages(`message`, `created_at`, `updated_at`, `user_id`) values('{$post['message']}', NOW(), NOW(), {$_SESSION['user_id']})";
		run_mysql_query($query_insert);
		header('Location: index.php');
		exit();
	}

	//function to post a new comment
	function post_comment($post){
		sanitize_query($post);
		$query_insert = "INSERT INTO comments(`comment`, `created_at`, `updated_at`, `message_id`, `user_id`) values('{$post['comment']}', NOW(), NOW(), {$post['message_id']}, {$_SESSION['user_id']})";
		run_mysql_query($query_insert);
		header('Location: index.php');
		exit();
	}

	//function to get all messages
	function get_messages(){
		$messages = array();
		$query_get_records = "SELECT users.id, users.first_name, users.last_name, DATE_FORMAT(messages.created_at, '%M %D %Y') as message_date_updated, messages.message, messages.id as message_id FROM messages 
		LEFT JOIN users on messages.user_id = users.id ORDER BY messages.created_at DESC";
		$get_messages = fetch_all($query_get_records);
		return $get_messages;
	}

	//function to show all messages properly formatted
	function show_messages_comments_formatted(){
		$show_all_messages = get_messages();
		foreach($show_all_messages as $key => $value){
			echo '<div class="message_wrapper">';

			if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == "TRUE") && ($_SESSION['user_id'] == $show_all_messages[$key]['id'])){
				$query_check_time = "SELECT TIMESTAMPDIFF(MINUTE, `created_at`, NOW()) as time_difference FROM `messages` WHERE id = {$show_all_messages[$key]['message_id']}";
				$get_time_difference = fetch_record($query_check_time);
				if($get_time_difference['time_difference'] > 30){
				echo '
					<form action="functions.php" method="POST">
						<input type="hidden" name="message_id" value="'. $show_all_messages[$key]['message_id'] . '">
						<button class="delete_message" type="submit" value="delete_message" name="action">Delete message</button>
					</form>
				';
				}
				else{
					echo "<p>You cannot delete this message until 30 mins have passed!</p>";
				}
			}

			foreach($value as $sub_key => $sub_value){
				echo '<div class="'. $sub_key .'">' . $sub_value . '</div>';
			}
			echo '<div class="comments_wrapper">';
			show_comments_formatted($show_all_messages[$key]['message_id']);
			echo '</div>';
			echo '</div>';
		}
	}

	//function to get all comments
	function get_comments($message_id){
		$comments = array();
		if(isset($message_id)){
			$query_get_records = "SELECT users.id, users.first_name, users.last_name, DATE_FORMAT(comments.created_at, '%M %D %Y') as comment_date_updated, comments.comment, 
			comments.id as comment_id FROM comments 
			LEFT JOIN messages on comments.message_id = messages.id 
			LEFT JOIN users on comments.user_id = users.id WHERE messages.id = $message_id;";
			$get_comments = fetch_all($query_get_records);
		}
		return $get_comments;
	}

	//function to show all comments properly formatted
	function show_comments_formatted($message_id){
		$show_all_comments = get_comments($message_id);
		if(count($show_all_comments > 0)){
			foreach($show_all_comments as $key => $value){
				foreach($value as $sub_key => $sub_value){
					echo '<div class="'. $sub_key .'">' . $sub_value . '</div>';
				}
			}
		}
		else{
			echo "No Comments...";
		}
		if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == "TRUE"){
			echo '
				<form action="functions.php" method="POST">
					<textarea id="comment" name="comment" placeholder="Enter your comment"></textarea>
					<input type="hidden" name="message_id" value="'. $message_id . '">
					<button type="submit" value="new_comment" name="new_comment">Post Comment</button>
					<div style="clear:both"></div>
				</form>
			';
		}
	}
?>