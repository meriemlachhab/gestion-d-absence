<?php
include("./includes/header.php");
if(isset($_POST['submit'])){
    $file = simplexml_load_file('../data/absence.xml');
    
    $CodeModule= $_POST['CodeModule'];
    $NomModule= $_POST['NomModule'];
    
    $Coordonateur=$_POST['Coordonateur'];
    
    $Modules =$file->Modules;
    
    $Module = $Modules->addChild('Module');
            $Module->addChild('Coordonateur', $Coordonateur);
            $Module->addChild('CodeModule',$CodeModule);
            $Module->addChild('NomModule', $NomModule);
            $Module->addChild('CodeFiliere', "F09");
    
    
    file_put_contents('../data/absence.xml', $file->asXML());
    
    } 
   
?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <br><br><br><br><br><br>

            <div class="page-content-wrapper">

                <button type="button" class="btn btn-primary waves-effect waves-light " data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Ajouter un Module</button>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter Module</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Code Module:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="CodeModule">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-4">
                                                <label for="message-text" class="col-form-label">Nom Module:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="NomModule">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Role</label>
                                                <select class="form-select form-select-lg" name="Coordonateur" id="">
                                                    <option selected>Coordonateur </option>
                                                    <?php 
                                                    $file = simplexml_load_file('../data/absence.xml');

                                                    $data = $file->Enseignants->Enseignant;
                                                    foreach($data as $etud) { 
                                                    if($etud->CodeDepartement=="D01"){
                                                    ?>

                                                    <option value="<?php echo $etud->NumSomme; ?>">
                                                        <?php echo $etud->Prenom; ?> <?php echo $etud->Nom; ?></option>
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

                                <h4 class="card-title">Liste des Modules</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spaNomModuleg: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Code Module</th>
                                            <th>Nom Module</th>
                                            <th>Cordonnateur</th>


                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php 
                                                        $file = simplexml_load_file('../data/absence.xml');

                                                        $data = $file->Modules->Module;
                                                        foreach($data as $etud) { 
                                                        if($etud->CodeFiliere=="F09"){  
                                                    ?>
                                        <tr>
                                            <td><?php echo $etud->CodeModule; ?></td>
                                            <td><?php echo $etud->NomModule; ?></td>
                                            <td> <?php 
                                           $file1 = simplexml_load_file('../data/absence.xml');

                                           $data1 = $file1->Enseignants->Enseignant;
                                           foreach($data1 as $a){
                                           if("$a->NumSomme" == "$etud->Coordonateur"){
                                           ?>

                                                <?php echo $a->Prenom; ?> <?php echo $a->Nom; ?>
                                                <?php }}?></td>

                                            <td> <a href="#edit_<?php echo $etud->CodeModule; ?>" data-bs-toggle="modal"
                                                    role="button"><i class="fa fa-edit" style="color:black;"
                                                        aria-hidden="true"></i></a>

                                                <a href="#delete_<?php echo $etud->CodeModule; ?>"
                                                    data-bs-toggle="modal" role="button"> <i class="fa fa-trash"
                                                        aria-hidden="true" style="color:red;"></i></a>
                                            </td>
                                            <div class="modal fade" id="delete_<?php echo $etud->CodeModule; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <h4 class="modal-title" id="myModalLabel">Supprimer un
                                                                module</h4>

                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">Are you sure you want to Delete</p>
                                                            <h2 class="text-center">
                                                                <?php echo $etud->NomModule ?></h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-bs-dismiss="modal"><span
                                                                    class="glyphicon glyphicon-remove"></span>
                                                                Annuler</button>
                                                            <a href="TIMQ-MQSE-Module-delete.php?CodeModule=<?php echo $etud->CodeModule ?>"
                                                                class="btn btn-danger"><span
                                                                    class="glyphicon glyphicon-trash"></span>
                                                                Oui</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php include('TIMQ-module-edit.php'); ?>
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