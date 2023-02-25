<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <title>Ests</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />


  <!-- Bootstrap Css -->
  <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-topbar="colored">

  <!-- <body data-layout="horizontal" data-topbar="colored"> -->

  <!-- Begin page -->
  <div id="layout-wrapper">

    <header id="page-topbar">
      <div class="navbar-header">
        <div class="d-flex">

          <!-- LOGO -->
          <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
              <span class="logo-sm">
                <img src="assets/images/logo-est.png" style="width:35px; height:35px;" alt="" height="42">
              </span>
              <span class="logo-lg">
                <img src="assets/images/logo-est.png" alt="" style="width:53px; height:52px;" >
              </span>
            </a>

            <a href="index.html" class="logo logo-light">
              <span class="logo-sm">
                <img src="assets/images/logo-est.png" alt="" height="42">
              </span>
              <span class="logo-lg">
                <img src="assets/images/logo-est.png" alt="" height="42">
              </span>
            </a>
          </div>

          <!-- Menu Icon -->

          <button type="button" class="btn px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
            <i class="mdi mdi-menu"></i>
          </button>


          
        </div>

        <div class="d-flex">
          <div class="dropdown d-inline-block d-lg-none ms-2">
            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="mdi mdi-magnify"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
              aria-labelledby="page-header-search-dropdown">

              <form class="p-3">
                <div class="form-group m-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>


          <!-- App Search -->
          <form class="app-search d-none d-lg-block">
            <div class="position-relative">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="mdi mdi-magnify"></span>
            </div>
          </form>



          <!-- User -->
          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-4.jpg"
                alt="Header Avatar">
            </button>

            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item text-primary" href="#"><i
                  class="mdi mdi-power font-size-16 align-middle me-2 text-primary"></i>
                <span>Logout</span></a>
            </div>
          </div>

          <!-- Setting -->
          <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
              <i class="mdi mdi-cog bx-spin"></i>
            </button>
          </div>

        </div>
      </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

      <div data-simplebar class="h-100">


        <!--- Sidemenu -->
        <div id="sidebar-menu">
          <!-- Left Menu Start -->
          <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
              <a href="dash-admin.php" class="waves-effect">
                <i class="mdi mdi-home"></i>
                <span>Dashboard</span>

              </a>
            </li>


            <li>
              <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-file-tree"></i>
                <span>Departement GI</span>
              </a>
              <ul class="sub-menu" aria-expanded="true">
                <li><a href="GI-professeur.php">Professeurs</a></li>
                <li><a href="javascript: void(0);" class="has-arrow">LP ISIR</a>
                  <ul class="sub-menu" aria-expanded="true">
                    <li><a href="GI-ISIR-Etudiant.php">Etudiant</a></li>
                    <li><a href="GI-ISIR-Module.php">Modules</a></li>
                    <li><a href="GI-ISIR-Matiere.php">Matiere</a></li>
                  </ul>
                </li>

                <li><a href="javascript: void(0);" class="has-arrow ">DUT</a>
                  <ul class="sub-menu" aria-expanded="true">
                    <li><a href="javascript: void(0);" class="has-arrow ">1ère Année</a>
                      <ul class="sub-sub-menu" aria-expanded="true">
                        <li><a href="GI-1ann-Etudiant.php" >Etudiant</a></li>
                        <li><a href="GI-1ann-Module.php">Modules</a></li>
                        <li><a href="GI-1ann-Matiere.php">Matiere</a></li>
                      </ul>
                    </li>

                    <li><a href="javascript: void(0);" class="has-arrow">2ème Année</a>
                      <ul class="sub-sub-menu" aria-expanded="true">
                        <li><a href="GI-2ann-Etudiant.php">Etudiant</a></li>
                        <li><a href="GI-2ann-Module.php">Modules</a></li>
                        <li><a href="GI-2ann-Matiere.php">Matiere</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>
              <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-file"></i>
                <span>Departement TM</span>
              </a>
              <ul class="sub-menu" aria-expanded="true">
                <li><a href="TM-professeur.php">Professeurs</a></li>
                <li><a href="javascript: void(0);" class="has-arrow">LP GCF</a>
                  <ul class="sub-menu" aria-expanded="true">
                    <li><a href="TM-GCF-Etudiant.php">Etudiant</a></li>
                    <li><a href="TM-GCF-Module.php">Modules</a></li>
                    <li><a href="TM-GCF-Matiere.php">Matiere</a></li>
                  </ul>
                </li>

                <li><a href="javascript: void(0);" class="has-arrow">DUT</a>
                  <ul class="sub-menu" aria-expanded="true">
                    <li><a href="javascript: void(0);" class="has-arrow">1ère Année</a>
                      <ul class="sub-sub-menu" aria-expanded="true">
                        <li><a href="TM-1ann-Etudiant.php" >Etudiant</a></li>
                        <li><a href="TM-1ann-Module.php">Modules</a></li>
                        <li><a href="TM-1ann-Matiere.php">Matiere</a></li>
                      </ul>
                    </li>

                    <li><a href="javascript: void(0);" class="has-arrow">2ème Année</a>
                      <ul class="sub-sub-menu" aria-expanded="true">
                        <li><a href="TM-2ann-Etudiant.php">Etudiant</a></li>
                        <li><a href="TM-2ann-Module.php">Modules</a></li>
                        <li><a href="TM-2ann-Matiere.php">Matiere</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-atom"></i>
                <span>Departement TIMQ</span>
              </a>
              <ul class="sub-menu" aria-expanded="true">
                <li><a href="TIMQ-professeur.php">Professeurs</a></li>
                <li><a href="javascript: void(0);" class="has-arrow">LP MQSE</a>
                  <ul class="sub-menu" aria-expanded="true">
                    <li><a href="TIMQ-MQSE-Etudiant.php">Etudiant</a></li>
                    <li><a href="TIMQ-MQSE-Module.php">Modules</a></li>
                    <li><a href="TIMQ-MQSE-Matiere.php">Matiere</a></li>
                  </ul>
                </li>

                <li><a href="javascript: void(0);" class="has-arrow">DUT</a>
                  <ul class="sub-menu" aria-expanded="true">
                    <li><a href="javascript: void(0);" class="has-arrow">1ère Année</a>
                      <ul class="sub-sub-menu" aria-expanded="true">
                        <li><a href="TIMQ-1ann-Etudiant.php" >Etudiant</a></li>
                        <li><a href="TIMQ-1ann-Module.php">Modules</a></li>
                        <li><a href="TIMQ-1ann-Matiere.php">Matiere</a></li>
                      </ul>
                    </li>

                    <li><a href="javascript: void(0);" class="has-arrow">2ème Année</a>
                      <ul class="sub-sub-menu" aria-expanded="true">
                        <li><a href="TIMQ-2ann-Etudiant.php">Etudiant</a></li>
                        <li><a href="TIMQ-2ann-Module.php">Modules</a></li>
                        <li><a href="TIMQ-2ann-Matiere.php">Matiere</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-wrench"></i>
                <span>Departement GIM</span>
              </a>
              <ul class="sub-menu" aria-expanded="true">
                <li><a href="GIM-professeur.php">Professeurs</a></li>
                <li><a href="javascript: void(0);" class="has-arrow">LP MECA</a>
                  <ul class="sub-menu" aria-expanded="true">
                    <li><a href="GIM-MECA-Etudiant.php">Etudiant</a></li>
                    <li><a href="GIM-MECA-Module.php">Modules</a></li>
                    <li><a href="GIM-MECA-Matiere.php">Matiere</a></li>
                  </ul>
                </li>

                <li><a href="javascript: void(0);" class="has-arrow">DUT</a>
                  <ul class="sub-menu" aria-expanded="true">
                    <li><a href="javascript: void(0);" class="has-arrow">1ère Année</a>
                      <ul class="sub-sub-menu" aria-expanded="true">
                        <li><a href="GIM-1ann-Etudiant.php" >Etudiant</a></li>
                        <li><a href="GIM-1ann-Module.php">Modules</a></li>
                        <li><a href="GIM-1ann-Matiere.php">Matiere</a></li>
                      </ul>
                    </li>

                    <li><a href="javascript: void(0);" class="has-arrow">2ème Année</a>
                      <ul class="sub-sub-menu" aria-expanded="true">
                        <li><a href="GIM-2ann-Etudiant.php">Etudiant</a></li>
                        <li><a href="GIM-2ann-Module.php">Modules</a></li>
                        <li><a href="GIM-2ann-Matiere.php">Matiere</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- Sidebar -->
      </div>
    </div>
    <!-- Left Sidebar End -->