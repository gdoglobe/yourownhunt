
<?php
function image1(){
	
//-----------------------------------------------------
	//Nom de l'image 1
	$userID=$_SESSION['ID'];
	
	
	if (!file_exists("../images/$userID")) {
    mkdir("../images/$userID", 0700);
}
	
	
	
	
	
	$sousdossier='../images/'.$userID.'/';
	
	$ph = basename($_FILES['photo']['name']);
	
	$photo =  $sousdossier.$ph;

	// UPLOAD DE L'IMAGE
	$fichier = basename($_FILES['photo']['name']);
	
	if (!empty($fichier)){
	
	
	$taille_maxi = 8388608;
	$taille = filesize($_FILES['photo']['tmp_name']);
	$extensions = array('.PNG','.png','.gif','.GIF', '.jpg','.JPG', '.jpeg', '.JPEG');
	$extension = strrchr($_FILES['photo']['name'], '.'); 
	//Début des vérifications de sécurité...
	if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		 $erreur = '<font color="red">Please upload a png, gif, jpg, jpeg only!</font>';
	}
	if($taille>$taille_maxi)
	{
		 $erreur = 'Your file size is too big!...';
	}
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
	{
		 //On formate le nom du fichier ici...
		 $fichier = strtr($fichier, 
			  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		 if(move_uploaded_file($_FILES['photo']['tmp_name'], $sousdossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		 {
			 //  echo 'Photo(s) uploaded successfully!';
		 }
		 else //Sinon (la fonction renvoie FALSE).
		 {
			  echo 'An error has occured while uploading your photo(s).';
		 }
	}
	else
	{
		 echo $erreur;
	}
	
		return $photo;
}
}
	
	
//-----------------------------------------------------
	function image2(){
		
	//Nom de l'image 2
	$userID=$_SESSION['ID'];
	
	
	if (!file_exists("../images/$userID")) {
    mkdir("../images/$userID", 0700);
}
	
	
	
	
	
	$sousdossier='../images/'.$userID.'/';
	$phDeux = basename($_FILES['photoDeux']['name']);
	$photoDeux = $sousdossier . $phDeux;
	
	// UPLOAD DE L'IMAGE
	$fichierDeux = basename($_FILES['photoDeux']['name']);
	
	if (!empty($fichierDeux)){
	
	
	
	$taille_maxi = 8388608;
	$tailleDeux = filesize($_FILES['photoDeux']['tmp_name']);
	$extensions = array('.PNG','.png','.gif','.GIF', '.jpg','.JPG', '.jpeg', '.JPEG');
	$extensionDeux = strrchr($_FILES['photoDeux']['name'], '.'); 
	//Début des vérifications de sécurité...
	if(!in_array($extensionDeux, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		 $erreur = '<font color="red">Please upload a png, gif, jpg, jpeg only!</font>';
	}
	if($tailleDeux>$taille_maxi)
	{
		 $erreur = 'Your file size is too big!...';
	}
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
	{
		 //On formate le nom du fichier ici...
		 $fichierDeux = strtr($fichierDeux, 
			  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		 $fichierDeux = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierDeux);
		 if(move_uploaded_file($_FILES['photoDeux']['tmp_name'], $sousdossier . $fichierDeux)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		 {
			 //  echo 'Photo(s) uploaded successfully!';
		 }
		 else //Sinon (la fonction renvoie FALSE).
		 {
			  echo 'An error has occured while uploading your photo(s).';
		 }
	}
	else
	{
		 echo $erreur;
	}

	return $photoDeux ;
	}}
//-----------------------------------------------------

//-----------------------------------------------------
	function image3(){
			
	//Nom de l'image 3
	$userID=$_SESSION['ID'];
	
	
	if (!file_exists("../images/$userID")) {
    mkdir("../images/$userID", 0700);
}
	
	
	
	
	
	$sousdossier='../images/'.$userID.'/';
	$phTrois = basename($_FILES['photoTrois']['name']);
	$photoTrois = $sousdossier . $phTrois;
	
	// UPLOAD DE L'IMAGE
	$fichierTrois = basename($_FILES['photoTrois']['name']);
	
	
	if (!empty($fichierTrois)){
	
	$taille_maxi = 8388608;
	$tailleTrois = filesize($_FILES['photoTrois']['tmp_name']);
	$extensions = array('.PNG','.png','.gif','.GIF', '.jpg','.JPG', '.jpeg', '.JPEG');
	$extensionTrois = strrchr($_FILES['photoTrois']['name'], '.'); 
	//Début des vérifications de sécurité...
	if(!in_array($extensionTrois, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		 $erreur = '<font color="red">Please upload a png, gif, jpg, jpeg only!</font>';
	}
	if($tailleTrois>$taille_maxi)
	{
		 $erreur = 'Your file size is too big!...';
	}
	if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
	{
		 //On formate le nom du fichier ici...
		 $fichierTrois = strtr($fichierTrois, 
			  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		 $fichierTrois = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierTrois);
		 if(move_uploaded_file($_FILES['photoTrois']['tmp_name'], $sousdossier . $fichierTrois)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		 {
			  // echo 'Photo(s) uploaded successfully!';
		 }
		 else //Sinon (la fonction renvoie FALSE).
		 {
			  echo 'An error has occured while uploading your photo(s).';
		 }
	}
	else
	{
		 echo $erreur;
	}
	
	return $photoTrois;
	}}
	
	
	
	?>