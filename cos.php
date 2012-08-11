<?
session_start();
if($_SESSION['permission']=="ok") {
	?>
	<html>
<head>
	<title></title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#aut').click(function() {
				$('#login').toggle();
			});
		});

	</script>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<div id="header">
		<div id="login">
			<form action="login.php" method="post">
				Email:<input type="text" name="email"/><br/>
				Parola:<input type="password" name="password"/><br/>
				<input type="submit" value="Autentifica-te"/>
			</form>
		</div>
	</div>
	<div id="body">
		<div id="menu">
			<ul>
				<li><a href="produse.php">Produse</a></li>
				<li><a href="contact.php">Contact</a></li>
			<?
			session_start();
			if($_SESSION['permission']=="ok") {
				if ($_SESSION['email']=="admin") {?>
				<li><a href="comenzi.php">Comenzi</a></li>
				<li><a href="add.php">Adauga un produs</a></li>
				<li><a href="remove.php">Sterge un produs</a></li>
				<li><a href="logout.php">Log out</a></li>
					<? }
				else { ?>
				<li><a href="logout.php">Log out</a></li>
				<li><a href="cos.php">Cosul meu</a></li>
				<li></li>
			<?}
		}
			else {?>
				<li><a href="#" id="aut">Autentificare</a></li>
				<li><a href="register.php">Inregistreaza-te</a></li>
				<li></li>
				<?}?>
			</ul>
		</div>
		<div id="container">
			<? session_start();
			$user=$_SESSION['email'];
			include "connect.php";
			$result=mysql_query("SELECT * FROM COMENZI WHERE email='$user'");
			echo "<form method='post' action='hit.php'>"
			while($row=mysql_fetch_array($result)) {
				echo "<input type='radio' name='prod' value='".$row['produs']."'/><label>".$row['produs']."</label>";
			}
			echo "<input type='submit' value='Sterge produsul'/></form>";
			echo "<a href='continue.php'><input type='button' value='Continue'/></a>";
			?>
			</div>
	</div>
	<div id="footer">
		&copy Stein Daian 2012
	</div>
</body>
<html>
<?
}
else {
	?>
	<html>
<head>
	<title></title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#aut').click(function() {
				$('#login').toggle();
			});
		});

	</script>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<div id="header">
		<div id="login">
			<form action="login.php" method="post">
				Email:<input type="text" name="email"/><br/>
				Parola:<input type="password" name="password"/><br/>
				<input type="submit" value="Autentifica-te"/>
			</form>
		</div>
	</div>
	<div id="body">
		<div id="menu">
			<ul>
				<li><a href="produse.php">Produse</a></li>
				<li><a href="contact.php">Contact</a></li>
			<?
			session_start();
			if($_SESSION['permission']=="ok") {
				if ($_SESSION['email']=="admin") {?>
				<li><a href="comenzi.php">Comenzi</a></li>
				<li><a href="add.php">Adauga un produs</a></li>
				<li><a href="remove.php">Sterge un produs</a></li>
				<li><a href="logout.php">Log out</a></li>
					<? }
				else { ?>
				<li><a href="logout.php">Log out</a></li>
				<li><a href="cos.php">Cosul meu</a></li>
				<li></li>
			<?}
		}
			else {?>
				<li><a href="#" id="aut">Autentificare</a></li>
				<li><a href="register.php">Inregistreaza-te</a></li>
				<li></li>
				<?}?>
			</ul>
		</div>
		<div id="container">
			<h3>Nu aveti permisiunile necesare pentru a accesa aceasta pagina</h3>
		</div>
		</div>
	</div>
	<div id="footer">
		&copy Stein Daian 2012
	</div>
</body>
<html>
<?
}
?>
