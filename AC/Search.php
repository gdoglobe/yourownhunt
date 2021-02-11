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
				
				<a class="link-blue selected" href="Search.php?id=<?php echo $valeur;?>"><i class=" fa fa-search"></i>Look for a treasure </a>
				<a class="link-green " href="FoundTreasure.php?id=<?php echo $valeur;?>"><i class=" fa fa-map-marker"></i>Found a treasure </a>
				
			</div>
			
			
			
		</aside>
	<!----------------------------------------------------------------------------------------------------------------->
	
	
	   <div class="containers">
	   
			<div class="ListGauche">
	   
	   
			<form action="" method="POST">

				<h1>Search By departement: </h1>
				
				
				<p> <input type="number" class="search" name="numdepartement" placeholder="Please enter a departement number..">
		</p>

<br>
				<p> <input type="submit" value="submit"  name="searchDep">
				</p>
			</form>


			
				
				
				 <?php  
				 
				 if(isset($_POST['searchDep'])) {
				 include ('../Functions/SearchDepFNC.php');
				 
				 
				 }
					?> 


   
			</div>
			
			
			
			<div class="ListDroit">
	  
	   
			<form action="" method="POST">
		
				<h1>Search By Items: </h1>
				
				<p>
				 <input type="text" class="search" name="ObjectSearch" placeholder="Search by Items..">
		</p>

				<br>
				<p> <input type="submit" value="submit"  name="searchObj">
				</p>
			</form>


			
				
				
				 <?php  
				 
				
				 
				 
				if(isset($_POST['searchObj'])) {
				 include ('../Functions/SearchObjFNC.php');
				
				 
				 
				 }
					?> 
				
				
				

   
			</div>
   
   
   
</div>

   

	
</body>
</html>