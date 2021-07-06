<?php
//include auth_session.php file on all user panel pages
include("auth_season.php");
include_once("db.php");
?>





<?php
$id= $_GET['id'];
	if(isset($_POST["upload"]))
	{
		$target = "a/".basename($_FILES['image']['name']);
		
		$dbs =mysqli_connect("localhost", "root", "", "project");
		$image = $_FILES['image']['name'];
		$text = $_POST['extra'];
		$username= $_SESSION['username'];
		$carbrand=$_POST['brand'];
		$carname=$_POST['name'];
		$carseat=$_POST['seat'];
		$price=$_POST['prices'];
		$date_time=date('Y-m-d H:i:s');
		$sql = "update list set CAR_NAME = '$carname' , image= '$image',CAR_NAME='$carname', CAR_BRAND='$carbrand',CAR_SEAT='$carseat',price='$price', extra='$text'where LIST_ID='$id'";
		$result= mysqli_query($dbs,$sql);
		
		
 header("Location: mylist.php");
	}
		
?>