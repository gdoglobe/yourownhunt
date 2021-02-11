<?php include("../includes/headInterface.php");?>


	<body>
	
	     <aside class="sidebar-left">

			<a class="company-logo" href="#">YourOwnHunt</a>
			<div class="options">
		<center>	<a href='deconnexion.php'> <button type="button" class="btn btn-xs btn-rouge deco">Disconnect</button> </a> </center>

			
				
				
				
			</div>
			<div class="sidebar-links">
				<a class="link-yellow" href="DashBoard.php?id=<?php echo $valeur;?>"><i class="fa fa-compass "></i>DashBoard</a>
				<a class="link-red selected " href="HiddenTreasures.php?id=<?php echo $valeur;?>"><i class="fa fa-magic"></i>Hidden Treasures</a>
				
				<a class="link-blue " href="Search.php?id=<?php echo $valeur;?>"><i class=" fa fa-search"></i>Look for a treasure </a>
				<a class="link-green " href="FoundTreasure.php?id=<?php echo $valeur;?>"><i class=" fa fa-map-marker"></i>Found a treasure </a>
				
			</div>
			
			
			
		</aside>
	
	<!----------------------------------------------------------------------------------------------------------------->
	
	
	   <div class="containers">
	   
	   <div class="ListGauche">
   
	<h2> Create a new treasure: </h2>
	<form method="POST" action="" enctype="multipart/form-data">
		<p> Treasure's title :</p>
			<input name="Titre" type="text"  value="">
 
		<p>
			<label >Package description:</label><br />
			<textarea name="Desciption" maxlength='1000' ></textarea>
		</p>


		

		<p> Departement </p>
			<input type="number" name="Departement" value="">
			
			</Br></br>
			
		<input type="hidden" name="MAX_FILE_SIZE" value="8388608">  <!-- Il existe une securite supplementaire cote serveur -->
		

     <label for="photo">Photo (JPG, JPEG, PNG or GIF | max.8 Mo)  :</label><br />
	 
     <input type="file" name="photo" id="photo" class="custom-file-input" /><br />
	
	 
	 <!-- ------------------------------------------>
	 
	 
	 <label for="photoDeux">Photo (JPG, JPEG, PNG or GIF | max.8 Mo)  :</label><br />
	 
     <input type="file" name="photoDeux" class="custom-file-input"/><br />
	 
	  <!-- ------------------------------------------>
	 
	 
	 <label for="photoTrois">Photo (JPG, JPEG, PNG or GIF | max.8 Mo) :</label><br />
	 
     <input type="file" name="photoTrois" class="custom-file-input"  /><br />
     
			
			
		
		<p>
			<label > <strong>Your Riddle </strong> (1000 caracters Max) :</label><br />
			<textarea name="Enigme" maxlength='1000'></textarea>
		</p>
		


		

		</br></Br><h3>Add up to 10 Items into your treasure chest! </h3>(one Item at least and 10 max)</br></Br>
		
		
	 
	 <table>
	 
	 
	 <tr>
		<td><label for="">Item 1  :</label><br />
		<input type="text" name="objet1" /><br /></td>  
	 
	 <!-- ------------------------------------------>
	
	<td> <label for="">Item  2 :</label><br />
	 
     <input type="text" name="objet2"  /><br /></td>  
	 
	</tr>  <!-- ------------------------------------------>
	<tr> 
	<td>	 <label for="">Item 3 :</label><br />
	 
     <input type="text" name="objet3" /><br /></td>  
	 
	  <!-- ------------------------------------------>
	<td>  	 <label for="">Item 4:</label><br />
	 
     <input type="text" name="objet4" /><br /></td>  
	 
	 </tr>   <!-- ------------------------------------------>
	<tr>  <td>	 <label for="">Item 5  :</label><br />
	 
     <input type="text" name="objet5"  /><br /></td>  
	 
	<!-- ------------------------------------------>
	  
	<td><label for="">Item 6 :</label><br />
	 
     <input type="text" name="objet6"  /><br /></td>  
	 
	</tr>  <!-- ------------------------------------------>
	<tr><td>  	 <label for="">Item 7 :</label><br />
	 
     <input type="text" name="objet7"  /><br /></td>  
	 
	   <!-- ------------------------------------------>
	<td>  	 <label for="">Item 8 :</label><br />
	 
     <input type="text" name="objet8"  /><br /></td>  
	</tr>   
	<tr>  <!-- ------------------------------------------>
	<td>  	 <label for="">Item 9 :</label><br />
	 
     <input type="text" name="objet9"  /><br /></td>  
	 
	  <!-- ------------------------------------------>
	<td>  	 <label for="">Item 10 :</label><br />
	 
     <input type="text" name="objet10"  /><br /></td>  
	 
	<!-- ------------------------------------------>
	</tr>		
	</table>
		
		<br> 
		<hr>
		<input type="submit" name="CreateTreasure" style='color:red;'  value="Create Treasure!"></Br></br>

		
		
		</form>
		<?php
	
	if(isset($_POST['CreateTreasure'])) {
	include '../Functions/UploadPhotosFNC.php';
	include '../Functions/BDDConnectFNC.php';
	include '../Functions/TreasureCreateFNC.php';
	
	}
?>
	</div>
	
	
 
<div class='ListGauche'>
   <h2> Disable  a lost Treasure:</h2>
  
	<p>	Treasure ID: </p>
	<form method="POST"> 
		
		<input name="ID" type="number"  value="">
		
		<input type ="submit" style='color:red;' Value="Disable Treasure" name="UpdateTreasure"> 
		
		
	
	</form>

<?php
	if(isset($_POST['UpdateTreasure'])) {

		include '../Functions/BDDConnectFNC.php';
		
		$userID=$_SESSION['ID'];
		
		$TreasureID= ($_POST['ID']);
		
	
		
		$reponse = $bdd->query("SELECT ID_User_ID, ID  FROM `treasure` WHERE ID='$TreasureID'");
		$num_of_rows = $reponse->rowCount() ; //on regard le nombre de lignes envoyes par la requete
		if ($num_of_rows != 0){

		
		
	while ($donnees = $reponse->fetch())
	{
		
		if($userID==$donnees['ID_User_ID']){
			
			$req=$bdd->exec( " UPDATE `treasure` SET `Statut` = '1' WHERE `treasure`.`ID` = '$TreasureID';  " );
			echo "<p style='color:Green;'> Treasure number '$TreasureID' has been successfully disabled!</p>";
		}
		else{
			echo "<p style='color:red;'> You can only disable your own treasures!</p>";
		}
	
	}

		$reponse->closeCursor();

	}
	else{ echo ("<p> Invaild Treasure ID </p>");  }
	
	}
	
	
	
	
	
	
	


?>
	 

   </div>
   
   
   
</div>

   

	
</body>
</html>