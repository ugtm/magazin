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
			<h1>Bine ati venit <? session_start(); echo $_SESSION['name']; ?>!</h1>
			<?
			session_start();
			if($_SESSION['permission']=="ok") {
				if($_SESSION['id']==$_GET['id']||$_GET['id']==''||$_GET['']=='') {
					$page=$_GET['id']=$_SESSION['id'];?>
					<h2>Utilizator:</h2><br/><ul>
					<li><a href="change.php">Schimba parola</a></li>
					<li><a href="edit.php">Editeaza profilul</a></li>
				</ul>
				<div id="profile"><h2>Detalii profil</h2><br/><ul>
					<?
					include "connect.php";
					$result=mysql_query("SELECT * FROM USERS WHERE id='$page'");
					while($row=mysql_fetch_array($result)) {
						echo "<li>Nume si prenume: ".$row['name']."</li>";
						echo "<li>Email: ".$row['email']."</li>";
					}
					?>
				</ul></div>
				<?}
				else {
					$page=$_GET['id'];?>
				<div id="profile"><h2>Detalii profil</h2><br/><ul><?
					include "connect.php";
					$result=mysql_query("SELECT * FROM USERS WHERE id='$page'");
					while($row=mysql_fetch_array($result)) {
						echo "<li>Nume si prenume: ".$row['name']."</li>";
						echo "<li>Email: ".$row['email']."</li>";
					}
					?>
				</ul></div>
				<?
				}
			}
			else {?>
				<h3>Produse bla bla bla</h3><p></p><p></p>
				<?
			}
			?>
		</div>
	</div>
	<div id="footer">
		&copy Stein Daian 2012
	</div>
</body>
<html>