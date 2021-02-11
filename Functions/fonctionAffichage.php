


<?php

// méthode connexion et requête 
function connexion_requete($req)
{
			// ouverture de connexion
	$db = new mysqli("localhost", "root", "", "yourownhunt");

	if($db->connect_errno){
		die("erreur $db->connect_error");
	}
	else
	{
	$data = $db->query($req);
	return $data;
	}
}


function affichage($data)
{
	// position au début
	//$data->data_seek(0);
	mysqli_data_seek($data,0);
	// booléen pour gérer la première ligne
	$first = true;
	
	echo '<table  >';

	//while ($row = $data->fetch_assoc())
	while ($row=mysqli_fetch_row($data))
	{
		
		// pour la première ligne
		if ($first)
		{
			$first = false;
			echo '<tr>';
			foreach ($row as $key => $value)
				echo "<th> <strong>{$key} </strong></th>";
			echo '</tr>';
		}

		echo '<tr>';
		foreach ($row as $key => $value)
			echo "<td> {$value} </td>";
		echo '</tr>';
		
		
	}
	echo'</table>';
}

?>