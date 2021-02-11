<?php
if (!empty($_POST['ObjectSearch']) ){

$ObjectSearch = htmlentities(trim(($_POST['ObjectSearch'])));
echo "<h3>Treasure(s) which contains this object : $ObjectSearch</h3> <br>";
include 'BDDConnectFNC.php';
$reponse = $bdd->query("SELECT treasure.ID_User_ID, treasure.ID,treasure.Titre,treasure.Departement,treasure.Nombre_Chercheurs,treasure.Nombre_de_fois_trouvee,treasure.DateCachee,user_id.Pseudo FROM (objets INNER join contenu INNER JOIN treasure INNER JOIN user_id on objets.ID = contenu.ID_Objets AND treasure.ID=contenu.ID_Treasure AND user_id.ID=treasure.ID_User_ID ) WHERE objets.NomDeLobjet LIKE '$ObjectSearch' And treasure.Statut='0' ORDER BY `DateCachee` DESC");

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	
	
?>
    <p>
 <strong>Title</strong> : <a href="details.php?id=<?php echo htmlentities($donnees['ID']);?>"><?php echo htmlentities($donnees['Titre']); ?></A> <strong>, Departement :</Strong> <?php echo htmlentities($donnees['Departement']); ?> <strong>, Hidden the: </Strong> <?php echo htmlentities($donnees['DateCachee']); ?><strong> Hidden By:</Strong> <?php echo htmlentities($donnees['Pseudo']); ?><strong>, People looking for this treasure: </Strong> <?php echo htmlentities($donnees['Nombre_Chercheurs']); ?><strong>, This treasure was found </Strong> <?php echo htmlentities($donnees['Nombre_de_fois_trouvee']); ?>  <strong> times. </strong>
 <form method="POST" action="../Functions/FindThisTreasureFNC.php"> 
		
		<input type="hidden" name="TreasureID" value="<?php echo htmlentities($donnees['ID']); ?>">
		<input type ="submit" name="iWillFindTreasure" value="Find this treasure!"> 
	</form><br /><hr>   </p>
<?php



}
$reponse->closeCursor(); // Termine le traitement de la requête
}
else {
	
	
	echo "<p> Please enter a valid Item name! </p>";
	
}



?>



	










