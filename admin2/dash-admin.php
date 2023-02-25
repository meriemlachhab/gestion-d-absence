<?php
include("./includes/header.php");
?>


<div class="main-content">
<div class="page-content">
<div class="container-fluid">
<br><br><br><br>

<div class="row " >
<?php
$file = simplexml_load_file('../data/absence.xml');

$data = $file->Etudiants->Etudiant;
$total=0;
foreach($data as $etud) { 
    $total+=1;
}
?>
    <div class="col-xl-3  col-md-4 " style="margin-left:180px;">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h5 class="text-uppercase verti-label font-size-16 text-white-50">Etudiants
                    </h5>
                    <div class="text-white">
                        <h5 class="text-uppercase font-size-16 text-white-50"> <i class="mdi mdi-account-heart" style="width:42px; height:42px;"></i>  Etudiants</h5>
                        <h3 class="mb-3 text-white"><?php echo $total ?></h3>
                        <div class="">
                             <span class="ms-2">
                                </span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Col -->
    <?php
$file = simplexml_load_file('../data/absence.xml');

$data = $file->Enseignants->Enseignant;
$total=0;
foreach($data as $etud) { 
    $total+=1;
}
?>
    <div class="col-xl-3  col-md-4" style="margin-left:200px;">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h5 class="text-uppercase verti-label font-size-16 text-white-50">Profs
                    </h5>
                    <div class="text-white">
                        <h5 class="text-uppercase font-size-16 text-white-50"> <i class="mdi mdi-account-cog" style="width:42px; height:42px;"></i> Enseignants </h5>
                        <h3 class="mb-3 text-white"><?php echo $total ?></h3>
                        <div class="">
                             <span class="ms-2">
                                </span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    <br><br>
    <div class="row">
    <!-- End Col -->
    <?php
$file = simplexml_load_file('../data/absence.xml');

$data = $file->Modules->Module;
$total=0;
foreach($data as $etud) { 
    $total+=1;
}
?>
    <div class="col-xl-3  col-md-6 " style="margin-left:180px;">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h5 class="text-uppercase verti-label font-size-16 text-white-50">Modules
                    </h5>
                    <div class="text-white">
                        <h5 class="text-uppercase font-size-16 text-white-50"> <i class="mdi mdi-alpha-m" style="width:52px; height:32px;"></i>  Modules</h5>
                        <h3 class="mb-3 text-white"><?php echo $total ?></h3>
                        <div class="">
                             <span class="ms-2">
                                </span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Col -->
    <?php
$file = simplexml_load_file('../data/absence.xml');

$data = $file->Matieres->Matiere;
$total=0;
foreach($data as $etud) { 
    $total+=1;
}
?>
    <div class="col-xl-3  col-md-6" style="margin-left:200px;">
        <div class="card bg-primary mini-stat position-relative">
            <div class="card-body">
                <div class="mini-stat-desc">
                    <h5 class="text-uppercase verti-label font-size-16 text-white-50">Matières
                    </h5>
                    <div class="text-white">
                        <h5 class="text-uppercase font-size-16 text-white-50"> <i class="mdi mdi-alpha-m-box" style="width:42px; height:42px;"></i>  Matières</h5>
                        <h3 class="mb-3 text-white"><?php echo $total ?></h3>
                        <div class="">
                             <span class="ms-2">
                                </span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Col -->
</div>
<?php
include("./includes/footer.php");
?>