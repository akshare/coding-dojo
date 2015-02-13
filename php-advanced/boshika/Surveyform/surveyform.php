​<!DOCTYPE html>​
​<html lang="en">​
​<head>​
	<title>Survey Form</title>​
	<!--link rel="stylesheet" href="survey.css"-->​
​</head>
<body>
	<form action="test.php" method="POST">
		<label>Your Name: <input type='text' name='Name' placeholder='Name'></label>
		<label>Your Location: </label>
		<select name="Location">
			<option value="San Francisco">San Francsico</option>
			<option value="Mumbai">Mumbai</option>
			<option value="Lima">Lima</option>
		</select>
		<label>Favourite Language: </label>
		<select name="Language">
			<option value="Ruby">Ruby</option>
			<option value="Java">Java</option>
			<option value="C++">C++</option>
			<option value="C#">C#</option>
			<option value="JavaScript">JavaScript</option>
			<option value="NONE of the above">None of the above</option>
		</select>
		<label>Comment:</label>
		<textarea name="Description"></textarea>

		<input id ="submit" type="submit" value="submit">
	</form>
</body>
</html>
