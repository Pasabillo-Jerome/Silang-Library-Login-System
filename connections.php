<?php

$connections = mysqli_connect("localhost","root","","mydb");
if(mysqli_connect_errno()){
echo "failed to connect to MySQL: " . mysqli_connect_error();

}

?>