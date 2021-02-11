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



if(isset($_POST['envoyernew'])){
	
	if ((!empty( $_SESSION['idd'])) AND (!empty($_POST['newobjet'])) AND (!empty($_POST['newobjetDate']))){
		$id_tresor=$_SESSION['idtresor'];
		$userID=$_SESSION['ID'];
		include ('../Functions/BDDConnectFNC.php');

		//on commence par chercher si l'utilisateur essaye de trouver son propre tresor:
		$reponse = $bdd->query("SELECT `ID_User_ID` FROM `treasure` WHERE `ID`='$id_tresor'")or die(print_r($bdd->errorInfo()));

			
			
			
			while ($donnees = $reponse->fetch()){
		
		if($userID!=$donnees['ID_User_ID']){ //si l'utilisateur actualle n'ets pas celui qui a creer ce tresor, alors il peut le trouver.
			
			//verification si l'utilisateur cherche deja ce tresor:
		
		$verif = $bdd->query("SELECT * FROM `encours` WHERE `ID_User_ID` = '$userID' AND `ID_Treasure` ='$id_tresor'");
		
		
		$num_of_rows = $verif->rowCount() ; //on regard le nombre de lignes envoyes par la requete
		if ($num_of_rows > 0){  //si on a plusieurs lignes, alors l'utilisateur a cherche le tresor, sinon l'utilisateur ne cherche pas le tresor. on annulle.
			
			
			$rando=rand(1,9);
			$IDO=rand(1,99999999999);
			$IDrand2=rand(1,99999999999);
			$IDrand3=rand(1,99999999999);
			$IDObjet=$IDO * $rando;
			$newobjet= addslashes(($_POST['newobjet']));
			$newobjetDate=($_POST['newobjetDate']);
			
			$id_objet = $_SESSION['idd'];
			
			
			//On creer le nouveau objet:
			$req1 = $bdd->exec("INSERT INTO `objets` (`ID`, `NomDeLobjet`, `DateAjout`, `ID_User_ID`)
		VALUES ($IDObjet,'$newobjet', '$newobjetDate' , '$userID')" )or die(print_r($bdd->errorInfo())); 
			//on met à jour la table contenu en effacant le lien entre le tresor et l'ancien objet vers le nouveau objet
			$req2 = $bdd->exec("UPDATE `contenu` SET `DerniereModif` = '$newobjetDate', `ID_Objets` = '$IDObjet' WHERE `ID_Objets` = '$id_objet';")or die(print_r($bdd->errorInfo()));
			$req6 = $bdd->exec("INSERT INTO `historique` (`DateChangee`, `ID`, `ID_User_ID`, `ID_Treasure`, `ID_Objets`, `ID_Objets_1`) 
			VALUES ('$newobjetDate', '$IDrand2', '$userID', '$id_tresor', '$id_objet', '$IDObjet')");
			$req3= $bdd->exec("DELETE FROM `encours` WHERE `encours`.`ID_User_ID` = '$userID' AND `encours`.`ID_Treasure` = '$id_tresor'");
			$req4= $bdd->exec("INSERT INTO `trouver` (`DateTrouvee`, `ID`, `ID_User_ID`, `ID_Treasure`) VALUES ('$newobjetDate', '$IDrand3', '$userID', '$id_tresor')");
			$req5=$bdd->exec("UPDATE `treasure` SET `Nombre_Chercheurs` =`Nombre_Chercheurs`-1,`Nombre_de_fois_trouvee`=`Nombre_de_fois_trouvee`+1  WHERE `treasure`.`ID` ='$id_tresor' ")or die(print_r($bdd->errorInfo())); 
			
		
		echo 'Treasure Updated!';

		
		}else { echo "<h2 style='color:red;'> You can't find a treasure you are not looking for! </h2>";}
		}
			
			else { echo "<h2 style='color:red;'> You can't Find your own treasure! </h2>";}
			}
			
		
	
	}
	else{
		echo "<p> <strong> Please give a valid new object name and date and try again. </strong> </p>";
		}
		
		}
else { header( "Location:FoundTreasure.php" ); die;}
		
		
		
		
		

		?>
		</br><a href="FoundTreasure.php">Back to "Found a treasure"</a>
	

				
				
				
				
   
			</div>
   
   
   
</div>

   

	
</body>
</html>