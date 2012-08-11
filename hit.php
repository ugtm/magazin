<? session_start();
include "connect.php";
$prod=$_POST['prod'];
$email=$_SESSION['email'];
$result=mysql_query("DELETE FROM COMENZI WHERE email='$email' and produs='$prod'");
$count=mysql_num_rows($result);
if($count) {
	header("location:cos.php");
}
else {

}
?>