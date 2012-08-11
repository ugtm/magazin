<?
include "connect.php";
$email=$_POST['email'];
$password=$_POST['password'];
$result=mysql_query("SELECT * FROM USERS WHERE email='$email' and password='$password'");
$count=mysql_num_rows($result);
if($count) {
	session_start();
	session_register("email");
	session_register("password");
	session_register("permission");
	$_SESSION['email']=$email;
	$_SESSION['password']=$password;
	$_SESSION['permission']="ok";
	$result=mysql_query("SELECT * FROM USERS WHERE email='$email'");
	while($row=mysql_fetch_array($result)) {
		$_SESSION['name']=$row['name'];
		$_SESSION['id']=$row['id'];
	}
	$id=$_SESSION['id'];
	header("location:index.php?id=$id");
}
else {
	$_SESSION['permission']="no";
	$_SESSION['error']="Username sau parola gresite!";
	header("location:index.php");
}