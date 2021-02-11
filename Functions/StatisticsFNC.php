
<?php

include ('fonctionAffichage.php');  // on affiche les donnees des deux requetes:
$Hiders ="SELECT user_id.Pseudo as 'Member:',COUNT(ID_User_ID) as 'Number of new hidden treasures THIS month'  FROM (`treasure` INNER join user_id on user_id.ID = treasure.ID_User_ID) WHERE month(DateCachee) = month(now()) GROUP BY ID_User_ID ORDER BY `Number of new hidden treasures this month` DESC";
$Seekers="SELECT user_id.Pseudo as 'Member:',COUNT(ID_User_ID) as 'Number of treasures found for the first time THIS month' FROM (`trouver` INNER join user_id on user_id.ID =  trouver.ID_User_ID) WHERE month(DateTrouvee) = month(now()) GROUP BY ID_User_ID ORDER BY `Number of treasures found for the first time THIS month` DESC";
?>

	


<div class="container">
<div class="floatLeft">

<td><p> Seekers of the month:  </p><?php affichage(connexion_requete($Seekers));?>

</td>
</div>

<div class="floatRight">

<td ><p> Hiders of the month:  </p><?php affichage(connexion_requete($Hiders)); ?>

</td></table>
</div>
</div>







