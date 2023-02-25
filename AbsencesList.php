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
        <div class="row mt-4 d-flex flex-row align-items-center justify-content-end me-4">
        <div class="col-md-3 mt-3">
         <div class="mb-3 d-flex align-items-center flex-row">
            <label for="dateSeance" class="mb-2 form-label me-2">CIN</label>
             <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" name="CIN" id="dateSeance" placeholder="search for CIN">
         </div>
        </div>
        

    
            </div>
            <div class="row mb-4">
                <div class="col-md-11 mx-auto">
                    <h3 class="text-muted ">Liste des Absences</h3>
                    <div class="mt-3 table-responsive">
                        <table id="myTable" class="table table-borderless" style="background-color: white;">
                            <thead class="table-primary">
                                <tr style="color:#70767b">
                                    <th scope="col">Matiere</th>
                                    <th scope="col">date Seance</th>
                                    <th scope="col">Heure Debut</th>
                                    <th scope="col">Heure Fin</th>
                                    <th scope="col">CIN</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Nom</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <?php 
                foreach($absences as $absence){
                 $idetudiant=$absence->IdEtudiant;
                 $idseance=$absence->idseance;
                $etudiants = $file->xpath("Etudiants/Etudiant[NumInscription='$idetudiant']");
                $seances = $file->xpath("Seances/seance[Idseance='$idseance']");
                foreach($seances as $seance){
                    $idMat = $seance->idMatiere;
                    $matieres = $file->xpath("Matieres/Matiere[CodeMatiere='$idMat']");
                    foreach($matieres as $matiere){
                ?>
                                    <td>
                                        <?php 
                echo $matiere->libelle;
                    ?>
                                    </td>
                                    <?php } ?>
                                    <td><?php echo $seance->dateSeance?></td>
                                    <td><?php echo $seance->HeureDebut?></td>
                                    <td><?php echo $seance->HeureFin?></td>
                                    <?php } ?>
                                    <?php foreach($etudiants as $etudiant){?>

                                    <td><?php echo $etudiant->CIN; ?></td>
                                    <td scope="row" class="d-flex flex-row align-items-center">
                                        <img class="rounded-circle me-2" width="45px" height="45px"
                                            src="Admin2/<?php echo $etudiant->photo; ?>" alt="">
                                        <?php echo $etudiant->Prenom; ?>
                                    </td>
                                    <td><?php echo $etudiant->Nom; ?></td>
                                    <?php } ?>
                                </tr>


                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
   
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
<?php include("./includes/footer.php");?>