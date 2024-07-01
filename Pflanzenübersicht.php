<!DOCTYPE html>
<html lang="de">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0", charset="utf-8">
<title>Pflanzen</title>
<meta name="description" content="Pflanzen">
<link href="/Pflanzenwebsite/designfile.css" rel="stylesheet">
</head>
<ul class="nav">
<li class="nav"><a href="index.htm" class="nav" id="top"><b>Home</b></a></li>
<li class="nav"><a class="active" href="#pflanzen.php" class="nav"><b>Pflanzen</b></a></li>
<li class="nav"><a href="aussaatplan.php" class="nav"><b>Aussaatplan</b></a></li>
<li class="nav"><a href="infos.htm" class="nav"><b>Infos</b></a></li>
<li class="nav" style="float:right"><a href="galerie.htm" class="nav"><b>Galerie</b></a></li>
</ul>
<br>
<div class="info">Pflanzenübersicht</div>
<br><br>
<div>
<a href="#top" class="back"><b>&#8682</b></a>
</div>
<body>
<center>
<ul class="nav2"><b>
<?php
$username = ###; 
$password = ###; 
$database = "garten"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 

$query = "SELECT DISTINCT LEFT(Name, 1) AS Letter FROM pflanzendaten ORDER BY Letter";
$stmt = $mysqli->query($query);
while ($row = mysqli_fetch_assoc($stmt)) {
	echo "<li class='nav'><a href='#".$row['Letter']."' class='nav'>".$row['Letter']."</a></li>";
}
echo "</b></ul></center><br>";

$query = "SELECT ID, Pfad, Name, LEFT(Name, 1) AS Letter FROM pflanzendaten ORDER BY Name";
$stmt = $mysqli->query($query);
$letter = null; 

while ($row = mysqli_fetch_assoc($stmt)) {
	if ($letter != $row['Letter']){
		$letter = $row['Letter'];
		echo "<h1 id=".$letter.">".$letter."</h1>";
		$zahl = 0;
	}
	echo "<figure class='figure4'><a href='detail.php?ID=".$row['ID']."&Name=".$row['Name']."'><img class='bild' src=".$row['Pfad'].">
	<figcaption><b>".$row['Name']."</b></figcaption></a></figure>";
	$zahl = $zahl+1;
	if ($zahl % 7 == 0) echo "<br>";
}

mysqli_close($mysqli)
?>

</body>
</html>
