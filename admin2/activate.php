<?php


$Etablissement = simplexml_load_file('../data/absence.xml');
foreach($Etablissement->Enseignants->Enseignant as $Enseignant){
    if($Enseignant->NumSomme == $_GET['NumSomme']){
       if($Enseignant->Etat == "1"){
        $Enseignant->Etat = "0";
        break;
       }else{
        $Enseignant->Etat = "1";
        break;
       }
        
    }
}
file_put_contents('../data/absence.xml', $Etablissement->asXML());
// $_SESSION['message'] = 'Member updated successfully';
  header('location: GI-professeur.php');



// Save the updated XML data back to the file


?>
