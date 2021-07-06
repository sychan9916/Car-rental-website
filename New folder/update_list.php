<?php
//include auth_session.php file on all user panel pages
include("auth_season.php");
include_once("db.php");
?>

<?php
$id= $_GET['id'];
$dbs =mysqli_connect("localhost", "root", "", "project");
$sql = "Select * from list where list_id=$id";
$result = mysqli_query($dbs,$sql);
	while ($row = mysqli_fetch_assoc($result)){

$carname =$row['CAR_NAME'];
$carbrand =$row['CAR_BRAND'];
$carseat =$row['CAR_SEAT'];
$price=$row['price'];
$extra=$row['EXTRA'];



	

}

		
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
<h2 style="text-align:center">Edit list</h2>
<form method="post" style='margin:0 36%;border:solid;padding:0 2%;' action="update_list1.php?id=<?php  echo $_GET['id'];?>" enctype="multipart/form-data">




<table>
<tr>
<td>
<p>image:
</td>
<td>
<input type="file" name="image">
</P>
</td>



</tr>
<td>
<p>car name:</p>
</td>
<td>
<input type="text" name="name" required value=<?php echo "$carname";?>>
</td>
</tr>
<tr>
<td>
<p>car brand:</p>
</td>
<td>
<input type="text" name="brand" required value='<?php echo "$carbrand";?>'>
</td>
</tr>
<tr>
<td>
<p>car seat:</p>
</td>
<td>
<input type="text" name="seat" required value='<?php echo "$carseat";?>'>
</td>
</tr>
<tr>
<td>
<p>price per day:</p>
</td>
<td>
<input type="text" name="prices" required value='<?php echo "$price";?>'>
</td>
</tr>
<tr>
<td>
<p>extra info:</p>
</td>
<td><textarea name="extra" cols="40" rows="4" placeholder= "text" required ><?php echo "$extra";?></textarea>
</td>
</tr>
</table>
<input type = "hidden" name="size" value="1000000">
<input style='margin: 2% 0 2% 22%;'type= "submit" name="upload" required value ="post listing">
</div>





</form>







	
	
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 
</body>
</html>