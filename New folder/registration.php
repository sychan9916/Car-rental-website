<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
		$phone = stripslashes($_REQUEST['phone']);
		$phone    = mysqli_real_escape_string($con, $phone);

        $query    = "INSERT into `users` (username, password, email,phone)
                     VALUES ('$username', '$password', '$email', '$phone')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form' style='text-align:center'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form' style='text-align:center'>
                  <h3>Username is taken please try again .</h3><br/>
                  </div>";
        }
    } else {
?>

<?php
    }
?>

<div id='registercss'>

    <form class="form" action="" method="post" style=    'BORDER: SOLID;'
    'PADDING: 1%';>
        <h1 class="login-title">Registration</h1>
		<table id='register_table'>
		<tr><td>
        Username:</td><td> <input class='inputR'type="text" class="login-input" name="username" placeholder="Username" required /></td></tr>
       <tr><td> Email address:</td><td><input class='inputR'type="text" class="login-input" name="email" placeholder="Email Adress" required></td></tr>
       <tr><td> Password:</td><td><input class='inputR'type="password" class="login-input" name="password" id="password" placeholder="Password" required></td><td><input type="checkbox" onclick="showPassword()"></td></tr>
	   <tr><td> Confirm Password:</td><td><input class='inputR'type="password" class="login-input" id="confirm_password" name="confirmpassword" placeholder="Password" required> </td><td> <input type="checkbox" onclick="showPasswords()"></td></tr>
		<tr><td>Phone</td><td><input class='inputR'type="text" class="login-input" name="phone" placeholder="phone" required></td></tr>
       <tr><td> <input class='inputR'type="submit" name="submit" value="Register" class="login-button" required></td>
        <td><p class="link"><a href="login.php">Click to Login</a></p></td>
		</table>
    </form>
	</div>
	
	<script>
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function showPasswords() {
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
	</script>
</body>
</html>