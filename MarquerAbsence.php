<?php 
session_start();
include("./includes/header.php");
$file = simplexml_load_file('data/absence.xml');
$matieres=$file->Matieres->Matiere;
$absences=$file->Absences->absence;
$seances=$file->Seances->seance;
?>

<div class="col-md-12 d-flex">
    <?php include("./includes/sidebar.php");?>
    <div class="col-md-10">
        <div class=" box">
            <?php include("./includes/nav.php");?>
            <div class="row">
                <form action="" method="POST">
                    <div class="row my-3 mt-5 d-flex flex-row align-items-center justify-content-center">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="dateSeance" class="mb-2 form-label">Date Seance</label>
                                <input type="date" class="form-control" name="dateSeance" id="dateSeance">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="HeureDebut" class="mb-2 form-label">Heure debut </label>
                                <input type="time" class="form-control" name="HeureDebut" id="HeureDebut">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="HeureFin " class="mb-2 form-label">Heure Fin</label>
                                <input type="time" class="form-control" name="HeureFin" id="HeureFin">
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <button class="btn btn-primary mt-2 d-block w-100" name="submit" type="submit">
                                Chercher</button>
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
                <div class="col-md-8 mx-auto">
                    <div class="table-responsive">
                        <table class="table table-borderless" style="background-color: white;">
                            <thead class="table-primary">
                                <tr style="color:#70767b">
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

            </div>
            <div class="row ">
                <div class="col-md-8 mx-auto">
                    <h3 class="text-muted mt-4">Liste des étudiants</h3>
                    <div class="mt-2 table-responsive">
                        <table class="table table-borderless" style="background-color: white;">
                            <thead class="table-primary">
                                <tr style="color:#70767b">
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
                                        <img class="rounded-circle me-2" width="45px" height="45px"
                                            src="admin2/<?php echo $etudiant->photo; ?>" alt="">
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
                                        <form method="POST" onsubmit="return sendData();">
                                            <input type="hidden" name="idSeance" value="<?php echo  $idSeance; ?>"
                                                id="idSeance">
                                            <input type="hidden" name="numInscr"
                                                value="<?php echo $etudiant->NumInscription; ?>" id="numInscr">
                                            <button name="addAbsence" id="" class="btn btn-primary" href=""
                                                role="button" type="submit"><i class="fa fa-check"
                                                    aria-hidden="true"></i></button></form>
                                    </td>
                                </tr>

                                <?php } ?>
                                <?php }} } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script  type="text/javascript">
    function sendData()
{
    var numInscr = document.getElementById("numInscr").value;
     var idSeance = document.getElementById("idSeance").value;
  $.ajax({
    type: 'post',
    url: 'addAbsence.php',
    data: {
        numInscr:numInscr,
        idSeance:idSeance
    },
    success: function (response) {
      $('#res').html("Vos données seront sauvegardées");
    }
  });
    
  return false;
}
</script>

<?php include("./includes/footer.php");?>