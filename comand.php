<? session_start();
$name=$_POST['name'];
$email=$_POST['email'];

include "connect.php";
$result=mysql_query("INSERT INTO COMENZI_ACTIVE SET name='$name',email='$email',");
$count=mysql_num_rows($result);
if($count) {
	$_SESSION['error']="Comanda Trimisa cu succes";
	header("location:index.php");
}
else {
	$_SESSION['error']="Comanda nereusita";
	header("location:index.php");
}
?>