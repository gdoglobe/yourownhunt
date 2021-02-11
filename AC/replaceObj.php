<?php include("../includes/headInterface.php");?>


	<body>
	      <aside class="sidebar-left">

			<a class="company-logo" href="#">YourOwnHunt</a>
			<div class="options">
		<center>	<a href='deconnexion.php'> <button type="button" class="btn btn-xs btn-rouge deco">Disconnect</button> </a> </center>

			
				
				
				
			</div>
			<div class="sidebar-links">
				<a class="link-yellow" href="DashBoard.php?id=<?php echo $valeur;?>"><i class="fa fa-compass "></i>DashBoard</a>
				<a class="link-red  " href="HiddenTreasures.php?id=<?php echo $valeur;?>"><i class="fa fa-magic"></i>Hidden Treasures</a>
				
				<a class="link-blue " href="Search.php?id=<?php echo $valeur;?>"><i class=" fa fa-search"></i>Look for a treasure </a>
				<a class="link-green selected" href="FoundTreasure.php?id=<?php echo $valeur;?>"><i class=" fa fa-map-marker"></i>Found a treasure </a>
				
			</div>
			
			
			
		</aside>
	
	<!----------------------------------------------------------------------------------------------------------------->
	
	
	   <div class="containers">
	   
			<div class="ListGauche">
	   
				<h1> Choose one item to replace: </h1><br> <br>
				
<?php
if(isset($_POST['envoyerid'])) {
	
if(!empty($_POST['idtrouve']) And is_numeric($_POST['idtrouve'])){
	
	include('../Functions/BDDConnectFNC.php');

	$idtresor = ($_POST['idtrouve']);
	$reponseverif = $bdd->query("SELECT Statut FROM `treasure` WHERE ID='$idtresor' AND Statut=1 ");
	$num_of_rows = $reponseverif->rowCount() ; //on regard le nombre de lignes envoyes par la requete
	if ($num_of_rows > 0){ 
	
	echo("<p>This Treasure isn't available</p>");
	header('refresh: 5; url=../AC/FoundTreasure.php');
	echo("<p>You are going to be redirected, Please try another treasure</p>");
	}
	
	else{
		
	$_SESSION['idtresor'] = ($_POST['idtrouve']);
	

	$reponse = $bdd->query("SELECT objets.NomDeLobjet, objets.ID FROM (objets INNER join contenu INNER JOIN treasure on objets.ID = contenu.ID_Objets AND treasure.ID=contenu.ID_Treasure) WHERE ID_Treasure ='$idtresor'");

	$num_of_rows = $reponse->rowCount() ; //on regard le nombre de lignes envoyes par la requete
		if ($num_of_rows > 0){ 
	// On affiche chaque entrée une à une

	$i=1;
	while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Item n°<?php echo $i;?></strong> : <a href="NewObj.php?id=<?php echo htmlentities( $donnees['ID']);?>"><?php echo htmlentities($donnees['NomDeLobjet']); ?></A> <br />
   </p>
<?php
$i++;
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>


</form><?php
 
		}

else{ //il ya 0 lignes dont tresor invalid donc on reviens en arriere
	
	
		 header( "Location:FoundTreasure.php" ); die;
	
}
	}
}
else{
	
	
		 header( "Location:FoundTreasure.php" ); die;
	
}


}else{
	
	
header( "Location:FoundTreasure.php" ); die;}
?>
				
				
				
				
				
   
			</div>
   
   
   
</div>

   

	
</body>
</html>