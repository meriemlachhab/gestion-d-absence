<?php
	session_start();
	$NumInscription = $_GET['NumInscription'];

    $Etablissement = simplexml_load_file('../data/absence.xml');
	//we're are going to create iterator to assign to each user
	$index = 0;
	$i = 0;

	foreach($Etablissement->Etudiants->Etudiant as $Etudiant){
		if($Etudiant->NumInscription == $NumInscription){
			$index = $i;
			break;
		}
		$i++;
	}
    // $Etablissement->$Etudiants->Etudiant->

	unset($Etablissement->Etudiants->Etudiant[$index]);
	file_put_contents('../data/absence.xml', $Etablissement->asXML());

	$_SESSION['message'] = 'Member deleted successfully';
	$last_page = $_SERVER['HTTP_REFERER'];

	// Redirect the user back to the last page
	header("Location: " . $last_page);
	
?>