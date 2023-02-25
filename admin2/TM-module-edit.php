<div class="modal fade" id="edit_<?php echo $etud->CodeModule; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center>
                    <h4 class="modal-title" id="myModalLabel">Modifier</h4>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="module_edit.php">
                <div class="modal-body">
                    <div class="container-fluid">


                        <div class="row ">


                            <div class="col">
                                <div class="mb-3"><label class="col-form-label" style="position:relative; top:7px;">Code module:
                                      </label>

                                    <input type="text" class="form-control" name="CodeModule"
                                        value="<?php echo $etud->CodeModule; ?>" readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="col-form-label" style="position:relative; top:7px;">Nom Module:</label>

                                    <input type="text" class="form-control" name="NomModule"
                                        value="<?php echo $etud->NomModule; ?>">
                                </div>
                            </div>

                        </div>


                        

                        <div class="row ">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="col-form-label" style="position:relative; top:7px;">Tele:</label>

                                    <select class="form-select form-select-lg" name="Coordonateur" id="">
                                                    
                                                        <?php
                                                        $file2 = simplexml_load_file('../data/absence.xml');
                                                        $data2 = $file2->Enseignants->Enseignant;
                                                        foreach($data2 as $A) { 
                                                            if("$A->NumSomme"=="$etud->Coordonateur"){?>
                                                           <option selected value="<?php echo $A->NumSomme; ?>">  <?php    echo $A->Prenom;?> <?php  echo $A->Nom ;?> </option>
                                                             <?php break;
                                                            }}
                                                        ?>
                                                    
                                                     
                                                    <?php 
                                                    $file = simplexml_load_file('../data/absence.xml');

                                                    $data = $file->Enseignants->Enseignant;
                                                    foreach($data as $etud) { 
                                                    if($etud->CodeDepartement=="D02"){
                                                    ?>

                                                    <option value="<?php echo $etud->NumSomme; ?>">
                                                        <?php echo $etud->Prenom; ?> <?php echo $etud->Nom; ?></option>
                                                    <?php }} ?>
                                    </select>
                                </div>
                            </div>
            

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Modifier</button>
               </div>
            </form>
        </div>
        
    </div>
</div>