<?php
//include auth_session.php file on all user panel pages
include("auth_season.php");
include_once("db.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<style>
.checked{
  color: orange;

}
</style>

        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	 <link rel="stylesheet" href="style.css"/>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="car.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> 
    <div class="collapse navbar-collapse "   style="margin-left:74%" id="navbarNavDropdown">
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
<table style='margin-left:30%;'>
<tr>
<td><b>user:</b>
</td>
<td>
  <?php
	echo $_GET['id'];
  ?>
</td>

</tr>
<tr>
<td>
<b>
overall rating :
</b>
</td>


<?php 

$pull_user =  $_GET['id'];
$query= "SELECT AVG(star) as overall_rating
FROM ratubg 
WHERE pull_user='$pull_user';";
$result = mysqli_query($con,$query);
$resultcheck = mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0) {
	
 // output data of each row
	while($row = mysqli_fetch_assoc($result))
		
	if($row["overall_rating"]<=5 && $row["overall_rating"]>=4 )
	{
		echo "<td style='color:green;'>".$row["overall_rating"]."</td>";
	}
	else if($row["overall_rating"]>=2 && $row["overall_rating"]<=3.9)
	{
			echo "<td style='color:orange;'>".$row["overall_rating"]."</td>";
			
	}
	else{
		echo "<td style='color:red;'>".$row["overall_rating"]."</td>";
		
	}
 
 
 
}



 else {
	echo "0 results";
}







?>
</td>
</tr>
<tr >
<td colspan=2>
<form method="post" name="rate">
<input type="radio" name="rating" value="5">
<label for ="star5">5</label>
<input type="radio" name="rating" value="4">
<label for ="star4">4</label>
<input type="radio" name="rating" value="3">
<label for ="star3">3</label>
<input type="radio" name="rating" value="2">
<label for ="star2">2</label>
<input type="radio" name="rating" value="1">
<label for ="star1">1</label>
<input type="radio" name="rating" value="0">
<label for ="star0	">0</label>
</td>

</tr>

</table>
<br>
    <textarea style='margin-left:30%;' class="txt_area" cols='100'name="comment" placeholder='enter your message..' id="message"></textarea>
<br>
 <button style='margin: 0 47%;'type="submit">submit</button>

</form>

</div>




	<?php echo "<h2>Review and comment from other user</h2>";

$dbs =mysqli_connect("localhost", "root", "", "project");
$sql = "select * from ratubg where pull_user='".$pull_user."'";
$result = mysqli_query($dbs,$sql);
	$resultcheck = mysqli_num_rows($result);

  echo '<div class="list-group">';
	
	if($resultcheck >0) {

$a=0;





while ($row = mysqli_fetch_array($result))
{
  echo '<a href="#" class="list-group-item list-group-item-action " aria-current="true">
  <div class="d-flex w-100 justify-content-between">';
  echo '<h5 class="mb-1">Rating:'.$row['star'];

  if ($row["star"]==1)
  { 
    echo '
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star "></span>
    <span class="fa fa-star "></span>
    <span class="fa fa-star "></span>
    <span class="fa fa-star"></span></h5>';
  }
  else if ($row["star"]==2)
  {
    echo '
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star "></span>
    <span class="fa fa-star "></span>
    <span class="fa fa-star"></span></h5>';
  }
  else if ($row["star"]==3){
    echo '
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star "></span>
    <span class="fa fa-star"></span></h5>';
  }
  else if ($row["star"]==4){
    echo '
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span></h5>';
  }
  else{
    echo '
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span></h5>';
  }
    
    
echo '
    <small>'.$row['date'].'</small>
  </div>
  <p class="mb-1">Comment:'.$row['comment'].'</p>
  <small>User:'.$row['push_user'].'</small>
</a>';




}
}

	else{
		echo "no rating yet";
	}

	?>




<?php



    if (isset($_POST['rating'])) {
	  $username = $_SESSION['username'] ;
	   $star = ($_POST['rating']);
	   $comment=($_POST['comment']);
	   		$date_time=date('Y-m-d H:i:s');

$pull_user =  $_GET['id'];
        // Check user is exist in the database
        $query    = "INSERT into `ratubg` (push_user, pull_user, star,comment,date)
                     VALUES ('$username', '$pull_user', ' $star','$comment','$date_time')";
        $result = mysqli_query($con, $query) or die(mysql_error());
	if ($result) {
         echo '<script type="text/javascript">';
echo ' alert("review sucess")';  //not showing an alert box.
echo '</script>';
header("Refresh:0");
        } else {
            echo '<script type="text/javascript">';
echo ' alert("fail")';  //not showing an alert box.
echo '</script>';
        }

		

    } 
?>





      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- Footer -->

<?php
include("footer.html");
?>
</body>
</html>