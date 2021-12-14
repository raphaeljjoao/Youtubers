<!-- <h2>Em desenvolvimento</h2> -->


<div class="register">
	<h2>Cadastrar novo staffer</h2>
	<form action="" method="post">
		<input type="text" name="user" placeholder="Nome de usuário" required pattern="[a-zA-Z0-9]+" autocomplete="off"><br>
		<input type="email" name="email" placeholder="Email" required autocomplete="off"><br>
		<input type="password" name="pass" placeholder="Senha" required autocomplete="off"><br>
		<select name="gender" required>
			<option value="m">Masculino</option>
			<option value="f">Feminino</option>
		</select>
		<br>
		<select name="group" required>
			<option value="0">Banido</option>
			<option value="1">Usuário</option>
			<option value="2">Admin (acesso total)</option>
			<option value="3">Gerente (acesso total)</option>
			<option value="4">Diretor (acesso total)</option>
		</select><br>
		<input type="submit" value="Registrar">
	</form>
</div>



<?php



require_once("../../../sql/Mysql.php");
date_default_timezone_set('America/Sao_Paulo');
$sql = new Mysql();

if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['gender']) && isset($_POST['group'])){

	$username = $_POST['user'];
	$email = $_POST['email'];
	$password = $sql->encryptPassword($_POST['pass']);
	$joiend = time();
	$gender = $_POST['gender'];
	$group = $_POST['group'];
	$ip = "127.0.0.1";


	$insert = "INSERT INTO users VALUES(DEFAULT, '$username', '$email', '$password', '$joiend', '$gender', '$group', '$ip');";
	
	mysqli_query($sql->getConexao(), $insert);
	header("Location: ../staff");
}




?>