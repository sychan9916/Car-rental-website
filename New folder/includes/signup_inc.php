<?php 
if(isset($_POST['submit']))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$phonenumber=$_POST["phonenumber"];
	$dob=$_POST["dob"];

	require_once "dbh_inc.php";
	require_once 'function_inc.php';



	if(emptyInputSignup($username,$password,$email,$phonenumber,$dob) !==false)
	{
		header("location:../signup.php?error=emptyinputs");
		exit();
	}	
	

	if(invalidUid($username) !==false)
	{
		header("location:../signup.php?error=invalidUid");
		exit();
	}			



		if(invalidEmail($email) !==false)
	{
		header("location:../signup.php?error=invalidEmail");
		exit();
	}

		if(invalidphonenumber($phonenumber) !==false)
	{
		header("location:../signup.php?error=invalidphonenumber");
		exit();
	}

	if(uidExits($conn, $username, $email) !==false)
	{
		header("location:../signup.php?error=taken");
		exit();
	}

	createUser($conn,$username,$password,$email,$phonenumber,$dob);
	

}

else {
	header ("location:../signup.php");
}
?>