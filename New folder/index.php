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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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



<div class="searchDiv">

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="search car brand or name..">
<input type="text" id="myInputs" onkeyup="prices()" placeholder="search the price..">
   </div>
   <?php
	$sql = "select list.USERNAME, list.LIST_ID, list.CAR_NAME, list.CAR_BRAND,list.CAR_SEAT,list.image,list.EXTRA,list.price, users.phone from users, list where list.USERNAME = users.USERNAME and list.status='available' and list.USERNAME!='".$_SESSION['username']. " '
"; 
	$result = mysqli_query($con,$sql);
	$resultcheck = mysqli_num_rows($result);
	
	


	if($resultcheck >0) {
		echo '<div class="row row-cols-1 row-cols-md- g-4" id = "out1s">';
	while ($row = mysqli_fetch_assoc($result)){

	

  echo '<div class="col-4 hey"  >';
    echo '<div class="card h-100" >';
echo "<img src=a/".$row['image']." class='card-img-top h-50' alt='...'>";
     echo ' <div class="card-body">';
       echo ' <h5 class="card-title">'.$row['CAR_BRAND']." ".$row['CAR_NAME'].'</h5>';
	
				echo "<p>Car seat : ".$row['CAR_SEAT']."</p>";
				echo "<h6 id='price'>Price per day:RM".$row['price']."</h6>";
		echo "<p>Contact number : ".$row['phone']. " OR <a href='message.php?id=".$row['USERNAME']."'>direct message</a></p>";
		
		echo "<p>Extra details :".$row['EXTRA']."</p>";
		echo "<button><a href='checkout.php?id=".$row['LIST_ID']."'>Checkout</a></button>";
		
      echo '</div>';
	  	echo "<p style='text-align:right;'>Post by:<a href=user_rating.php?id=".$row['USERNAME'].">".$row['USERNAME']."</a></p>";
  echo '  </div>';

 echo ' </div>';

}
}
else {
		echo "<div style='    text-align: center;
    margin-top: 11%'><h2     style='MARGIN: 0 5%;
    border: solid'	;>There are no listing available.</h2></div>";
}
echo '</div>';
?>





<script type="text/javascript">

function myFunction() {
    var input, filter, out1s, in1, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ab = document.getElementById("out1s");
    in1 = ab.getElementsByClassName("hey");
    for (i = 0; i < in1.length; i++) {
        a = in1[i].getElementsByTagName("h5")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            in1[i].style.display = "";
        } else {
            in1[i].style.display = "none";
        }
    }
}



</script>

<script type="text/javascript">
function prices() {
    var input, filter, out1s, in1, a, i, txtValue;
    input = document.getElementById("myInputs");
    filter = input.value.toUpperCase();
    ab = document.getElementById("out1s");
    in1 = ab.getElementsByClassName("hey");
    for (i = 0; i < in1.length; i++) {
       a = in1[i].getElementsByTagName("h6")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            in1[i].style.display = "";
        } else {
            in1[i].style.display = "none";
        }
    }
}



</script>


      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 
</body>
</html>