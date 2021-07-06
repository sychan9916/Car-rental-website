<?php 
include("../auth_season.php");

include("../config.php");

?>

<?php

$receiver= $_GET['id'];


if( isset($_REQUEST['action']))
{
	switch( $_REQUEST['action'])
	{

		case "SendMessage":
		
	$query = $db->prepare ("Insert into chat SET send_user=?, message=?,receive_user=?");
	
	$query ->execute ([$_SESSION['username'], $_REQUEST['message'],$receiver]);
	
	echo 1;
	
	break;
	
	case "getChat":
//"select * from chat where send_user='".$receiver."' and receive_user='".$_SESSION['username']." or send_user=".$_SESSION['username']." and receive_user=".$receiver."' "
		$query = $db->prepare ("select * from chat where send_user='".$_SESSION['username']."'and receive_user='".$receiver."' or send_user='".$receiver."' and receive_user='".$_SESSION['username']."'");
		$query ->execute ();
				$rs = $query->fetchAll(PDO::FETCH_OBJ);
	$chat = '';

			foreach($rs as $r){
			$chat .= $r->send_user.' :'.$r->message.'<hr/>';
			
		}
		
		echo $chat;
		
		
		
	break;
		
if($_SESSION['username']==$_SESSION['username'] and $receiver==$receiver ){


}
else{
	echo "0";
}

	


		
	
}
}
?>