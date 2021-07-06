<?php
//include auth_session.php file on all user panel pages
include("auth_season.php");
include_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
table,th,tr,td{
	border:1px solid black;
}
</style>

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



$username= $_SESSION['username'];
$dbs =mysqli_connect("localhost", "root", "", "project");
$sql = "select * from list where username= '$username'";
$result = mysqli_query($dbs,$sql);
echo "<h2 style=   'text-align: center;
    border-bottom: solid;
    margin: 1% 25%';>My car listing </h2><table style='margin:0 33%;'><tr><th>No</th><th>date post</th><th>image</th><th>price per day </th><th>car name</th><th>status</th><th colspan=2>Action</th></tr>";
$a=1;
$b=1;


while ($row = mysqli_fetch_array($result))
{


	$as=$a++;

if($row['status']=='booked')
{
	echo "<tr><td>$as</td><td>".$row['date_time']."</td><td><img style='height:60px ;width:80px;' src = 'a/".$row['image']."'></td><td>".$row['price']."</td><td>".$row['CAR_BRAND']." " .$row['CAR_NAME']."</td><td>".$row['status']."</td><td style='text-align:center;'>-</td><td style='text-align:center'>-</td></tr>";

}
else{
	echo "<tr><td>$as</td><td>".$row['date_time']."</td><td><img style='height:60px ;width:80px;' src = 'a/".$row['image']."'></td><td>".$row['price']."</td><td>".$row['CAR_BRAND']." " .$row['CAR_NAME']."</td><td>".$row['status']."</td><td><a href='delete.php?id=".$row['LIST_ID']."'>delete</a></td><td><a href='update_list.php?id=".$row['LIST_ID']."'>update</a></td></tr>";

}
	


}
echo "</table>";

echo "<br>";

$dbs =mysqli_connect("localhost", "root", "", "project");
$sqls = "SELECT checkout.bookdate, checkout.list_id, list.image, list.CAR_NAME, list.CAR_BRAND, checkout.day, checkout.priceperday,checkout.bookdate ,checkout.amount from list, checkout where list.LIST_ID = checkout.list_id and checkout.Buyer='".$username."'";
$result = mysqli_query($dbs,$sqls);

echo "<h2 style=   'text-align: center;
    border-bottom: solid;
    margin: 1% 25%';>Car that i book </h2><table style='margin:0 33%;'><tr><th>No</th><th>list id</th><th>image</th><th>car name</th></th><th>day</th><th>price per day </th><th>total price</th><<th>book date</th>></tr>";


while ($row = mysqli_fetch_array($result))
{



	$ab=$b++;

	echo "<tr><td>$ab</td><td>".$row['list_id']."</td><td><img style='height:60px ;width:80px;' src = 'a/".$row['image']."'></td><td>".$row['CAR_BRAND']." ".$row['CAR_NAME']."</td><td>"  .$row['day']."</td><td>".$row['priceperday']."</td><td>".$row['amount']."</td><td>".$row['bookdate']."</td></tr>";



}
echo "</table>";

?>




<div class="row row-cols-1 row-cols-md- g-4">

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 
</body>
</html>
