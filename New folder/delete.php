<?php
//include auth_session.php file on all user panel pages
include("auth_season.php");
include_once("db.php");

$id=$_GET['id'];
$username=$_SESSION['username'];
$dbs =mysqli_connect("localhost", "root", "", "project");
$sql = "delete from list where LIST_ID=$id";
$result = mysqli_query($dbs,$sql);

header("Location: mylist.php"); 
?>