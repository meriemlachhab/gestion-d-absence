<?php
	// session_start();
	if(isset($_POST['edit'])){
		$Etablissement = simplexml_load_file('../data/absence.xml');
		foreach($Etablissement->Enseignants->Enseignant as $Enseignant){
			if($Enseignant->NumSomme == $_POST['NumSomme']){
                $Enseignant->NumSomme=$_POST['NumSomme'];
                $Enseignant->CIN = $_POST['CIN'];
				$Enseignant->Nom = $_POST['Nom'];
				$Enseignant->Prenom = $_POST['Prenom'];
				$Enseignant->Tele = $_POST['Tele'];
                $Enseignant->Email = $_POST['Email'];
				break;
			}
		}
        file_put_contents('../data/absence.xml', $Etablissement->asXML());
        $last_page = $_SERVER['HTTP_REFERER'];

        // Redirect the user back to the last page
        header("Location: " . $last_page);
    	 
	}
	
?>