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
	<link rel="stylesheet" href="chatStyle.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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

<div class="centeralised">
<?php
$receiver= $_GET['id'];
echo "<h3 style='border-bottom:solid;'>$receiver</h3>"
?>
<div class="chat_history">
</div>

<div class="chat_box">

<form action="" method="POST">
	<textarea class="txt_area" cols='100'name="message" placeholder='enter your message..' id="message"></textarea>
</form>

</div>
</div>

<script type="text/javascript">

$(document).ready(function()
{
	loadChat();
}
);


$('#message').keyup(function(e){
	
	var url_string = window.location;
var url = new URL(url_string);

var tvid = url.searchParams.get("id");
		var message = $(this).val();
		
				if(e.which == 13 )
		{
			$.post('handles/ajax.php?id='+tvid +'&action=SendMessage&message='+message, function(response)
			{
				loadChat();
				$('#message').val('');
			});
		}
});

function loadChat()
{
		var url_string = window.location;
var url = new URL(url_string);

var tvid = url.searchParams.get("id");
	$.post('handles/ajax.php?id='+tvid+'&action=getChat', function(response){
		$('.chat_history').html(response);
	});
}

setInterval (function(){
	loadChat();
},2000);
</script>

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 
</body>
</html>