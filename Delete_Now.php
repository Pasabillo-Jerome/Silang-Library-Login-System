<?php

include("connections.php");


$user_id = $_POST["user_id"];

mysqli_query($connections, "DELETE FROM mytbll WHERE id = '$user_id'");


echo "<script language='javascript'>alert('Record has been Deleted!')</script>";
echo "<script>window.location.href='main.php';</script>";

?>