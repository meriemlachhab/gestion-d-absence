<?php
	// session_start();
	if(isset($_POST['edit'])){
		$Etablissement = simplexml_load_file('../data/absence.xml');
        $num=$_POST['CodeMatiere'];
		foreach($Etablissement->Matieres->Matiere as $Matiere){
			if($Matiere->CodeMatiere ==$num){
                $Matiere->CodeMatiere=$num;
                $Matiere->libelle = $_POST['libelle'];
				$Matiere->moduleMat = $_POST['moduleMat'];
				$Matiere->EnseignantMatiere = $_POST['EnseignantMatiere'];
				
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
