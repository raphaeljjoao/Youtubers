<?php
require_once("../sql/Mysql.php");
$sql = new Mysql();

$query = "SELECT id FROM youtubers";
$result = $sql->query($query);

if ($result->num_rows > 0){
	$count = 0;
	while ($row = $result->fetch_assoc()) {
		$count++;
	}
}

$query = "SELECT quantidade FROM cash";
$result = $sql->query($query);

if ($result->num_rows > 0){
	$cash = 0;
	while ($row = $result->fetch_assoc()) {
		$cash += $row['quantidade'];
	}
}


?>

<div class="stats">
<?php
$cadastrados = $count;

echo "Youtubers cadastrados: $cadastrados <br>";
echo "Total de cash distribuído: " . number_format($cash, 0 , ",", ".") . "<br>";

?>
</div>