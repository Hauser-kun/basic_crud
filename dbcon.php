<?php

session_start();
$conn=mysqli_connect('localhost','root','','crud1');
if(!$conn){
    die('Connection fail'.mysqli_connect_errno());
}
?>