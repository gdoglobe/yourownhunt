<?php
include ('../Functions/BDDConnectFNC.php'); //on se connect à la base

if(isset($_POST['forminscription'])) {    

   $pseudo = htmlentities(trim($_POST['pseudo']));
   $mdp =sha1( $_POST['mdp']);
   $mdp2 =sha1( $_POST['mdp2']);
  
   if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) { 
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 20) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO user_id(Pseudo, Password) VALUES(?, ?)"); //on prepare la requete pour l'insertion des donnees das la base si tous les criteres sont bons.
                     $insertmbr->execute(array($pseudo, $mdp));
                     $erreur = "<p>Your account has been created ! <a href=\"connexion.php\">Sign In</a></p>";
                  }
				  else {
                     $erreur = "Your passwords do not match!";
                  }        
	  }
	  else {
         $erreur = "Your username can't be longer than 20 characters";
      } 
   } else {
      $erreur = "All fields must be completed !";
   
}}
?>

<?php include("../includes/hautSign.php");?>

<div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">YourOwnHunt</a>
    </div>
</div>

<div class="main">

     <p class="titre"> SignUp:   </p>
       

	   <form method="POST" action="">
           
            <div class="lable-2">        
                 
                     <input type="text" placeholder="Your Username" class="text" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />

                     <input type="password" placeholder="Choose your password" class="text" name="mdp" />
               
                     <input type="password" placeholder="Confirme your password" class="text" name="mdp2" />
            </div>
			<div class="submit">
                     <input type="submit" name="forminscription" value="Sign Up" />
            </div>
        

		</form>
		 <a href="connexion.php">Back</a>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
</div>

  <?php include("../includes/footer.php");?>