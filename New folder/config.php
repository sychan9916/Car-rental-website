<?php
	$dbhost ="localhost";
	$dbname ="project";
	$dbuser="root";
	$dbpass ='';
	
	try {
		$db = new PDO("mysql:dbhost=$dbhost; dbname=$dbname", "$dbuser","$dbpass");
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	
?>