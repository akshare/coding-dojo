<html>
	<head>
		<title>AJAX - post, edit, delete</title>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<script>

		  $(document).ready(function(){  

		  	$.get('/notes/get_all_notes', {}, function(notes){
		  		$.each(notes, function(index, note){
		  			$("#notes_display").append(note);
		  		});
		  	}, "json");


			$('#form_add_note').submit(function(){

				alert("ADD INITIATED!");
			    
			    $.post( 
			      $('#form_add_note').attr('action'),
			      $('#form_add_note').serialize(),
			      function(output){
			        $('#notes_display').append(
			        	'<div id="id_'+output.note_id+'" class="notes_box">'+
				        	'<div class="delete">'+
								'<form id="form_delete_note" action="notes/delete" method="post">'+
									'<input type="hidden" value="'+output.note_id+'" name="id">'+
									'<input type="hidden" value="delete" name="action">'+
									'<input class="delete" type="submit" value="Delete">'+
								'</form>'+
							'</div>'+
							'<div class="notes">'+output.note+'</div>'+
							'<div note_id="'+output.note_id+'" class="description">'+output.note_description+'</div>'+
						'</div>');
			      }, 'json'
			    );
			    return false;
			});

			$('#notes_display').on('submit','#form_delete_note', function(){
			    
			    alert("DELETE INITIATED!");
			    
			    $.post( 
			      $('#form_delete_note').attr('action'),
			      $('#form_delete_note').serialize(),
			      function(delete_note){
			      	console.log(delete_note);
			        $('#id_'+delete_note.note_id).remove();
			    }, 'json'
			    );
			    return false;
			});

			$('#notes_display').on('submit','#form_edit_note', function(){
			   
			    alert("EDIT INITIATED!");
			   
			    $.post( 
			      $('#form_edit_note').attr('action'),
			      $('#form_edit_note').serialize(),
			      function(edit_notes){
			      	$.each(edit_notes, function(index, note){
		  			$("#notes_display").append(note);
		  			});
			    }, 'json'
			    );
			    return false;
			});

			$('#notes_display').on("click",".description",function(){
				var note_data = $(this).html();
				var note_id = $(this).attr('note_id');
				$(this).replaceWith("<form id='form_edit_blur_note' action='notes/edit' method='post'><input type='hidden' value='"+ note_id +"' name='id'><textarea id='active' name='description'>"+ note_data +"</textarea></form>");
				$('#active').focus();
			});

			/*$('#notes_display').on("focusout","textarea#active",function(){
				var note_data = $(this).html();
				$(this).replaceWith("<div class='description'>"+ note_data +"</div>");
			});*/

			$('#notes_display').on('blur','#form_edit_blur_note', function(){
			   
			    alert("EDIT INITIATED!");
			   
			    $.post( 
			      $('#form_edit_blur_note').attr('action'),
			      $('#form_edit_blur_note').serialize(),
			      function(edit_notes){
			      	$.each(edit_notes, function(index, note){
		  			$("#notes_display").append(note);
		  			});
			    }, 'json'
			    );
			    return false;
			});
		  	
		  	$('.notice').fadeOut(3000);

		  });
		</script>

		<style>
			#wrapper{
				width: 400px;
				margin: 0px auto;
			}

			input, textarea, .description{
				width: 350px;
			}

			textarea, .description{
				height: 50px;
			}

			.notes_box{
				border: solid 1px #cccccc;
				margin: 0px 0px 10px 0px;
				padding: 10px;
				width: 330px;
			}

			.notice{
				background-color: green;
				color: white;
			}

			.id{
				display: none;
			}

			.notes{
				font-weight: bold;
			}

			.delete{
				float: right;
				width: 50px;
			}
			.update{
				width: 330;
			}
		</style>

	</head>
	<body>
		<div id="wrapper">
			<div class="notice">
				<?= $notice; ?>
			</div>	
			<div id="notes_display">
				<?php /*
					$note_block = NULL; 

					foreach($notes as $key => $value)
					{
						$note_data = NULL; 
						foreach($value as $sub_key => $sub_value)
						{
							$note_data .= ($sub_key == "description") ? '
											<form id="form_update_note" action="notes/edit" method="post">
												<textarea class="update" name="description">'. $sub_value .'</textarea>
												<input type="hidden" value="'. $notes[$key]["id"] .'" name="id">
												<input class="update" type="submit" value="Update">
											</form>' : '<div class="'. $sub_key .'">' . $sub_value . '</div>';
						}
						$note_block .= '<div class="notes_box">
											<div class="delete">
												<form id="form_delete_note" action="notes/delete" method="post">
													<input type="hidden" value="'. $notes[$key]["id"] .'" name="id">
													<input type="hidden" value="delete" name="action">
													<input class="delete" type="submit" value="Delete">
												</form>
											</div>'. $note_data . 
										'</div>';
					}

					echo $note_block; */
				?>
			</div>
			<div id="form">
				<form id="form_add_note" action="notes/add" method="post">
					<p><input type="text" name="note" placeholder="Title"></p>
					<p><textarea name="description" placeholder="Description"></textarea></p>
					<input type="hidden" value="add_note" name="action">
					<p><input type="submit" value="submit"></p>
				</form>
			</div>
		</div>
	</body>
<html>