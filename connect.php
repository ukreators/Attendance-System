<?php

$user='root';
$host='localhost';
$db='attendance_system2';

$conn=mysqli_connect($host,$user,'',$db);
if(!$conn){
    echo"Failed to connect";
}

?>