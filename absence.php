<?php
session_start();
include("./includes/header.php");
$file = simplexml_load_file('data/absence.xml');
$matieres=$file->Matieres->Matiere;
$absences=$file->Absences->absence;
$seances=$file->Seances->seance;

?>
<div class="container-fluid">
<div class="row">
    <form action="" method="POST">
    <div class="row my-3 mt-5 d-flex flex-row align-items-center justify-content-center">
    <div class="col-md-2">
     <div class="mb-3">
        <label for="dateSeance" class="form-label">Date Seance</label>
         <input type="date" class="form-control" name="dateSeance" id="dateSeance">
     </div>
    </div>
    <div class="col-md-2">
    <div class="mb-3">
        <label for="HeureDebut" class="form-label">Heure debut  </label>
         <input type="time" class="form-control" name="HeureDebut" id="HeureDebut">
     </div>
    </div>
    <div class="col-md-2">
    <div class="mb-3">
        <label for="HeureFin" class="form-label">Heure Fin</label>
         <input type="time" class="form-control" name="HeureFin" id="HeureFin">
     </div>
    </div>
    <div class="col-md-2 mt-3">
        <button class="btn btn-primary d-block w-100" name="submit" type="submit"> Chercher</button>
     </div>
    </form>
</div>
<?php 
                
                if(isset($_POST['submit'])){
                    $dateSeance= $_POST['dateSeance'];
                    $heureDebut= $_POST['HeureDebut'];
                    $heureFin= $_POST['HeureFin'];
                    ?>
<div class="row">
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Matiere</th>
                    <th scope="col">Date Seance</th>
                    <th scope="col">Heure Debut</th>
                    <th scope="col">Heure Fin</th>
                    <th scope="col">Type de Seance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    

                   foreach($seances as $seance){
                    if($dateSeance== $seance->dateSeance && $heureDebut== $seance->HeureDebut && $heureFin==$seance->HeureFin){
                        $idmat= $seance->idMatiere;
                        $matieres = $file->xpath("Matieres/Matiere[CodeMatiere='$idmat']");
                          foreach($matieres as $matiere){
                              
                ?>
                <tr class="">   
                <td>
              <?php echo $matiere->libelle; } ?>
                 </td>
                    <td scope="row"><?php echo $seance->dateSeance?></td>
                    <td><?php echo $seance->HeureDebut?></td>
                    <td><?php echo $seance->HeureFin?></td>
                    <td><?php echo $seance->Typeseance?></td>
                </tr>
               
            </tbody>
        </table>
    </div>
    
</div>
<div class="row">
    <h2>Liste des etudiants</h2>
    <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">N° d'inscription</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                 $idSeance=$seance->Idseance;
                $etudiants = $file->xpath("Etudiants/Etudiant[idSeance='$idSeance']");
                          foreach($etudiants as $etudiant){?>
                    <tr class="">
                        <td><?php echo $etudiant->NumInscription; ?></td>
                        <td scope="row" class="d-flex flex-row align-items-center">
                        <img class="rounded-circle me-2" width="45px" height="45px" src="<?php echo $etudiant->photo; ?>" alt="">
                        <?php echo $etudiant->Prenom; ?>
                        </td> 
                        <td><?php echo $etudiant->Nom; ?></td>
                      
                        <td>
                        <?php  $idEtud=$etudiant->NumInscription;
               if($file->xpath("Absences/absence[IdEtudiant='$idEtud']")){
              
                ?>
                            <span class="badge  rounded-pill bg-warning"> Absent</span>
                      
                            
                        </td>
                        <?php } else{
                           echo ' --';}
                         ?>
                        <td>
                            <form  action="addAbsence.php" method="POST" onsubmit="return sendData();">
                                <input type="hidden" name="idSeance" value="<?php echo  $idSeance; ?>" id="idSeance">
                                <input type="hidden" name="numInscr" value="<?php echo $etudiant->NumInscription; ?>" id="numInscr">
                            <button name="addAbsence" id="" class="btn btn-primary" href="" role="button" type="submit"><i class="fa fa-check" aria-hidden="true"></i></button></form>
                        </td>
                    </tr>
                    
                    <?php } ?>
                    <?php }} } ?>
                </tbody>
            </table>
        </div>
</div>
<div id="res" class="row"></div>
    </div>
<?php   include('includes/footer.php'); ?>
