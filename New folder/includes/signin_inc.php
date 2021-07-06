<?php 
if (isset($_POST['submit'])) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	require_once "dbh.inc.php";
	require_once "function.inc.php";


	if(emptyInputlogin($username,$password) !==false)
	{
		header("location:../signin.php?error=emptyinputs");
		exit();
	}	
	
	loginUser($conn,$username,$password);

	
}
else
{
	header("location:../signin.php");
		exit();
}
?>