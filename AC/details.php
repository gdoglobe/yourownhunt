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
				<a class="link-green " href="FoundTreasure.php?id=<?php echo $valeur;?>"><i class=" fa fa-map-marker"></i>Found a treasure </a>
				
			</div>
			
			
			
		</aside>
	
	<!----------------------------------------------------------------------------------------------------------------->
	
<div class="containers">
	   
			<div class="ListGauche">
	  
	<?php	
		include '../Functions/BDDConnectFNC.php';

	
	$IDtresor = ($_GET['id']);
	$reponse = $bdd->query("SELECT treasure.*, user_id.Pseudo FROM (`treasure` INNER JOIN user_id ON user_id.ID=treasure.ID_User_ID) WHERE treasure.ID='$IDtresor' ");
	while ($donnees = $reponse->fetch())
	{

	?>
	
	
	
	<h1>Details of <?php echo htmlentities($donnees['Titre']); ?> :</h1><br> <br>
	
	<form method="POST" action="../Functions/FindThisTreasureFNC.php"> 
		
		<input type="hidden" name="TreasureID" value="<?php echo htmlentities($donnees['ID']); ?>">
		<input type ="submit" name="iWillFindTreasure" value="Find this treasure!"> 
	</form><br /><hr> 
	
	<strong> Treasure's ID :</strong> <p>  <?php echo htmlentities($donnees['ID']); ?></p>
	<strong> Title: </strong> <p> <?php echo htmlentities($donnees['Titre']); ?></p>
	<strong>Description : </strong> <p><?php echo ($donnees['Desciption']); ?></p>
	<strong>Riddle : </strong> <p><?php echo ($donnees['Enigme']); ?></p>

	<strong> Location (Departement) : </strong> <p> <?php echo htmlentities($donnees['Departement']); ?></p>
	
	
	<Strong>It was Hidden the: </strong> <p> <?php echo htmlentities($donnees['DateCachee']); ?> by   <?php echo htmlentities($donnees['Pseudo']); ?></p>
	<Strong>Picture(s) of the treasure: </strong> <p> <img onerror="this.style.display='none';"
 width="200" height="100"  src="<?php echo htmlentities($donnees['Photo1']); ?>" ></img>  <br><Br> <img onerror="this.style.display='none';"
 width="200" height="100"  src="<?php echo htmlentities($donnees['Photo2']); ?>"  ></img>  <br><Br> <img onerror="this.style.display='none';"
 width="200" height="100"  src="<?php echo htmlentities($donnees['Photo3']); ?>"></img> 
	
	<br> <br>
	<strong> This treasure contains these Items: </strong><br>
	
	<?php 
	
	
$idtresor = $donnees['ID'];


// On récupère tout le contenu de la table treasure
$reponse = $bdd->query("SELECT objets.NomDeLobjet FROM (objets INNER join contenu INNER JOIN treasure on objets.ID = contenu.ID_Objets AND treasure.ID=contenu.ID_Treasure) WHERE ID_Treasure ='$idtresor'");


?>

<?php 
$i = 1;
while ($donnees = $reponse->fetch())// On affiche chaque entrée une à une
{

if(!empty($donnees['NomDeLobjet'])){
?><br>
   <p>
         <strong>Item <?php echo $i;?> : </strong> <?php echo htmlentities($donnees['NomDeLobjet']); ?> <br />

      
   </p>

   <?php
   
 
}


$i++;
}


$reponse->closeCursor(); // Termine le traitement de la requête

?>	
	
	
	<?php

	}
		$reponse->closeCursor(); // Termine le traitement de la requête

 
 
?>
	    
			
			</div>
   
		<div class="ListGauche">
		
		
		
		<h2> History of this treasure:</h2>
  <?php 
	$IDTreasure = ($_GET['id']);
	//$reponse = $bdd->query("SELECT `DateChangee`, `ID_User_ID`, `ID_Treasure`, `ID_Objets`, `ID_Objets_1` FROM `historique` WHERE `ID_Treasure`='$IDTreasure' ORDER BY  `DateChangee` DESC");
	
	$reponse = $bdd->query("SELECT DateChangee, ID_Treasure, ID_Objets, ID_Objets_1 ,user_id.Pseudo,objets.NomDeLobjet AS 'VieuxObjet' FROM (historique INNER JOIN user_id ON user_id.ID=historique.ID_User_ID INNER JOIN objets on objets.ID=historique.ID_Objets ) WHERE ID_Treasure='$IDTreasure' ORDER BY DateChangee DESC");
	$reponse2= $bdd->query("SELECT DateChangee, ID_Treasure, ID_Objets, ID_Objets_1 ,user_id.Pseudo,objets.NomDeLobjet AS 'NouveauObjet' FROM (`historique` INNER JOIN user_id ON user_id.ID=historique.ID_User_ID INNER JOIN objets on objets.ID=historique.ID_Objets_1 ) WHERE `ID_Treasure`='$IDTreasure' ORDER BY DateChangee DESC");
  while ($donnees = $reponse->fetch() and $donnees2 = $reponse2->fetch()  )
	  
	{

	?>
	
	
	
	
	
	
			<br>
			   <p>
					-- <?php echo htmlentities($donnees['Pseudo']); ?> <strong> Replaced : <u style ="color:red;"> </strong><?php echo htmlentities($donnees['VieuxObjet']); ?></u>  <strong>by</strong> <u style ="color:red;"> <?php echo htmlentities($donnees2['NouveauObjet']); ?> </u> on <u style ="color:red;"> <?php echo htmlentities($donnees['DateChangee']); ?> </u> .  <br />
			  
			   </p>

			   <?php
			   
			 
			



			}


			$reponse->closeCursor(); // Termine le traitement de la requête

				?>
 
		</div>
   
</div>

   

	
</body>
</html>