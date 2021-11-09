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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="car.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse"  style="margin-left:74%"   id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
		echo '<div  style ="margin:1% 0 "class="row row-cols-1 row-cols-md- g-4" id = "out1s">';
	while ($row = mysqli_fetch_assoc($result)){

	

  echo '<div class="col-4 hey"  >';
    echo '<div class="card h-100" >';
echo "<img src=a/".$row['image']." class='card-img-top h-50' alt='...'>";
     echo ' <div class="card-body">';
       echo ' <h5 class="card-title">'.$row['CAR_BRAND']." ".$row['CAR_NAME'].'</h5>';
	
				echo "<p><img style='height:25px'src='carseat.jpg'>Car seat : ".$row['CAR_SEAT']."</p>";
				echo "<h6 id='price'><img style='height:25px;width:25px'src='price.png'>Price per day:RM".$row['price']."</h6>";
		echo "<p> <img style='height:21px'src='call.png'>Contact number: ".$row['phone']. " OR <a style='text-decoration:none'href='message.php?id=".$row['USERNAME']."'>direct message</a></p>";
		
		echo "<p> <img style='height:21px'src='info.png'>Extra details :".$row['EXTRA']."</p>";
		echo "<a  class='btn btn-primary' href='checkout.php?id=".$row['LIST_ID']."'>Checkout</a>";
		
      echo '</div>';
	  	echo "<p style='text-align:right;'>Post by:<a style='text-decoration:none' href=user_rating.php?id=".$row['USERNAME'].">".$row['USERNAME']."</a> <img style='height:21px'src='user.png'></p>";
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php
include("footer.html");
?>
</body>
</html>