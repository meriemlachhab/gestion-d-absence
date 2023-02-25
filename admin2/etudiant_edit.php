<?php
	// session_start();
	if(isset($_POST['edit'])){
		$Etablissement = simplexml_load_file('../data/absence.xml');
        $num=$_POST['NumInscription'];
		foreach($Etablissement->Etudiants->Etudiant as $Etudiant){
			if($Etudiant->NumInscription ==$num){
                $Etudiant->NumInscription=$num;
                $Etudiant->CIN = $_POST['CIN'];
				$Etudiant->Nom = $_POST['Nom'];
				$Etudiant->Prenom = $_POST['Prenom'];
				$Etudiant->Tele = $_POST['Tele'];
                $Etudiant->Email = $_POST['Email'];
				break;
			}
		}
        file_put_contents('../data/absence.xml', $Etablissement->asXML());
	    $_SESSION['message'] = 'Member updated successfully';
        $last_page = $_SERVER['HTTP_REFERER'];

        // Redirect the user back to the last page
        header("Location: " . $last_page);
    	 }
	
        

?>
