
<?php

include ('BDDConnectFNC.php'); //on se connect a la base et on envoie la requete
$reponse = $bdd->query('SELECT * FROM treasure WHERE Statut=0 ORDER BY `treasure`.`Departement` DESC');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	
	 if ($donnees['Statut']==0){
	 $statut="Available";
	 
	 }
	
?>
		<section class="List">
		<nav id="nav">
		
		<p> <a href="#"><?php echo htmlentities($donnees['Titre']); ?></A> <strong class="param"> Departement :</Strong> <?php echo htmlentities($donnees['Departement']); ?> <strong class="param">Status: </Strong> <?php echo $statut; ?><br />
		</nav>
		
		
		</p>
		
		</section>

<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>

