<?php
session_start();
include("./includes/header.php");
$file = simplexml_load_file('data/absence.xml');
$enseignants=$file->Enseignants->Enseignant;
$seances=$file->Seances->seance;
$idProf =$_GET['idEn'];
?>

<div class="col-md-12 d-flex">
    <?php include("./includes/sidebar.php");?>
    <div class="col-md-10">
        <div class=" box">
            <?php include("./includes/nav.php");?>
            <div class="row mb-4">
                <div class="col-md-11 mx-auto">
            
                    <h3 class="text-muted mt-4">  
                        Liste des Matieres et seances </h3>
                    <div class="mt-3 table-responsive">
                        <table class="table table-borderless" style="background-color: white;">
                            <thead class="table-primary">
                                <tr style="color:#70767b">
                                    <th scope="col">Matiere</th>
                                    <th scope="col">date Seance</th>
                                    <th scope="col">Heure Debut</th>
                                    <th scope="col">Heure Fin</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                    <?php 
                   foreach($seances as $seance){
                    $idMat = $seance->idMatiere;
                    $matieres = $file->xpath("Matieres/Matiere[CodeMatiere='$idMat']"); 
                    foreach($matieres as $matiere){ 
                        if($idProf ==$matiere->EnseignantMatiere){
                  ?>
                                    
                                <tr class="">
                                
                                    <td>
                                    <?php    echo $matiere->libelle; ?>
                                    </td>
                                    
                                    <td><?php echo $seance->dateSeance?></td>
                                    <td><?php echo $seance->HeureDebut?></td>
                                    <td><?php echo $seance->HeureFin?></td>
                                </tr>
                                <?php } }}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include("./includes/footer.php");?>