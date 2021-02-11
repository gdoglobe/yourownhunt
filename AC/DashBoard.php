

<?php include("../includes/headInterface.php");?>

<?php  $valeur=$_SESSION['ID']; ?>




 
	<body>
	
        
          <aside class="sidebar-left">

			<a class="company-logo" href="#">YourOwnHunt</a>
			<div class="options">
		<center>	<a href='deconnexion.php'> <button type="button" class="btn btn-xs btn-rouge deco">Disconnect</button> </a> </center>

			
				
				
				
			</div>
			<div class="sidebar-links">
				<a class="link-yellow selected" href="DashBoard.php?id=<?php echo $valeur;?>"><i class="fa fa-compass "></i>DashBoard</a>
				<a class="link-red  " href="HiddenTreasures.php?id=<?php echo $valeur;?>"><i class="fa fa-magic"></i>Hidden Treasures</a>
				
				<a class="link-blue " href="Search.php?id=<?php echo $valeur;?>"><i class=" fa fa-search"></i>Look for a treasure </a>
				<a class="link-green " href="FoundTreasure.php?id=<?php echo $valeur;?>"><i class=" fa fa-map-marker"></i>Found a treasure </a>
				
			</div>
			
			
			
		</aside>
	  
		<!--------------------------------------------------->
	

	
	



   <div class="containers">
   <div class='ListGauche'>
    <h2>Your treasures: </h2>
   
   <?php
   include '../Functions/BDDConnectFNC.php';
   $userID=$_SESSION['ID'];
		
	$reponse = $bdd->query(" SELECT `ID`, `Titre`,`Statut`, `DateCachee` FROM `treasure` WHERE ID_User_ID ='$userID'  ORDER BY `treasure`.`DateCachee` DESC ");
	
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	
	if ($donnees['Statut']==0){
	 $statut="Available";
	 }
?>
	
    <p>
	-> <a href="details.php?id=<?php echo $donnees['ID'];?>"><?php echo $donnees['Titre']; ?></A> - <strong > ID: </strong><?php echo $donnees['ID']; ?>
   </p>
   
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
   
   </div>
   
	
	<div class='ListGauche'>
	<H2>Treasures you found: </H2>
	
	<br> <br>

	<?php
		include '../Functions/BDDConnectFNC.php';
		
		$userID=$_SESSION['ID'];
		
	$reponse = $bdd->query("SELECT trouver.ID_Treasure, trouver.ID_User_ID,trouver.DateTrouvee ,Titre FROM (treasure INNER JOIN trouver on trouver.ID_Treasure = treasure.ID)WHERE trouver.ID_User_ID='$userID'  ORDER BY trouver.DateTrouvee DESC");
	
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
	
    <p>
    -> <a href="details.php?id=<?php echo $donnees['ID_Treasure'];?>"><?php echo $donnees['Titre']; ?></A> - <strong > Found the: </strong><?php echo $donnees['DateTrouvee']; ?>.
   </p>
   
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
   
   
   </div>
   
   <div class='ListGauche'>
	<H2>Treasures you are looking for: </H2>
	
	<br> <br>

	<?php
		include '../Functions/BDDConnectFNC.php';
		
		$userID=$_SESSION['ID'];
		
	$reponse = $bdd->query("SELECT encours.ID_Treasure, encours.ID_User_ID,encours.DateRecherche ,Titre FROM (treasure INNER JOIN encours on encours.ID_Treasure = treasure.ID) WHERE encours.ID_User_ID='$userID' ORDER BY encours.DateRecherche DESC");

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
	
    
   -> <a href="details.php?id=<?php echo $donnees['ID_Treasure'];?>"><?php echo $donnees['Titre']; ?></A>- <strong > Started searching on: </strong><?php echo $donnees['DateRecherche']; ?>.
	<br><hr>
   
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
  
   
   </div>
   
   
   		
	 

   </div>

	
   
	

</body>
</html>
