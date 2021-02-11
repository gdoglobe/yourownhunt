<?php
	
	
	include('../Functions/secure.php');

	
	$Titre =  addslashes($_POST['Titre']);
	$Desciption=nl2br(addslashes($_POST['Desciption']));
	$Departement= ($_POST['Departement']);
	$Enigme =nl2br(addslashes($_POST['Enigme']));
	
	$rando=rand(1,9);
	$IDT=rand(1,99999999999);
	$IDTresor=$IDT * $rando;
	
	
	//Creation tresor:
	if(!empty($Titre) AND !empty($Desciption) AND !empty($Departement) AND !empty($Enigme) AND (ctype_digit($Departement))){
	 $Titrelength = strlen($Titre);
	 $Desciptionlength = strlen($Desciption);
	 $Departementlength = strlen($Departement);
     $Enigmelength = strlen($Enigme);

      if($Titrelength <= 30 && $Desciptionlength <= 1000 && $Departementlength <= 5 && $Enigmelength <= 1000) {
	
	$userID=$_SESSION['ID'];
	$photo=image1();
	$photoDeux=image2();
	$photoTrois=image3();



	$req = $bdd->exec("INSERT INTO treasure (ID, Titre, Desciption, Departement, Enigme, Photo1,Photo2,Photo3, Nombre_Chercheurs, Nombre_de_fois_trouvee, Statut, DateCachee, ID_User_ID) 
  VALUES ('$IDTresor', '$Titre', '$Desciption', '$Departement', '$Enigme ', '$photo', '$photoDeux', '$photoTrois', '0', '0', '0', SYSDATE(), '$userID')")or die(print_r($bdd->errorInfo()));
		
		echo "</Br><font color=\"green\">Treasure created!</font>";
		
	
	
	
	
	//TreasureFill:
		$object = array ((addslashes($_POST['objet1'])), (addslashes($_POST['objet2'])), (addslashes($_POST['objet3'])), (addslashes($_POST['objet4'])), (addslashes($_POST['objet5'])), (addslashes($_POST['objet6'])), (addslashes($_POST['objet7'])) ,(addslashes($_POST['objet8'])),(addslashes($_POST['objet9'])), (addslashes($_POST['objet10'])));
	for($i =0; $i < 10; $i++){
		$rando=rand(1,9);
	   $IDO=rand(1,99999999999);
	   $IDObjet=$IDO * $rando;
		if(!empty($object[$i])){
		$req1 = $bdd->exec("INSERT INTO `objets` (`ID`, `NomDeLobjet`, `DateAjout`, `ID_User_ID`)
		VALUES ($IDObjet,'$object[$i]', CURRENT_DATE() , '$userID')" )or die(print_r($bdd->errorInfo())); 
		
		$req2 = $bdd->exec("INSERT INTO `contenu` (`ID`, `DerniereModif`, `ModifPar`, `ID_Treasure`, `ID_Objets`) 
		VALUES (NULL, CURRENT_DATE(), '', '$IDTresor', ' $IDObjet');" )or die(print_r($bdd->errorInfo())); 
		
	
		
		} // Fin du if
	} // Fin de la boucle for
			} // Fin de la paranthèse des longeurs
		else{
			echo 'Title ou Description ou Departement ou Riddle too big !';
		}
   

   
   } // Fin des if(!empty)
	
			else{
		echo '</Br><font color="red"><b>Invaild Treasure! </B></font> ';
	
	}

	
	
	
	
	
	
	
	
	?>