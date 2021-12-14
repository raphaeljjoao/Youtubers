<?php
require_once("../../../sql/Mysql.php");
date_default_timezone_set('America/Sao_Paulo');
$sql = new Mysql();

$query = "SELECT * FROM cash";
$result = $sql->query($query);
?>

<?php
if (isset($_POST['youtuber']) && isset($_POST['qntd']) && isset($_POST['motivo'])){

	$youtuber = $_POST['youtuber'];
	$quantidade = $_POST['qntd'];
	$motivo = $_POST['motivo'];
	$admin = $_SESSION['username'];
	$date = time();

	$insert = "INSERT INTO cash VALUES(DEFAULT, '$youtuber', $quantidade, '$motivo', '$admin', $date);";
	
	mysqli_query($sql->getConexao(), $insert);

	header("Location: ../../sub/cash");
}
?>

<div class='insert'>
	<form class='yts' action="" method="post">
		<input type="text" name="youtuber" placeholder="Youtuber" required>
		<input type="number" name="qntd" placeholder="Quantidade" required>
		<input type="text" name="motivo" placeholder="Motivo" required>
		<input type="submit" value="Registrar">
	</form>
</div>


<div class='tabela'>
	<table class="youtubers">
		<tr>
			<td>ID</td>
			<td>Youtuber</td>
			<td>Quantidade</td>
			<td>Razão/Episódio</td>
			<td>Setado por</td>
			<td>Setado em</td>
		</tr>

		<?php
		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {

				$id = htmlspecialchars($row['id']);
				$youtuber = htmlspecialchars($row['youtuber']);
				$qnt = htmlspecialchars($row['quantidade']);
				$motivo = htmlspecialchars($row['motivo']);
				$admin = htmlspecialchars($row['admin']);
				$date = htmlspecialchars($row['date']);

				echo "<tr>";
				echo "<td>" . $id . "</td>";
				echo "<td>" . $youtuber . "</td>";
				echo "<td>" . number_format($qnt, 0, ",", ".") . "</td>";
				echo "<td>" . $motivo . "</td>";
				echo "<td>" . $admin . "</td>";
				echo "<td>" . date("d/m/Y h:i A", $date) . "</td>";
				echo "</tr>";
			}

		}
		?>
	</table>
</div>