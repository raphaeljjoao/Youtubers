<!DOCTYPE html>
<html>
<head>

	<title>Painel - Equipe</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/content.css">
	<link rel="stylesheet" type="text/css" href="../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../css/navbar.css">
	<link rel="stylesheet" type="text/css" href="../../css/register.css">
	<link rel="shortcut icon" href="../../../img/youtube.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php
	session_start();

	$user = $_SESSION['username'];
	$pass = $_SESSION['password'];
	$groupid = $_SESSION['group'];

	if ($user != null){
		if ($groupid >= 2){
			require_once("../../other-pages/header.php");
			echo "
			<nav id='navbar'>
				<ul>
					<li class='item'><a href='../../'><i class='fa fa-youtube-play' aria-hidden='true'></i>Início</a></li>
					<li class='item'><a href='../youtubers'><i class='fa fa-users' aria-hidden='true'></i>Youtubers</a></li>
					<li class='item'><a href='../cash'><i class='fa fa-shopping-basket' aria-hidden='true'></i>Cash</a></li>
					<li class='item selected'><a href=''><i class='fa fa-list' aria-hidden='true'></i>Equipe</a></li>
					<!-- <li class='item'><a href=''><i class='fa fa-user-plus' aria-hidden='true'></i>Grupos</a></li> -->
				</ul>
			</nav>";
				echo "<div id='page'>";
			require_once("../../other-pages/register.php"); 
				echo "</div>";

		}else {
			header("Location: ../../../login");
		}
	}else{
		header("Location: ../../../login");
	}

	

	?>
</body>
</html>