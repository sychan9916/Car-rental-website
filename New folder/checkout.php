<?php
//include auth_session.php file on all user panel pages
include("auth_season.php");
include_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
#in1{

}
</style>

        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="style.css">
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


     <?php

	 	$id= $_GET['id'];
	$sql = "select list.USERNAME, list.LIST_ID, list.CAR_NAME, list.CAR_BRAND,list.CAR_SEAT,list.image,list.EXTRA,list.price, users.phone from list,users where list.USERNAME = users.USERNAME and list.LIST_ID=$id";
	$result = mysqli_query($con,$sql);
	$resultcheck = mysqli_num_rows($result);

echo '<div class="row row-cols-1 row-cols-md- g-4" id = "out1s">';
	if($resultcheck >0) {
	while ($row = mysqli_fetch_assoc($result)){

$carname =$row['CAR_NAME'];
$carbrand =$row['CAR_BRAND'];
$carseat =$row['CAR_SEAT'];
$price=$row['price'];

	

}
}
echo '</div>';

?>
  
<?php 
echo "<h2 style=   'text-align: center;
    border-bottom: solid;
    margin: 1% 25%;'>Check out and bank information fill up</h2>";
echo "<div id='checkoutdiv'>";



	echo "<form style='border: solid;
    padding: 3%;' method='post' action='bank.php?id=".$id."&price=".$price."' >";
?>
<?php echo "<table><tr><td style='font-weight:bold;'>car name:</td><td>$carbrand $carname</td></tr><tr><td style='font-weight:bold;'>car seat number:</td><td>$carseat</td></tr><tr><td style='font-weight:bold;'>Price per day:</td><td>RM$price</td></tr><tr><td style='font-weight:bold;'>Day:</td><td style='font-weight:bold;'><input type='number' name='day' value='1'</td></tr><tr><td style='font-weight:bold;'>Credit card number:</td><td><input type='text' name='cardnum' placeholder='1111-2222-3333-4444'></td></tr><tr><td style='font-weight:bold;'>Exp Yearr:</td><td><input type='text' name='expyear' placeholder='2019'></td></tr><tr><td style='font-weight:bold;'>Exp month:</td><td><input type='text' name='expmonth' placeholder='SEPTEMBER'></td></tr><tr><td style='font-weight:bold;'>CVV:</td><td><input type='text' name='cvv' placeholder='352'></td></tr></table> ";?>

<input style='margin-left:37%; margin-top:3%;' type='submit' name='submit' value='Submit and pay'>

  




</form>
</div>


	



      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 
</body>
</html>