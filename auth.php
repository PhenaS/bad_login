<?php
$user = $_POST['username'];
$pword = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "";

try {
	$conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Success";
	}
catch(PDOException $e)
	{
	echo " Failed : " . $e->getMessage();	
	}

$sql= "SELECT username, password FROM logins WHERE username = '$user'";
$stmt = $conn->query($sql);
$row =$stmt->fetchObject();
$real_username = $row->username;
$real_password = $row->password;

if ($pword == $real_password) {
	header("location: success.php");
	exit();
} else {
	header("location: fail.php");
	exit();
}
?>