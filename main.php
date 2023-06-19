<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="one.css">
    <link rel="stylesheet" href="two.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <title>CvSu Silang Libary LogIn System</title>
</head>
<style>
    .error{
        color: red;
    }
</style>
<body>


<?php

$sname = $course= "";
$snameErr = $courseErr ="";


if ($_SERVER ["REQUEST_METHOD"] == "POST"){
	
	
	if(empty($_POST["sname"])){
		$snameErr = "Student Name is required!";
	}else{
		$sname = $_POST["sname"];
	}
	
	
	if(empty($_POST["course"])){
		$courseErr = "Course is required!";
	
	}else{
	
	$course = $_POST["course"];

	}

    
}
?>


<div class="container-fluid  ">
    <div class="col">
    <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>">
    <h3>Welcome to CvSU Silang Library
            <span>Please Fill In the Following:</span>
        </h3>
        

        <label for="sname">Student Name</label>
        <input type="text" name="sname" value="<?php echo $sname; ?>">
        <span class="error"><?php echo $snameErr; ?></span> 

        <label for="course">Course</label>
        <input type="text" name="course" value="<?php echo $course; ?>">
        <span class="error"><?php echo $courseErr; ?></span>
        
        <input id="button" type="submit" name="check_in" value="Time In" >
        <input id="button" type="submit" name="check_out" value="Time Out" >


        
    </form>

    </div>

    
</div>
<hr>


<?php
include("connections.php");
if($sname && $course ){
	
    $query = mysqli_query($connections, "INSERT INTO mytbll(sname,course) VALUES('$sname','$course', )");

// Check if the form is submitted
if (isset($_POST['check_in']) || isset($_POST['check_out'])) {
    $sname = $_POST['sname'];
    
if (isset($_POST['check_in']) || isset($_POST['check_out'])) {
        $course = $_POST['course'];
        
    // Check if it's a check-in or check-out action
    if (isset($_POST['check_in'])) {
        // Perform check-in
        $sql = "INSERT INTO mytbll (sname,course, check_in_time) VALUES ('$sname','$course' , NOW())";
        if ($connections->query($sql) === true) {
            echo "Checked in successfully.";
            echo "<script>window.location.href='main.php';</script>";


        } else {
            echo "Error: " . $sql . "<br>" . $connections->error;
        }
    } elseif (isset($_POST['check_out'])) {
        // Perform check-out
        $sql = "UPDATE mytbll SET check_out_time = NOW() WHERE sname = '$sname' AND course = '$course' AND check_out_time IS NULL";
        if ($connections->query($sql) === true) {
            echo "Checked out successfully.";
            echo "<script>window.location.href='main.php';</script>";



        } else {
            echo "Error: " . $sql . "<br>" . $connections->error;

        }
    }
}
}

    
}
$view_query = mysqli_query($connections, "SELECT * FROM mytbll");
echo "<table>";
echo "
<tr>
<td><strong>STUDENT NAME</strong></td><br>
<td><strong>COURSE</strong></td><br>
<td><strong>IN</strong></td><br>
<td><strong>OUT</strong></td><br>
<td><strong>ACTION</strong></td>


</tr>
";

while($row = mysqli_fetch_assoc($view_query)){

$user_id = $row["id"];
$db_sname = $row["sname"];
$db_course = $row["course"];	
$db_check_in_time = $row["check_in_time"];	
$db_check_out_time = $row["check_out_time"];	


echo"
<tr>
<td>$db_sname</td>
<td>$db_course</td>
<td>$db_check_in_time</td>
<td>$db_check_out_time</td>


<td>
<a href='Edit.php?id=$user_id' <i class='fa fa-edit' style='font-size:24px;'></i></a>


<br/>
<br/>


<a href='ConfirmDelete.php?id=$user_id'<i class='fa fa-trash' aria-hidden='true' style='font-size:24px;'></i></a>

</td>
</tr>
";
	
}
echo "</table>";
// Close the database connection
$connections->close();

?>
</body>
</html>