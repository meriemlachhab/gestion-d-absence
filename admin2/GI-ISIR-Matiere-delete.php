<?php
	session_start();
	$CodeMatiere = $_GET['CodeMatiere'];

    $Etablissement = simplexml_load_file('../data/absence.xml');
	//we're are going to create iterator to assign to each user
	$index = 0;
	$i = 0;

	foreach($Etablissement->Matieres->Matiere as $Matiere){
		if($Matiere->CodeMatiere == $CodeMatiere){
			$index = $i;
			break;
		}
		$i++;
	}
    // $Etablissement->$Enseignants->Enseignant->

	unset($Etablissement->Matieres->Matiere[$index]);
	file_put_contents('../data/absence.xml', $Etablissement->asXML());

	$_SESSION['message'] = 'Member deleted successfully';
	$last_page = $_SERVER['HTTP_REFERER'];

	// Redirect the user back to the last page
	$last_page = $_SERVER['HTTP_REFERER'];

	// Redirect the user back to the last page
	header("Location: " . $last_page);
		
?>