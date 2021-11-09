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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="car.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-left:74%" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="index.php" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="chatlist.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Listing
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="new_list.php">NEW</a></li>
            <li><a class="dropdown-item" href="mylist.php">MY LISTING</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="">Setting</a></li>
            <li><a class="dropdown-item" href="">History</a></li>
            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
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

<input  class='btn btn-primary' style='margin-left:37%; margin-top:3%;' type='submit' name='submit' value='Submit and pay'>

  




</form>
</div>


	



      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php
include("footer.html");
?>
</body>
</html>