<?php include("../includes/headInterface.php");?>


	<body>
	      <aside class="sidebar-left">

			<a class="company-logo" href="#">YourOwnHunt</a>
			<div class="options">
		<center>	<a href='deconnexion.php'> <button type="button" class="btn btn-xs btn-rouge deco">Disconnect</button> </a> </center>

			
				
				
				
			</div>
			<div class="sidebar-links">
				<a class="link-yellow" href="../AC/DashBoard.php?id=<?php echo $valeur;?>"><i class="fa fa-compass "></i>DashBoard</a>
				<a class="link-red  " href="../AC/HiddenTreasures.php?id=<?php echo $valeur;?>"><i class="fa fa-magic"></i>Hidden Treasures</a>
				
				<a class="link-blue " href="../AC/Search.php?id=<?php echo $valeur;?>"><i class=" fa fa-search"></i>Look for a treasure </a>
				<a class="link-green " href="../AC/FoundTreasure.php?id=<?php echo $valeur;?>"><i class=" fa fa-map-marker"></i>Found a treasure </a>
				
			</div>
			
			
			
		</aside>
	
	
	<!----------------------------------------------------------------------------------------------------------------->
	
<div class="containers">
	   
			<div class="ListGauche">
	<?php
	
		if(isset($_POST['iWillFindTreasure'])) {
		
		include 'BDDConnectFNC.php';

		$userID=$_SESSION['ID'];
		
		$TreasureID = ($_POST['TreasureID']);
		
		//verification si l'utilisateur cherche deja ce tresor:
		
		$verif = $bdd->query("SELECT * FROM `encours` WHERE `ID_User_ID` = '$userID' AND `ID_Treasure` ='$TreasureID'");
		
		
		$num_of_rows = $verif->rowCount() ;
		if ($num_of_rows==0){ 
	
		$reponse = $bdd->query("SELECT `ID_User_ID` FROM `treasure` WHERE `ID`='$TreasureID'")or die(print_r($bdd->errorInfo()));

			
			
			
			while ($donnees = $reponse->fetch()){
		
		if($userID!=$donnees['ID_User_ID']){
			
			$req=$bdd->exec( " INSERT INTO `encours` (`DateRecherche`, `ID`, `ID_User_ID`, `ID_Treasure`) 
			VALUES (CURRENT_DATE(), NULL, '$userID', '$TreasureID') " )or die(print_r($bdd->errorInfo())); 
		
			
		
			$req2=$bdd->exec("UPDATE `treasure` SET `Nombre_Chercheurs` =`Nombre_Chercheurs`+1 WHERE `treasure`.`ID` ='$TreasureID' ")or die(print_r($bdd->errorInfo())); 
		
			echo "<h2 Style='color:green;'> Treasure added successfully to your seeking list! Have fun :) </h2> <br> <a href='../AC/search.php'>>Try Another search< </a> <h3>Or </h3> <p Style='color:Blue;'>  You will be automatically redirected to your dashboard in 5 secondes or you can go now: </p> <a style='color:Black;'; href='../AC/DashBoard.php'> Go to Dashboard!  </a>";
			header('refresh: 10; url=../AC/DashBoard.php');
		}
		
		
	
	
		else{
			echo "<h2 Style='color:red;'> You can't search your own treasure! </h2> <br> <a href='../AC/search.php'>>Try Another search< </a>";
		}
		$reponse->closeCursor();
		
		

		
		
		}
		
		
		}
		else{echo "<h Style='color:red;'2> You are already looking for this treasure! </h2> <br> <a href='../AC/search.php'>>Try Another search< </a>";}
	
	
	
		}
	
	
	
	else{
		 header( "Location:../AC/Search.php" ); die;
		
		
		
	}
	
	


?>
			
			</div>
   
   
   
</div>

   

	
</body>
</html>







