<?php
//include auth_session.php file on all user panel pages
include("auth_season.php");
include_once("db.php");
?>

<?php
	if(isset($_POST["upload"]))
	{
		$target = "a/".basename($_FILES['image']['name']);
		
		$dbs =mysqli_connect("localhost", "root", "", "project");
		$image = $_FILES['image']['name'];
		$text = $_POST['extra'];
		$username= $_SESSION['username'];
		$carbrand=$_POST['brand'];
		$carname=$_POST['name'];
		$carseat=$_POST['seat'];
		$price=$_POST['prices'];
		$date_time=date('Y-m-d H:i:s');
		$sql = "INSERT INTO list(image, EXTRA,USERNAME,CAR_BRAND,CAR_NAME,CAR_SEAT,PRICE,date_time) VALUES ('$image','$text','$username','$carbrand','$carname','$carseat','$price','$date_time')";
		$result= mysqli_query($dbs,$sql);
		
		
		if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){

 header("Location: index.php");


		}
	else{
		$msg = "fail";
	}
	}
		
?>
<!DOCTYPE html>
<html>
<head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
  td
  {
    height:56px;
  }
</style>
  </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="car.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse"  style="margin-left:74%" id="navbarNavDropdown">
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
<div>
<h2 style="text-align:center">Add new list</h2>
<form method="post" style='margin:0 36%;border:solid;padding:0 2%;' action="new_list.php" enctype="multipart/form-data">




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
<input type="text" name="name" required>
</td>
</tr>
<tr>
<td>
<p>car brand:</p>
</td>
<td>
<input type="text" name="brand" required>
</td>
</tr>
<tr>
<td>
<p>car seat:</p>
</td>
<td>
<input type="text" name="seat" required>
</td>
</tr>
<tr>
<td>
<p>price per day:</p>
</td>
<td>
<input type="text" name="prices" required>
</td>
</tr>
<tr>
<td>
<p>extra info:</p>
</td>
<td><textarea name="extra" cols="40" rows="4" placeholder= "name" required></textarea>
</td>
</tr>
</table>
<input type = "hidden" name="size" value="1000000">
<input class= 'btn btn-primary' style='margin: 2% 0 2% 22%;'type= "submit" name="upload" required value ="post listing">
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