<?php 


$server = '127.0.0.1';
$username = 'root';
$password = '';
$db = 'kbtc_2to5';


$conn = mysqli_connect($server,$username,$password,$db);


if(!$conn){
	die('DB Connection Failed');
}



?>