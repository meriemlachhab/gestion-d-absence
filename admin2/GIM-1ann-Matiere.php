<?php
include("./includes/header.php");
if(isset($_POST['submit'])){
    $file = simplexml_load_file('../data/absence.xml');
    
    $CodeMatiere= $_POST['CodeMatiere'];
    $libelle= $_POST['libelle'];
    $ModuleMat= $_POST['ModuleMat'];

    $EnseignantMatiere=$_POST['EnseignantMatiere'];
    
    $Matieres =$file->Matieres;
    
    $Matiere = $Matieres->addChild('Matiere');
            $Matiere->addChild('CodeMatiere',$CodeMatiere);
            $Matiere->addChild('libelle', $libelle);
            $Matiere->addChild('moduleMat', $ModuleMat);
            $Matiere->addChild('EnseignantMatiere', $EnseignantMatiere);
            $Matiere->addChild('CodeFiliere', "F10");
    
    
    file_put_contents('../data/absence.xml', $file->asXML());
        header('location:GI-ISIR-Matiere.php');
    
    } 
   
?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <br><br><br><br><br><br>

            <div class="page-content-wrapper">

                <button type="button" class="btn btn-primary waves-effect waves-light " data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Ajouter une Matière</button>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter Matière</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Code Matière:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="CodeMatiere">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-4">
                                                <label for="message-text" class="col-form-label">Nom Matière:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="libelle">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Enseignant du Matiere</label>
                                                <select class="form-select form-select-lg" name="EnseignantMatiere" id="">
                                                    <option selected>Choisissez</option>
                                                    <?php 
                                                    $file = simplexml_load_file('../data/absence.xml');

                                                    $data = $file->Enseignants->Enseignant;
                                                    foreach($data as $etud) { 
                                                    if($etud->CodeDepartement=="D04"){
                                                    ?>

                                                    <option value="<?php echo $etud->NumSomme; ?>">
                                                        <?php echo $etud->Prenom; ?> <?php echo $etud->Nom; ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Module de la Matiere</label>
                                                <select class="form-select form-select-lg" name="ModuleMat" id="">
                                                    <option selected>Choisissez</option>
                                                    <?php 
                                                    $file = simplexml_load_file('../data/absence.xml');

                                                    $data = $file->Modules->Module;
                                                    foreach($data as $etud) { 
                                                    if($etud->CodeFiliere == "F10"){
                                                    ?>

                                                    <option value="<?php echo $etud->CodeModule; ?>">
                                                        <?php echo $etud->NomModule; ?> </option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                        </div>
                        </form>

                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Liste des Matieres</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spalibelleg: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Code Matiere</th>
                                            <th>Nom Matiere</th>
                                            <th>Enseignant de la Matiere</th>
                                            <th>Module de la Matiere</th>


                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php 
                                                        $file = simplexml_load_file('../data/absence.xml');

                                                        $data = $file->Matieres->Matiere;
                                                        foreach($data as $etud) { 
                                                            if($etud->CodeFiliere=="F10"){  
                                                    ?>
                                        <tr>
                                            <td><?php echo $etud->CodeMatiere; ?></td>
                                            <td><?php echo $etud->libelle; ?></td>
                                            <td> 
                                               <?php 
                                                    $file1 = simplexml_load_file('../data/absence.xml');

                                                    $data1 = $file1->Enseignants->Enseignant;
                                                    foreach($data1 as $a){
                                                    if("$a->NumSomme" == "$etud->EnseignantMatiere"){
                                                ?>

                                                <?php echo $a->Prenom; ?> <?php echo $a->Nom; ?>
                                                <?php }}?>
                                           </td>

                                            <td>
                                               <?php 
                                                    $file2 = simplexml_load_file('../data/absence.xml');

                                                    $data2 = $file2->Modules->Module;
                                                    foreach($data2 as $a){
                                                    if("$a->CodeModule" == "$etud->moduleMat"){
                                                    ?>

                                                    <?php echo $a->NomModule;?>
                                                  
                                                    <?php }}?>
                                            </td>


                                            <td> <a href="#edit_<?php echo $etud->CodeMatiere; ?>" data-bs-toggle="modal"
                                                    role="button"><i class="fa fa-edit" style="color:black;"
                                                        aria-hidden="true"></i></a>

                                                <a href="#delete_<?php echo $etud->CodeMatiere; ?>"
                                                    data-bs-toggle="modal" role="button"> <i class="fa fa-trash"
                                                        aria-hidden="true" style="color:red;"></i></a>
                                            </td>
                                            <div class="modal fade" id="delete_<?php echo $etud->CodeMatiere; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <h4 class="modal-title" id="myModalLabel">Supprimer une
                                                                Matiere</h4>

                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">Are you sure you want to Delete</p>
                                                            <h2 class="text-center">
                                                                <?php echo $etud->libelle ?></h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-bs-dismiss="modal"><span
                                                                    class="glyphicon glyphicon-remove"></span>
                                                                Annuler</button>
                                                            <a href="GI-ISIR-Matiere-delete.php?CodeMatiere=<?php echo $etud->CodeMatiere ?>"
                                                                class="btn btn-danger"><span
                                                                    class="glyphicon glyphicon-trash"></span>
                                                                Oui</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php include('GIM-1ann-matiere-edit.php'); ?>
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>


            </div>
            <!-- End Page-content -->

        </div>
        <!-- Container-Fluid -->
    </div>

    <?php
include("./includes/footer.php");
?>