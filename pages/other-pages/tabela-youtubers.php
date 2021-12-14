<?php
require_once("../../../sql/Mysql.php");
$sql = new Mysql();

$query = "SELECT * FROM youtubers";
$result = $sql->query($query);
?>

<?php
if (isset($_POST['canal']) && isset($_POST['nick']) && isset($_POST['twitter'])){

	$canal = $_POST['canal'];
	$nick = $_POST['nick'];
	$twitter = $_POST['twitter'];
	if (isset($_POST['skype'])){
		$skype = $_POST['skype'];
		$insert = "insert into youtubers values (DEFAULT, '$canal', '$nick', '$skype', '$twitter')";
	}else{
		$skype = "DEFAULT";
		$insert = "insert into youtubers values (DEFAULT, '$canal', '$nick', $skype, '$twitter')";
	}
	
	mysqli_query($sql->getConexao(), $insert);

	header("Location: ../../sub/youtubers");
}
?>

<div class='insert'>
	<form class='yts' action="" method="post">
		<input type="url" name="canal" placeholder="Canal (url)" required>
		<input type="text" name="nick" placeholder="Nick" required>
		<input type="text" name="skype" placeholder="Skype">
		<input type="text" name="twitter" placeholder="Twitter" required>
		<input type="submit" value="Cadastrar">
	</form>
</div>


<div class='tabela'>
	<table class="youtubers">
		<tr>
			<td>ID</td>
			<td>Canal</td>
			<td>Nick</td>
			<td>Skype</td>
			<td>Twitter</td>
		</tr>

		<?php
		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {

				$canal = htmlspecialchars($row['canal']);
				$nick = htmlspecialchars($row['nick']);
				$skype = htmlspecialchars($row['skype']);
				$twitter = htmlspecialchars($row['twitter']);

				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . "<a href='$canal' target='_blank'>$nick</a>" . "</td>";
				echo "<td>" . "<a href='https://pt.namemc.com/name/$nick' target='_blank'>$nick</a>" . "</td>";
				echo "<td>" . "<a href='skype:$skype?chat'>$nick</a>" . "</td>";
				echo "<td>" . "<a href='https://twitter.com/$twitter' target='_blank'>@$twitter</a>" . "</td>";
				echo "</tr>";
			}

		}
		?>
	</table>
</div>