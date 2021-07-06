<?php


	function emptyInputSignup($username,$password,$email,$phonenumber,$dob)
	{
		$result;
		if (empty($username) || empty($password) || empty($email) || empty($phonenumber) ||empty($dob)) 
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		return $result;
	}

	function invalidUid($username)
	{
		$result;
		if (preg_match("/^[a-zA-Z0-9]*$ /", $username)) 
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
		
		return $result;
	}

	function invalidEmail($email)
	{
		$result;
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
			return $result;
	}

	function invalidphonenumber($phonenumber)
	{
		$result;
		if (!preg_match("/^[0-9]/", $phonenumber)) 
		{
			$result = true;
		}
		else
		{
			$result = false;
		}
			return $result;
	}



	function uidExits($conn, $username, $email)
	{
		$sql = "SELECT * FROM users WHERE username = ? OR email=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("location:../signup.php?error=stmtfailed");
		exit();
		}

		mysqli_stmt_bind_param($stmt, "ss",$username, $email);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData))
		{
			return $row;
		}
		else
		{
			$result = false;
			return $result;
		}

		mysqli_stmnt_close($stmt);
	}

function createUser($conn,$username,$password,$email,$phonenumber,$dob)
	{
		$sql = "INSERT INTO users (username,password,email,phone,dob) VALUES (?,?,?,?,?);" ;
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("location:../signup.php?error=stmtfailed");
		exit();
		}

		$hasedPwd = password_hash($password, PASSWORD_DEFAULT);

		mysqli_stmt_bind_param($stmt, "sssss",$username,$hasedPwd,$email,$phonenumber,$dob);
		mysqli_stmt_execute($stmt);

		mysqli_stmt_close($stmt);
		header("location:../signup.php?error=none");
		exit();
	}


?>