<?php 
session_start();
extract($_GET);
if($_SESSION['user']){	
	session_destroy();
	header("location:../../index.php");
}
else{
	header("location:../../index.php");
}
?>