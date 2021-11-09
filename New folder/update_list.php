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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">	<img src="car.png"></a>
  
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
	      <li class="nav-item dropdown active">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
 
<?php
include("footer.html");
?>
</body>
</html>