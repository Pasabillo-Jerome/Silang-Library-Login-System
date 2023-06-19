<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="one.css">
	<link rel="stylesheet" href="two.css">

	<title>CvSu Silang Libary LogIn System</title>
</head>
<body>
<?php

	$user_id = $_REQUEST["id"];

	include("connections.php");

	$query_delete = mysqli_query($connections, "SELECT * FROM mytbll WHERE id = '$user_id' ");

		while($row_delete = mysqli_fetch_assoc($query_delete)){

		$user_id = $row_delete["id"];
		$db_sname = $row_delete["sname"]	;
		$db_course = $row_delete["course"];	
	}
?>
	<form method="POST" action="Delete_Now.php">
		<h3>Welcome to CvSU Silang Library
			<span>Please Fill In the Following:</span></h3>

		<input type = "hidden" name = "user_id" value = "<?php echo $user_id; ?>">
		
		<label for="new_sname">Student Name</label>
		<input type="text" name ="new_sname" value = "<?php echo $db_sname; ?>">

		<label for="new_course">Course</label>
		<input type="text" name="new_course" value ="<?php echo $db_course; ?>"><br>

		<input id="button" type="submit" value="Delete">
		<input id="button" type="button" value="Cancel" onclick="location.href='main.php';">
	</form>

</body>
</html>









