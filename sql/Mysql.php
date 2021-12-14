<?php
class Mysql {

	public function encryptPassword($pass){
		return md5(md5(sha1(base64_encode(md5($pass)))));
	}

	public function isAnAuthorizedLogin($resultado){
		$rows = $this->rows($resultado);
		if ($rows == 1){
			return true;
		}else{
			return false;
		}
	}

	public function getConexao(){
		$conn = mysqli_connect("mysql.abc.pt", "u230526344", "xxxxxxxxxx", "u230526344_servidor");
		return $conn;
	}

	public function query($query){
		$result = mysqli_query($this->getConexao(), $query) or die(mysql_error());
		return $result;
	}

	public function rows($result){
		return mysqli_num_rows($result);
	}
}

?>