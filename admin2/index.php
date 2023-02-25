<?php

$file = simplexml_load_file('../data/absence.xml');
$data = $file->Admins->Admin;
foreach($data as $Admin){
   echo $Admin->Email;
}
if(isset($_POST['submit'])){
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    foreach($data as $Admin){
        if($Admin->Email==$email && $Admin->Password==$password ){
            echo $email;
            header('Location:dash-admin.php');
        }
    }
}
?>

<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>ESts</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="colored">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

        <!-- Background -->
        <div class="account-pages"></div>
        <!-- Begin page -->
        <div class="wrapper-page">
       

            <div class="card">
                <div class="card-body">

                    <div class="auth-logo">
                        <h3 class="text-center">
                            <a href="index.html" class="logo d-block my-4">
                                <img src="assets/images/logo-est.png" style="width:53px; height:53px;" class="logo-dark mx-auto"  alt="logo-dark">
                                <img src="assets/images/logo-est.png" class="logo-light mx-auto" height="30" alt="logo-light">
                            </a>
                        </h3>
                    </div>

                    <div class="p-3">
                        <h4 class="text-muted font-size-18 text-center">Bonjour!</h4>
                        <p class="text-muted text-center">Veuillez se connecter.</p>

                        <form class="form-horizontal" action="" method="POST">

                            <div class="mb-3">
                                <label class="form-label" for="username">Email</label>
                                <input type="email" class="form-control" id="username" placeholder="Votre email" name="Email">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="userpassword">Mot de passe</label>
                                <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="Password">
                            </div>
                            <br>
                            <div class="mb-3 row">
                                
                                <div class=" text-center">
                                    <button class="btn btn-primary w-md waves-effect waves-light" name="submit" type="submit">Log In</button>
                                </div>
                            </div>

                            
                        </form>
                    </div>

                </div>
            </div>

            

        </div>


      

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

</html>