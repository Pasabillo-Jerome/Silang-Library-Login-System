<?php

include("connections.php");

$user_id = $_POST["user_id"];

$new_sname = $_POST["new_sname"];
$new_course = $_POST["new_course"];

mysqli_query($connections, "UPDATE mytbll SET sname='$new_sname', course='$new_course' WHERE id='$user_id'");

echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='main.php';</script>";
?>