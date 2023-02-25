<?php
include("./includes/header.php");
if(isset($_POST['submit'])){
    $file = simplexml_load_file('../data/absence.xml');
    
    $Numsomme= $_POST['NumSomme'];
    $CIN= $_POST['CIN'];
    $Nom= $_POST['Nom'];
    $Prenom= $_POST['Prenom'];
    $Email= $_POST['Email'];
    $Password= $_POST['Password'];
    $Tele= $_POST['Tele'];
    $ischef=$_POST['ischef'];
    
    $Enseignants =$file->Enseignants;
    
    $Enseignant = $Enseignants->addChild('Enseignant');
            $Enseignant->addAttribute('ischef', $ischef);
            $Enseignant->addChild('NumSomme',$Numsomme);
            $Enseignant->addChild('CIN', $CIN);
            $Enseignant->addChild('Nom', $Nom);
            $Enseignant->addChild('Prenom', $Prenom);
            $Enseignant->addChild('Tele', $Tele);
            $Enseignant->addChild('Email', $Email);
            $Enseignant->addChild('Password', $Password);
            $Enseignant->addChild('CodeDepartement', "D01");
            $Enseignant->addChild('Etat', "1");

    
    file_put_contents('../data/absence.xml', $file->asXML());
        header('location:GI-professeur.php');
    
    } 
   
?>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <br><br><br><br><br><br>

            <div class="page-content-wrapper">

                <button type="button" class="btn btn-primary waves-effect waves-light " data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Ajouter un enseignant</button>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter Enseignant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Num De somme:</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    name="NumSomme">
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
                                                <label for="" class="form-label">Role</label>
                                                <select class="form-select form-select-lg" name="ischef" id="">
                                                    <option selected>Ischef </option>
                                                    <option value="oui">Oui</option>
                                                    <option value="nom">Non</option>
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

                                <h4 class="card-title">Liste des enseignants</h4>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Numero</th>
                                            <th>CIN</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th>Activer-Désactiver</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php 
                                                        $file = simplexml_load_file('../data/absence.xml');

                                                        $data = $file->Enseignants->Enseignant;
                                                        foreach($data as $etud) { 
                                                            if($etud->CodeDepartement=="D01"){

                                                    ?>
                                        <tr>
                                            <td><?php echo $etud->NumSomme; ?></td>
                                            <td><?php echo $etud->CIN; ?></td>
                                            <td><?php echo $etud->Nom; ?></td>
                                            <td><?php echo $etud->Prenom; ?></td>
                                            <td><?php echo $etud->Tele; ?></td>
                                            <td><?php echo $etud->Email; ?></td>
                                            <td><a href="activatetimq.php?NumSomme=<?php echo $etud->NumSomme; ?>" 
                                                    role="button"><i class="fa fa-edit" style="color:black;"
                                                        aria-hidden="true"></i></a></td>
                                            <td> <a href="#edit_<?php echo $etud->NumSomme; ?>" data-bs-toggle="modal"
                                                    role="button"><i class="fa fa-edit" style="color:black;"
                                                        aria-hidden="true"></i></a>

                                                <a href="#delete1_<?php echo $etud->NumSomme; ?>" data-bs-toggle="modal"
                                                    role="button"> <i class="fa fa-trash" aria-hidden="true"
                                                        style="color:red;"></i></a>
                                            </td>
                                            <?php include('prof_edit_model.php'); ?>

                                            <?php include('TIMQ-prof_edit_delete_model.php'); ?>
                                        </tr>
                                        <?php }} ?>
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