<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="one.css">
	<link rel="stylesheet" href="two.css">

    <title>CvSu Silang Libary LogIn System</title>
</head>
<body>
<?php

	$user_id = $_REQUEST["id"];
	$user_id;

		include("connections.php");

	$get_record = mysqli_query($connections, "SELECT * FROM mytbll WHERE id='$user_id'");

		while($row_edit = mysqli_fetch_assoc($get_record)){
			$db_sname = $row_edit["sname"];
			$db_course = $row_edit["course"];
		}
?>
	<form method="POST" action="Update_Record.php" class="fm">
		<h3>Welcome to CvSU Silang Library
			<span>Please Fill In the Following:</span></h3>

		<input type = "hidden" name = "user_id" value = "<?php echo $user_id; ?>">
		
		<label for="new_sname">Student Name</label>
		<input type="text" name ="new_sname" value = "<?php echo $db_sname; ?>">
		
		<label for="new_course">Course</label>
		<input type="text" name="new_course" value ="<?php echo $db_course; ?>"><br>

		<input id="button" type="submit" value="Update">
	</form>
</body>
</html>