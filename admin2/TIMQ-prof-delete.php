<?php
	session_start();
	$NumSomme = $_GET['NumSomme'];

    $Etablissement = simplexml_load_file('../data/absence.xml');
	//we're are going to create iterator to assign to each user
	$index = 0;
	$i = 0;

	foreach($Etablissement->Enseignants->Enseignant as $Enseignant){
		if($Enseignant->NumSomme == $NumSomme){
			$index = $i;
			break;
		}
		$i++;
	}
    // $Etablissement->$Enseignants->Enseignant->

	unset($Etablissement->Enseignants->Enseignant[$index]);
	file_put_contents('../data/absence.xml', $Etablissement->asXML());

	$_SESSION['message'] = 'Member deleted successfully';
	header('location: TIMQ-professeur.php');

?>