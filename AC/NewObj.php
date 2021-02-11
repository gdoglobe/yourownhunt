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
	   
				
				<?php


		if((!empty($_SESSION['idtresor']))){
	include('../Functions/BDDConnectFNC.php');

	$id_objet = ($_GET['id']);
	$_SESSION['idd'] = ($_GET['id']);
	$idtresoor = $_SESSION['idtresor'];

	$reponse = $bdd->query("SELECT `ID`, `NomDeLobjet`, `DateAjout`, `ID_User_ID` FROM `objets` WHERE ID='$id_objet'");

while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Current Item ID</strong> : <?php echo htmlentities($donnees['ID']);?><br>
	<b>Current Item name: </b><?php echo htmlentities($donnees['NomDeLobjet']); ?><br />
   </p>
    <form method="post" action="SubmitNewObjName.php">
	
	<p>Name of the new Item: <input type="text" name="newobjet" value=""></input></p>
	<p>Exchange date: <input type="date" name="newobjetDate" value=""></input></p>

	   
	   <input type="submit" name="envoyernew" value="ok"></input>
	   
	   
	   <br> <br><p>Today's time and date: <?php 
	   $heure = date('H') + 2;
	   $datetime = date("Y-m-d $heure:i:s");
		echo "<mark>$datetime</mark>"; ?>

</form>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête
	
		}
		else{
			
			
			 header( "Location:FoundTreasure.php" ); die;
			
			
		}
	

	
		?>
	   
				
				
				
				
				
   
			</div>
   
   
   
</div>

   

	
</body>
</html>