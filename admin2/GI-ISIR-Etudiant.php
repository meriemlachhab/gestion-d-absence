<?php
include("./includes/header.php");
if(isset($_POST['submit'])){
    $file = simplexml_load_file('../data/absence.xml');
    
    $NumInscription= $_POST['NumInscription'];
    $CIN= $_POST['CIN'];
    $Nom= $_POST['Nom'];
    $Prenom= $_POST['Prenom'];
    $Email= $_POST['Email'];
    $Password= $_POST['Password'];
    $Tele= $_POST['Tele'];
    $Sexe=$_POST['Sexe'];
    $DateNaissance=$_POST['DateNaissance'];
    $photo=$_POST['photo'];
    $rue=$_POST['rue'];
    $numero=$_POST['numero'];
    $ville=$_POST['ville'];
    $Etudiants =$file->Etudiants;
    
    $Etudiant = $Etudiants->addChild('Etudiant');
            $Etudiant->addAttribute('Sexe', $Sexe);
            $Etudiant->addChild('NumInscription',$NumInscription);
            $Etudiant->addChild('CIN', $CIN);
            $Etudiant->addChild('Nom', $Nom);
            $Etudiant->addChild('Prenom', $Prenom);
            $Etudiant->addChild('Tele', $Tele);
            $Etudiant->addChild('Email', $Email);
            $Etudiant->addChild('Password', $Password);
            $Etudiant->addChild('DateNaissance', $DateNaissance);
            $image_path = "assets/images/" . basename($_FILES["photo"]["name"]);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $image_path);
            $Etudiant->addChild('photo', $image_path);
            
            $Etudiant->addChild('idniveau', "N03");
            $Etudiant->addChild('CodeFiliere', "F03");
    
    file_put_contents('../data/absence.xml', $file->asXML());
    echo "<script>window.location.href = 'GI-ISIR-Etudiant.php';</script>";
    
    
} 
   
?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <br><br><br><br><br><br>

            <div class="page-content-wrapper">

                <button type="button" class="btn btn-primary waves-effect waves-light " data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Ajouter un étudiant</button>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter Etudiant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Num
                                                    D'inscription:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="NumInscription">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-4">
                                                <label for="message-text" class="col-form-label">CIN:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="CIN">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">NOM:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="Nom">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">PRENOM:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="Prenom">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Sexe</label>
                                                <select class="form-select form-select-lg" name="Sexe" id="">
                                                    <option selected>Sexe </option>
                                                    <option value="Feminin">Féminin</option>
                                                    <option value="Masculin">Masculin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">TELE:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="Tele">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">EMAIL:</label>
                                                <input type="email" class="form-control" id="recipient-name"
                                                    name="Email">
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">PASSWORD:</label>
                                                <input type="password" class="form-control" id="recipient-name"
                                                    name="Password">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Date de
                                                    naissance:</label>
                                                <input type="date" class="form-control" id="recipient-name"
                                                    name="DateNaissance">
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Photo:</label>
                                                <input type="file" class="form-control" id="recipient-name"
                                                    name="photo">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">rue:</label>
                                                <input type="text" class="form-control" id="recipient-name" name="rue">
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">numero:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="numero">
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">ville:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="ville">
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

                                <h4 class="card-title">Liste des étudiants</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Numero d'inscription</th>
                                            <th>CIN</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php 
                                                        $file = simplexml_load_file('../data/absence.xml');

                                                        $data = $file->Etudiants->Etudiant;
                                                        foreach($data as $etud) { 
                                                            if($etud->CodeFiliere=="F03"){
                                                    ?>
                                        <tr>
                                            <td><img class="rounded-circle me-2" width="35px" height="35px"
                                                    src="<?php echo $etud->photo; ?>" alt=""></td>
                                            <td><?php echo $etud->NumInscription; ?></td>
                                            <td><?php echo $etud->CIN; ?></td>
                                            <td>

                                                <?php echo $etud->Prenom; ?>
                                            </td>
                                            <td><?php echo $etud->Nom; ?></td>
                                            <td><?php echo $etud->Tele; ?></td>
                                            <td><?php echo $etud->Email; ?></td>
                                            <td> <a href="#edit_<?php echo $etud->NumInscription; ?>"
                                                    data-bs-toggle="modal" role="button"><i class="fa fa-edit"
                                                        style="color:black;" aria-hidden="true"></i></a>

                                                <a href="#delete_<?php echo $etud->NumInscription; ?>"
                                                    data-bs-toggle="modal" role="button">
                                                    <i class="fa fa-trash" aria-hidden="true"
                                                        style="color:red;"></i></a>
                                            </td>
                                            
                                            <div class="modal fade" id="delete_<?php echo $etud->NumInscription; ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">

                                                            <h4 class="modal-title" id="myModalLabel">Supprimer un
                                                                etudiant</h4>

                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-center">Are you sure you want to Delete</p>
                                                            <h2 class="text-center">
                                                                <?php echo $etud->Nom.' '.$etud->Prenom; ?></h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                data-bs-dismiss="modal"><span
                                                                    class="glyphicon glyphicon-remove"></span>
                                                                Annuler</button>
                                                            <a href="GI-ISIR-Etud-delete.php?NumInscription=<?php echo $etud->NumInscription; ?>"
                                                                class="btn btn-danger"><span
                                                                    class="glyphicon glyphicon-trash"></span>
                                                                Oui</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php include('etudiant_edit_model.php'); ?>
                                        </tr>
                                        <?php  }} ?>
                                        
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