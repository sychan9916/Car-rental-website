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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<style>
table,th,tr,td{
	border:1px solid black;
}
</style>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="car.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  style="margin-left:74%"  id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
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
          <ul class="dropdown-menu active" aria-labelledby="navbarDropdownMenuLink">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php
include("footer.html");
?>
</body>
</html>
