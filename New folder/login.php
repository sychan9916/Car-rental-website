<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><style>
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


    </style>
</head>

<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='$password'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");

        } else {
            echo "<div class='form1'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<div id="centerlogin">
    <form class="form" action = "" method="post" name="login">
	<img src='car.png'>	
        <h1 class="login-title">Login</h1>
        <input type="text" style="width: 50%; margin:1% 26%;" class="form-control" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" style="width: 50%; margin:1% 26%;" class="form-control" name="password" placeholder="Password"/>
        <div>
        <input type="submit" style="margin:1% 22% 1% 1%;"  class="btn btn-primary" value="Login" name="submit" class="login-button"/>
        <a style="color:black;text-decoration: none;"href="registration.php">New Registration</a>
        </div>
  </form>
  <div>
<?php
    }
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>