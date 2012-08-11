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
			<form method="post" action="comand.php">
				<div id="name">
					Nume:<input type="text" name="name"/><br/>
					Prenume:<input type="text" name="prenume"/></br>
					E-mail:<input type="text" name="email"/><br/>
				</div>
				<div id="delivery">
					Adresa:<input type="text" name="adress"/><br/>
					Judet:<input type="Text" name="jud"/><br/>
					Mod de livrare:<input type="radio" name=