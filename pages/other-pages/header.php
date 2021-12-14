<header>
<?php
echo "<span>Logado como: " . $_SESSION['username'] . "</span>";
$group = $_SESSION['group'];
if ($group == 3){
	echo "<span class='last'>Grupo: Gerente</span>";
}else if ($group == 4){
	echo "<span class='last'>Grupo: Diretor</span>";

}else if ($group == 2){
	echo "<span class='last'>Grupo: Admin</span>";
}else{
	echo "<span class='last'>Grupo: desconhecido</span>";
}

if (isset($page)){
	if ($page == "index"){
		echo "<div class='logout'><i class='logout-fa fa fa-sign-out' aria-hidden='true'></i><a href='../login/logout.php'>Deslogar</a></div>";
	}
}else{
	echo "<div class='logout'><i class='logout-fa fa fa-sign-out' aria-hidden='true'></i><a href='../../login/logout.php'>Deslogar</a></div>";
}
?>
</header>

