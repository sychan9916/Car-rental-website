<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="index_css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <style>
          body {
            background-color: #f8f9fd;
         }

         form{
            background-color: white;
            box-shadow: 0 10px 34px -15px rgb(0 0 0 / 24%);
         }

         input{
            background-color: rgba(0,0,0,.05);
            box-shadow: none;
         }

         td
         {
          text-align: left;
          padding:1%;
         }

         table
         {
          margin:1% 25%;
         }

    </style>
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

<div style="margin:15% 31%;text-align: center">

    <form class="form" action="" method="post" style="">
      <img src='car.png'>
        <h1 style="text-align: center;">Registration</h1>
		<table>
		<tr><td>
        Username:</td><td> <input type="text" class="form-control" name="username" placeholder="Username" required /></td></tr>
       <tr><td> Email address:</td><td><input type="text" class="form-control" name="email" placeholder="Email Adress" required></td></tr>
       <tr><td> Password:</td><td><input type="password"class="form-control" name="password" id="password" placeholder="Password" required></td><td><input type="checkbox" onclick="showPassword()"></td></tr>
	   <tr><td> Confirm Password:</td><td><input type="password" class="form-control" id="confirm_password" name="confirmpassword" placeholder="Password" required> </td><td> <input type="checkbox" onclick="showPasswords()"></td></tr>
		<tr><td>Phone</td><td><input type="text" class="form-control" name="phone" placeholder="phone" required></td></tr>
       <tr><td> <input type="submit" style="margin:1% 22% 1% 1%;" class="btn btn-primary" name="submit" value="Register" class="login-button" required></td>
        <td style="text-align: right;"><a style="text-decoration: none; color: black;"href="login.php">Click to Login</a></td>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	</script>

<?php
include("footer.html");
?>
</body>
</html>