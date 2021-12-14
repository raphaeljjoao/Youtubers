<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="shortcut icon" href="../img/favicon.ico">
</head>

	<?php
	require_once("../sql/Mysql.php");
	$sql = new Mysql();

	if (isset($_POST['user']) && isset($_POST['pass'])){

		$login = stripslashes($_REQUEST['user']);
		$pass = stripslashes(md5(md5(sha1(base64_encode(md5($_POST['pass']))))));
		$pass = mysqli_real_escape_string($sql->getConexao(), $pass);

		$query = "SELECT * FROM users WHERE username='$login' and pass='$pass'";

		$result = $sql->query($query);
	}
	?>

<body>
	<center>
		<div class="login">
			<form action="" method="post" class="forml">
				<h1>Login</h1><br>
				<?php
				session_start();
				if (isset($_SESSION['username'])){
					if (!is_null($_SESSION['username'])){
					echo "<br><div class='sucess'>Logado como: " . $_SESSION['username'] . "</div>";
				}
				}
				if (isset($result)){
					if ($sql->isAnAuthorizedLogin($result)){
						//session_start();
						$resultgroup = $sql->query("select groupid from users where username='$login'");
						$obj = $result->fetch_object();
						$gid = $obj->groupid;
						$_SESSION['username'] = $login;
						$_SESSION['group'] = $gid;
						$_SESSION['password'] = $pass;
						//echo "<br><div class='sucess'>Seja bem-vindo, " . $_SESSION['username'] . "</div>";
						header("Location: ../pages");
					}else{
						echo "<br><div class='error'>Senha incorreta</div><br>";
					}
				}
				?>
				<?php
				if (isset($_SESSION['username'])){
					echo "
					<div class='error'>
					<a href='logout.php'>Deslogar</a>
					</div>
					";
				}else{
					echo "
					<input type='text' name='user' placeholder='Usuário' class='campo' required><br>
					<input type='password' name='pass' placeholder='Senha' class='campo' required=><br>
					<input type='submit' value='Entrar' class='submit'>
					<br><div class='remember'><input type='checkbox' name='remember' class='remember'>Continuar logado</div>
					";
				}

				?>
			</form>
		</div>
	</center>
</body>
</html>

