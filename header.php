<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>
    <link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="static/fontawesome/css/all.min.css" rel="stylesheet">
    
    <!-- <link href="static/css/mystyle.css" rel="stylesheet" /> -->

    <link rel="stylesheet" type="text/css" href="static/js/datatable/DataTables-1.10.23/css/dataTables.bootstrap4.min.css"/>
  
    <style>
        .color{
            color: #818896;
        }

        .nav-link {
            display: block;
           /* padding: .5rem 1rem; */
           padding: 18px 30px 10px 20px;
           text-decoration: none;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
        }

        a {
           color: #c7d2e2;
           text-decoration: underline;
        }

        .border{
            border-top: 1px solid #3a3f48;
        }
    </style>
    
</head>

<body>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
             <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
               
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Gestion Courrier</span>
                </a>
                
                <!-- <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="static/img/Admin.png"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">secretariat
            <strong>DPSIC</strong>
          </span>
          <br>
          <span class="user-status">
            <span>Online</span> <i style="color: green;" class="fa fa-circle"></i>
          </span>
        </div>
      </div> -->

      <br> 
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                    
                    <li class="nav-item">
                       <a href="index1.php" class="nav-link align-middle px-0">
                        <i class="fa fa-tachometer-alt"></i></i> <span class="ms-1 d-none d-sm-inline color">Dashboard</span>
                       </a>
                    </li>
                   
                    <li>
                        <a href="personne.php" class="nav-link px-0 align-middle">
                        <i class="far fa-user"></i> <span class="ms-1 d-none d-sm-inline color">Personne</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                        <i class="fas fa-envelope"></i><span class="ms-1 d-none d-sm-inline color">Courrier</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="register_dpar.php" class="nav-link px-0"> <span class="d-none d-sm-inline color">register départ</span></a>
                            </li>
                            <li>
                                <a href="regestre_arrive.php" class="nav-link px-0"> <span class="d-none d-sm-inline color">register arrivée</span> </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="order_courrier.php" class="nav-link px-0 align-middle">
                        <i class="fa fa-book"></i> <span class="ms-1 d-none d-sm-inline color">Classement Courrier</span> </a>
                    </li> -->
                    <li>
                        <a href="permission.php" class="nav-link px-0 align-middle">
                        <i class="far fa-sticky-note"></i> <span class="ms-1 d-none d-sm-inline color">Permission</span> </a>
                    </li>
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                           <i class="far fa-user"></i> <span class="ms-1 d-none d-sm-inline color">User</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="user.php" class="nav-link px-0"> <span class="d-none d-sm-inline color">utilisateur</span> </a>
                            </li>
                            </ul>
                    </li>
                </ul>
                <hr>
                <!-- <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
        <!-- <div class="col py-3">
            <h3>Left Sidebar with Submenus</h3>
            <p class="lead">An example 2-level sidebar with collasible menu items. The menu functions like an "accordion" where only a single menu is be open at a time.</p>
            <ul class="list-unstyled">
                <li><h5>Responsive</h5> shrinks in width, hides text labels and collapses to icons only on mobile</li>
            </ul>
        </div> -->
   