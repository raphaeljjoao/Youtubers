<?php
session_start();
if (isset($_SESSION['username'])){
	$_SESSION['username'] = null;
	$_SESSION['password'] = null;
	$_SESSION['group'] = null;
	session_destroy();
	header('Location: index.php');
}
?>