<?php 
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	header('Location:index.php');
	die();
}



require_once 'connection.php';

$id = (int) $_GET['id'];

$sql = "DELETE FROM users WHERE id = $id";

if(mysqli_query($conn,$sql)){
	header('Location:index.php');
}


 ?>