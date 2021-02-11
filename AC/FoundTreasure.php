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
	   
				<form action="replaceObj.php" method="POST" >

			<p>	<strong>Found Treasure ID:  </strong><input class="search" placeholder="Enter The treasure ID" type="number" name="idtrouve"><br> </p>
				<input type="submit" name="envoyerid" value="Submit">
				</form>

				
				
				
				
				
				
   
			</div>
   
   
   
</div>

   

	
</body>
</html>