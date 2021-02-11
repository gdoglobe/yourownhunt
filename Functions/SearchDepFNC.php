<?php
if (!empty($_POST['numdepartement']) And is_numeric($_POST['numdepartement']) ){
	

$numdepartement = htmlentities(trim(($_POST['numdepartement'])));
echo "<h3>Treasure(s) located in this departement : $numdepartement</h3> <br>";
include 'BDDConnectFNC.php';
$reponse = $bdd->query("SELECT treasure.*,user_id.Pseudo FROM (treasure INNER JOIN user_id ON treasure.ID_User_ID=user_id.ID)WHERE `Departement` LIKE '$numdepartement' AND `Statut` = 0 ORDER BY `Titre` DESC");

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	
	
?>
    <p>
 <strong>Title</strong> : <a href="details.php?id=<?php echo htmlentities($donnees['ID']);?>"><?php echo htmlentities($donnees['Titre']); ?></A> <strong>, Departement :</Strong> <?php echo htmlentities($donnees['Departement']); ?> <strong>, Hidden the: </Strong> <?php echo htmlentities($donnees['DateCachee']); ?><strong> Hidden By:</Strong> <?php echo htmlentities($donnees['Pseudo']); ?><strong>, People looking for this treasure: </Strong> <?php echo htmlentities($donnees['Nombre_Chercheurs']); ?><strong>, This treasure was found  </Strong> <?php echo htmlentities($donnees['Nombre_de_fois_trouvee']); ?> <strong>times.</strong>
 <form method="POST" action="../Functions/FindThisTreasureFNC.php"> 
		
		<input type="hidden" name="TreasureID" value="<?php echo htmlentities($donnees['ID']); ?>">
		<input type ="submit" name="iWillFindTreasure" value="Find this treasure!"> 
	</form><br /><hr>   </p>
<?php


}
$reponse->closeCursor(); // Termine le traitement de la requête
}
else {
	
	
	echo "<p> Please enter a valid Departement number! </p>";
	
}
?>



	










