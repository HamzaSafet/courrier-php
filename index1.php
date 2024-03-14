<?php
include_once 'connection.php';
include_once 'header.php';


$reqt="SELECT COUNT(*) FROM `personne` WHERE 1";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$number_personne = $stmt->fetchColumn();


$reqt="SELECT COUNT(*) FROM `regestre_depart` WHERE 1";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$number_dpr = $stmt->fetchColumn();


$reqt="SELECT COUNT(*) FROM `regestre_arrivee` WHERE 1";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$number_arv = $stmt->fetchColumn();


$reqt="SELECT COUNT(*) FROM `permissions` WHERE 1";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$number_clas = $stmt->fetchColumn();

?>

<div class="col py-3">
<h2>Dashboard</h2>
<hr>


<div class="container">
  <div class="row">
    <div class="col-6 col">
       <!-- Personne -->

  <div class="col-xl-6 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-user"></i>
        </div>
        <div class="mr-5"><h3>( <?php echo $number_personne ?> ) Personne </h3></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="personne.php">
      <span class="float-left"><h6>Voir Details   <i class="fas fa-angle-right"></i></h6> 
          
          </span>
      </a>
    </div>
  </div>
    </div>
    <div class="col-6 col">
       <!-- Depart -->

  <div class="col-xl-6 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="mr-5"><h3>( <?php echo $number_dpr; ?> ) Courrier Depart</h3></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="register_dpar.php">
      <span class="float-left"><h6>Voir Details   <i class="fas fa-angle-right"></i></h6> 
          
       </span>
      </a>
    </div>
  </div>
    </div>

    <!-- Force next columns to break to new line -->
    <div class="w-100"></div>

    <div class="col-6 col">
       <!-- Arrive -->
   <div class="col-xl-6 col-sm-6 mb-3">
    <div class="card text-white bg-info o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-envelope"></i>
        </div>
        <div class="mr-5"><h3>( <?php echo $number_arv; ?> ) Courrier Arrive</h3></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="regestre_arrive.php">
        <span class="float-left"><h6>Voir Details   <i class="fas fa-angle-right"></i></h6></span>
        <span class="float-right">

        </span>
      </a>
    </div>
  </div>
    </div>
    <div class="col-6 col">
       <!-- permission -->

  <div class="col-xl-6 col-sm-6 mb-3">
    <div class="card text-white bg-secondary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa fa-book"></i>
        </div>
        <div class="mr-5"><h3>( <?php echo $number_clas; ?> ) Permission</h3></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="permission.php">
        <span class="float-left"><h6>Voir Details   <i class="fas fa-angle-right"></i></h6> 
          
        </span>
      </a>
    </div>
  </div>
</div>
    </div>
  </div>
</div>







  

 




</div>


<?php
  include_once 'footer.php';
?>



  