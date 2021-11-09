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
	<link rel="stylesheet" href="index_css.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">	<img src="car.png"></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse"  style="margin-left:74%" id="navbarSupportedContent mains">
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
//include auth_session.php file on all user panel pages

include_once("db.php");
$prices=(float)$_GET['price'];
$id=$_GET['id'];
$buyer=$_SESSION['username'];
$day=(int)$_POST['day'];
$carumber=$_POST['cardnum'];
$expmonth=$_POST['expmonth'];
$expyear=$_POST['expyear'];
$cvv=$_POST['cvv'];
$total=$day * $prices;


			$sql = "INSERT INTO checkout(list_id, Buyer, amount, cardnumber, expmonth, expyear, cvv,day,priceperday) VALUES ('$id','$buyer','$total','$carumber','$expmonth','$expyear','$cvv','$day','$prices')";
		$result= mysqli_query($con,$sql);
		
		$sqls= "update list set status='booked' where list_id=".$id;
		$results= mysqli_query($con,$sqls);
		
		
		
	
?>

<div>
<h2 style="text-align:center">Checkout confirmation </h2>
<div style="text-align:center;border:solid;margin:0 40%;padding:1% 0">
 <?php

	echo "You have pay total RM" . $total;
	echo "<br>";
	echo "<button><a href=mylist.php?id='".$_SESSION['username']."'>click me to see your list </a></button>"


	 
	
	
	?> 


	

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