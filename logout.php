<?
	session_start();
	unset($_SESSION['permission']);
	session_destroy();
	echo "<p>Te-ai delogat cu succes, vei fi redirectionat la pagina principala.</p>";
	header( "refresh:2;url=index.php" );
?>