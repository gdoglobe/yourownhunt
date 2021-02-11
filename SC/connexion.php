<?php


include ('../Functions/BDDConnectFNC.php'); //on se connect à la base

if(isset($_POST['formconnexion'])) {  //Si on clique sur le boutton 
   $pseudoconnect =  trim(htmlentities($_POST['pseudoconnect'])); 
   $mdpconnect = SHA1(($_POST['mdpconnect']));  //on utilise la fonction SHA1 pour la securite 
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {//si les champs ne sont pas vide, alors:
      $requser = $bdd->prepare("SELECT * FROM user_id WHERE Pseudo = ? AND Password = ?");				
      $requser->execute(array($pseudoconnect, $mdpconnect));
      $userexist = $requser->rowCount(); //on compte le nombre de reponses envoyee par la base pour voir si le user existe
      if($userexist == 1) {
		  session_start();
         $userinfo = $requser->fetch();
         $_SESSION['ID'] = $userinfo['ID'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];

         header("Location: ../AC/DashBoard.php");
      } else {
         $erreur = "Bad Username or password!";
      }
   } else {
      $erreur = "Please complete all informations to log in.";
   }
}
?>

<?php include("../includes/hautSign.php");?>

   <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">YourOwnHunt</a>
        </div>
	</div>

     
	  <div class="main">
      
      
		<h2 class="titre"> Sign in:   </h2>
		 
         <form method="POST" action="">
		<div class="lable-2">
		
            <input type="pseudo" name="pseudoconnect" class="text"  placeholder="Username" /></br></Br>
		 
			 
		
            <input type="password" name="mdpconnect" class="text" placeholder="Password" />
			 
		</div>
           <div class="submit">
            <input type="submit" class="submit" name="formconnexion" value="Sign in" />
			</div>
			
		
         </form>
		 <a href="inscription.php">Want to Sign up? Click here!</A>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      
	</div>
	 
	 
	 
   <?php include('../includes/footer.php'); ?>
