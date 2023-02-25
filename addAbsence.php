<?php
if(isset($_POST['numInscr'])){
$file = simplexml_load_file('data/absence.xml');
$numInscr= $_POST['numInscr'];
$idSeance= $_POST['idSeance'];
$absences =$file->Absences;
$absence = $absences->addChild('absence');
		$absence->addChild('IdEtudiant',$numInscr);
		$absence->addChild('idseance', $idSeance);
    file_put_contents('data/absence.xml', $file->asXML());
	header('location:MarquerAbsence.php');

} 



?>