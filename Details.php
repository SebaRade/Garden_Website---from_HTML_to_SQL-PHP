<!DOCTYPE html>
<html lang="de">

<?php
$ID = $_GET['ID'];
$Name = $_GET['Name'];

echo "<head>
<meta charset='utf-8' name='description', content='Pflanzen'>
<title>".$Name."</title>
<link href='/Pflanzenwebsite/designfile.css' rel='stylesheet'>
</head>";

echo "<body>";
echo "<ul class='nav'>
	<li class='nav'><a href='index.htm' class='nav' id='top'><b>Home</b></a></li>
	<li class='nav'><a class='active' href='pflanzen.php' class='nav'><b>Pflanzen</b></a></li>
	<li class='nav'><a href='aussaatplan.php' class='nav'><b>Aussaatplan</b></a></li>
	<li class='nav'><a href='infos.htm' class='nav'><b>Infos</b></a></li>
	<li class='nav' style='float:right'><a href='galerie.htm' class='nav'><b>Galerie</b></a></li>
	</ul>";
echo "<br>";
echo "<div class='info'>".$Name."</div><br>";

$username = ###; 
$password = ###; 
$database = "garten"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM pflanzendaten WHERE ID=$ID";

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {

echo "<img src=".$row['Pfad']." height=300, width=300, style='float:left'>";
echo "<table class='aussaat1'>
				<tr> 
                  <td><b>Bot. Name</b></td> 
                  <td><i>".$row['Botname']."</i></td> 
				</tr>
				<tr>
					<td><b>Familie</b></td>
					<td>".$row['Familie']."</td>
				</tr>
				<tr>
					<td><b>Standort</b></td>
					<td>".$row['Standort']."</td>
				</tr>
				<tr>
					<td><b>Boden</b></td>
					<td>".$row['Boden']."</td>
				</tr>
				<tr>
					<td><b>Farbe</b></td>
					<td>".$row['Farbe']."</td>
				</tr>
				<tr>
					<td><b>Blütezeit</b></td>
					<td>".$row['Blütezeit']."</td>
				</tr>
				<tr>
					<td><b>Wuchshöhe</b></td>
					<td>".$row['Wuchshöhe']."</td>
				</tr>
				<tr>
					<td><b>Pflanzabstand</b></td>
					<td>".$row['Abstand']."</td>
				</tr>
				<tr>
					<td><b>Pflege</b></td>
					<td>".$row['Pflege']."</td>
				</tr>
				<tr>
					<td><b>Vermehrung</b></td>
					<td>".$row['Vermehrung']."</td>
				</tr>
				<tr>
					<td><b>Schädlinge</b></td>
					<td>".$row['Schädlinge']."</td>
				</tr>
				<tr>
					<td><b>Winterhärte</b></td>
					<td>".$row['Winterhärte']."</td>
				</tr>
				<tr>
					<td><b>Insektenfreund</b></td>
					<td>".$row['Insektenfreund']."</td>
				</tr>
				<tr>
					<td><b>Giftigkeit</b></td>
					<td>".$row['Giftigkeit']."</td>
				</tr>
				<tr>
					<td><b>Rote Liste</b></td>
					<td>".$row['RoteListe']."</td>
				</tr>
				</table>";
    }
    $result->free();
} 

$query = "SELECT Saison, Botname, Sorte, Hersteller, DATE_FORMAT (Aussaat, '%d.%m.') AS Aussaat, Vorgezogen, Keimrate, DATE_FORMAT (Vereinzelung, '%d.%m.') AS Vereinzelung, DATE_FORMAT (Pflanzung, '%d.%m.') AS Pflanzung, Wachstum, Blüte, Ernte, Anmerkungen  FROM aussaaten WHERE Name='$ID' ORDER BY Saison DESC";
$stmt = $mysqli->query($query);
date ('d.m.');

echo "<br><table width=100% class='FixHead'>
	<thead><tr>
		<th width=4%><b>Saison</b></th>
		<th width=10%><b>Bot. Name</b></th>
		<th width=10%><b>Sorte</b></th>
		<th width=10%><b>Hersteller</b></th>
		<th width=6%><b>Aussaat</b></th>
		<th width=5%><b>Anzucht</b></th>
		<th width=5%><b>Keimrate</b></th>
		<th width=7%><b>Vereinzelung</b></th>
		<th width=6%><b>Pflanzung</b></th>
		<th width=6%><b>Wachstum</b></th>
		<th width=5%><b>Blüte</b></th>
		<th width=5%><b>Ernte</b></th>
		<th width=21%><b>Anmerkungen</b></th>
	</tr></thead>";
while ($row = mysqli_fetch_row($stmt)) {
	echo "<tr class='FixHead'>";
	for ($j = 0; $j < 13; $j++) {
		echo "<td class='FixHead'>".$row[$j]."</td>";
	}
	echo "</tr>";
}
echo "</table>";
echo "</body>";
?>
</html>
