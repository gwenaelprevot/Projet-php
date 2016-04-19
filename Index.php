<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
    <title>tableau</title>
</head>
	<table id="cacher"><span><input type="button" value="Afficher" onclick="cacher();"> </span>
	<script>
	function cacher() {
  var div = document.getElementById("cacher"); 
  if(div.style.display=="none") { 
    div.style.display = ""; 
    bouton.innerHTML = "Cacher le CV"; 
  } else { 
    div.style.display = "none"; 
    bouton.innerHTML = "Afficher le CV"; 
  }
}
	</script>
	<th>stagiaire</th>
	<th>Date de naissance</th>
<?php
$DonneesCV = 'classe-simploniens.xml'; //defini variable le nom du fichier XML
$simploniens = simplexml_load_file($DonneesCV); //vas chercher le fichier XML
date_default_timezone_set("UTC");
$today = time(); //date du jour
$agetrier = []; //cree tableau Vide 
foreach($simploniens as $i){ //bouble pour recuperer tout les valeur
$date = $i->date_naissance ; //defini variable date de naissance
$tim = strtotime($date); //convertire la date en timestamp
$secondeA = 31536000; //variable nombre de seconde en 1 ans
$diff = abs($tim - $today); //diff date de naissance a nos jour
$age = floor($diff / $secondeA); // diviser par seconde par ans
$nomp = $i->nom.' '.$i->prenom; //soudage nom et prenom
$agetrier[$nomp] = $age; //rempli le tableau vide
}
asort($agetrier); // trie le tableau
foreach ($agetrier as $key => $value){ //bouble pour recuperer tout les valeur
echo "<tr><td>".$key.'</td><td>'.$value.' ANS</tr></td>'; // ecrie le tableau avec les valeur
}
?>
	</table>
	<style>
	table{
		border: solid 1px black;
		background-image:linear-gradient(orange, red);
		border-radius: 4px;
	}
	th {
		border:solid 1px black;
		border-radius: 4px;
	}
	td{
		border-radius: 4px;
		border:solid 1px black;
		text-align:center;
	}
	</style>
</html>