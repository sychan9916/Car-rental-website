<?php
//include auth_session.php file on all user panel pages
include("auth_season.php");
include_once("db.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<style>

</style>

        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	 <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">	<img src="car.png"></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent mains">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="noti_number" href="chatlist.php">Contact</a>
      </li>
	      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Listing
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="new_list.php">NEW</a>
		  
		  <a class="dropdown-item" href="mylist.php ">MY LISTING</a>
		  
</div>


      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Setting</a>
          <a class="dropdown-item" href="#">History</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>

    </ul>

  </div>

</nav>

<div>
<table style='margin-left:30%;'>
<tr>
<td><b>user:</b>
</td>
<td>
  <?php
	echo $_GET['id'];
  ?>
</td>

</tr>
<tr>
<td>
<b>
overall rating :
</b>
</td>


<?php 

$pull_user =  $_GET['id'];
$query= "SELECT AVG(star) as overall_rating
FROM ratubg 
WHERE pull_user='$pull_user';";
$result = mysqli_query($con,$query);
$resultcheck = mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0) {
	
 // output data of each row
	while($row = mysqli_fetch_assoc($result))
		
	if($row["overall_rating"]<=5 && $row["overall_rating"]>=4 )
	{
		echo "<td style='color:green;'>".$row["overall_rating"]."</td>";
	}
	else if($row["overall_rating"]>=2 && $row["overall_rating"]<=3.9)
	{
			echo "<td style='color:orange;'>".$row["overall_rating"]."</td>";
			
	}
	else{
		echo "<td style='color:red;'>".$row["overall_rating"]."</td>";
		
	}
 
 
 
}



 else {
	echo "0 results";
}





?>
</td>
</tr>
<tr >
<td colspan=2>
<form method="post" name="rate">
<input type="radio" name="rating" value="5">
<label for ="star5">5</label>
<input type="radio" name="rating" value="4">
<label for ="star4">4</label>
<input type="radio" name="rating" value="3">
<label for ="star3">3</label>
<input type="radio" name="rating" value="2">
<label for ="star2">2</label>
<input type="radio" name="rating" value="1">
<label for ="star1">1</label>
<input type="radio" name="rating" value="0">
<label for ="star0	">0</label>
</td>

</tr>

</table>
<br>
    <textarea style='margin-left:30%;' class="txt_area" cols='100'name="comment" placeholder='enter your message..' id="message"></textarea>
<br>
 <button style='margin: 0 47%;'type="submit">submit</button>

</form>

</div>




	<?php echo "<h2>Review and comment from other user</h2>";

$dbs =mysqli_connect("localhost", "root", "", "project");
$sql = "select * from ratubg where pull_user='".$pull_user."'";
$result = mysqli_query($dbs,$sql);
	$resultcheck = mysqli_num_rows($result);
	
	if($resultcheck >0) {

$a=0;


while ($row = mysqli_fetch_array($result))
{

echo "<table style='border:solid'>";
	$as=$a++;
	
echo "<tr style='border:solid'><td style='font-weight:bold;'>User:</td><td>".$row['push_user']."</td></tr><tr><td style='border:solid;font-weight:bold;'>Rating:</td><td style='border:solid;'>".$row['star']."</td></tr><tr><td style='border:solid;font-weight:bold;'>Comment:</td><td style='border:solid;'>".$row['comment']."</td></tr><tr><td style='font-weight:bold;'>Date post:</td><td style='border:solid'>".$row['date']."</td></tr>";

	echo "</table><br>";}

}

	else{
		echo "no rating yet";
	}

	?>



<?php



    if (isset($_POST['rating'])) {
	  $username = $_SESSION['username'] ;
	   $star = ($_POST['rating']);
	   $comment=($_POST['comment']);
	   		$date_time=date('Y-m-d H:i:s');

$pull_user =  $_GET['id'];
        // Check user is exist in the database
        $query    = "INSERT into `ratubg` (push_user, pull_user, star,comment,date)
                     VALUES ('$username', '$pull_user', ' $star','$comment','$date_time')";
        $result = mysqli_query($con, $query) or die(mysql_error());
	if ($result) {
         echo '<script type="text/javascript">';
echo ' alert("review sucess")';  //not showing an alert box.
echo '</script>';
header("Refresh:0");
        } else {
            echo '<script type="text/javascript">';
echo ' alert("fail")';  //not showing an alert box.
echo '</script>';
        }

		

    } 
?>





      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 
</body>
</html>