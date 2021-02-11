
<?php

include ('fonctionAffichage.php'); //on appelle la fonction affichage pour afficher les donnees demandees par la requete
//$Nouveautes ="SELECT Titre as 'Treasure Name:', DateCachee as 'Hiding Date', user_id.Pseudo as 'Hidden By' FROM ( treasure INNER JOIN user_id on treasure.ID_User_ID=user_ID.ID ) WHERE Statut=0 ORDER BY 'Hidden Date' DESC LIMIT 10
//";

$Nouveautes = "SELECT t.`Titre` as 'Treasure Name:', t.`DateCachee` as 'Hiding Date', u.`Pseudo` as 'Hidden By' FROM ( `treasure` t INNER JOIN `user_id` u on t.`ID_User_ID`= u.ID ) WHERE t.`Statut`=0 ORDER BY 'Hidden Date' DESC LIMIT 10;";
?>

<div class="container">
<div class="floatcenter">

<?php affichage(connexion_requete($Nouveautes));?>


</div>


</div>



