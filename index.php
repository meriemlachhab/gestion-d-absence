<?php
session_start();
include("./includes/header.php");
$file = simplexml_load_file('data/absence.xml');
$data = $file->Enseignants->Enseignant;
$statut = '';
if(isset($_POST['submit'])){
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    foreach($data as $prof){
        if($prof->Email==$_POST['Email'] && $prof->Password== $_POST['Password'] ){
          if($prof->Etat=="1"){
          $_SESSION['Email']=$_POST['Email'];
          $_SESSION['logged']=true;
          $_SESSION['NumSomme'] = $prof->NumSomme;
          $idprof =$_SESSION['NumSomme'];
          $_SESSION['Password']= $_POST['Password'];
          if(isset($_SESSION['Email']) && $_SESSION['logged']==true)
            header("Location:ModulesList.php?idEn=$idprof");
          }else{
            $statut= "votre compte est désactivé";
             }
        }
    }}

?>

<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          The best way to fund your  <br />
          <span style="color: hsl(218, 81%, 75%)">  study abroad</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
        <?php if($statut!='') {?>
      <div class="alert alert-warning my-3 alert-dismissible fade show" role="alert">
      <strong><?php  echo $statut; ?></strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php }?>
        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form  method="POST">
              <!-- 2 column grid layout with text inputs for the first and last names --

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="Email" placeholder="Email address"/>
             
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="Password" id="form3Example4" class="form-control" placeholder="Password"/>
             
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                  Subscribe to our newsletter
                </label>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4 d-block" name="submit">
                Sign up
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<?php   include('includes/footer.php'); ?>
