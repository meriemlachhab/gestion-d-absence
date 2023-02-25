<?php
	// session_start();
	if(isset($_POST['edit'])){
		$Etablissement = simplexml_load_file('../data/absence.xml');
		foreach($Etablissement->Modules->Module as $Module){
			if($Module->CodeModule == $_POST['CodeModule']){
                $Module->CodeModule=$_POST['CodeModule'];
                $Module->NomModule = $_POST['NomModule'];
				$Module->Coordonateur = $_POST['Coordonateur'];
				
				break;
			}
		}
        file_put_contents('../data/absence.xml', $Etablissement->asXML());
        $last_page = $_SERVER['HTTP_REFERER'];

        // Redirect the user back to the last page
        header("Location: " . $last_page);
    	 
	}
	
?>