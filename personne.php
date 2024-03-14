<?php
include_once 'connection.php';
include_once 'header.php';

if(isset($_GET['delete_personne'])){   
  $id=$_GET['delete_personne'];      
  $courrier->Delete_personne($id);
  
 }

 if(isset($_POST['btn-save'])){

     $nom_complait=$_POST['nom_complait'];
     $fonction=$_POST['fonction'];
     $grade=$_POST['grade'];
     $matrecule=$_POST['matrecule'];
     $cin=$_POST['cin'];
     $tel=$_POST['tel'];
     $error=array();
     $sucss=array();
    if($_POST['nom_complait']!=""){
        $courrier->CreatePersonne($nom_complait,$fonction,$grade,$matrecule,$cin,$tel);
        $sucss[]="le Persone ".$nom_complait." ajouter avec succés";
    }
    else{
        $error[]="Tout les champ obligatiore..!";
    }
 }

?>

<div class="col py-3">
<h2>Personnel</h2>
<hr>
       
<div class="main">
  
  <!-- Another variation with a button -->
  <form action="" method="post">
  <div class="input-group">
    <input type="input" class="form-control" placeholder="Search..." name="searchValues">
    <div class="input-group-append">
      <button class="btn btn-primary" name="search" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
    </div>
  </div>
  <p></p></form>

      <?php

        if(isset($error)){
          foreach ($error as $er) {
           ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>ERROR !  </strong> <?php echo $er?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
           <?php
          }
        }

        if(isset($sucss)){
         foreach ($sucss as $vl) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success : </strong> <?php echo $vl?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php
         }
       }

      ?>

     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-outline-primary" onclick="location.href='#'" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i>  Nouvelle Personne</button>

     </div>
     <hr>
      <footer class="text-center">
        <!-- table -->
        <!-- begin style data table css -->
         <style>
           div.dataTables_wrapper div.dataTables_length select {
            width: 55px;
            display: inline-block;
          }
          .dataTables_length{
            margin-right: 600px;
          }
          .dataTables_info{
            margin-right: 0%;
            margin-left: 0%; 
          }   
          table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled) {
           padding-right: 0px;
           }
         </style>
         <!-- fin style data table css -->

        <div class="card bg-wieth mb-3">
          <div class="card-header" style="color: black; margin-bottom:20px;"><h5>PERSSONE</h5> </div>
            <div class="card-body">
            <!-- <h5 class="card-title" style="color: black;">Success card title</h5> -->
            <table id="id_datatable_pr" style="width: 100%;" class="table table-hover" >
          <thead>
             <tr>
                <th>Nom Complaite</th>
                <th>Fonction</th>
                <th>Grade</th>
                <th>Matrecule</th>
                <th>CIN</th>
                <th>Telephone</th> 
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
            <?php 
        
                if(isset($_POST['searchValues'])){
                  $searchVl=$_POST['searchValues'];
                  $courrier->searchPersonne($searchVl);
                }
                else{
                  $courrier->DataView_persone(); 
                }
            ?>
          </tbody>        
        </table>
          </div>
        </div>
        <!-- table -->
      </footer>

    </div>
  </main>


  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter Personne</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
            <!-- form -->
        <form method="POST">
            <table>
                <tr>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="Nom et Prennome" name="nom_complait">
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="Fonction" name="fonction">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="Grade" name="grade">
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="Matrecule" name="matrecule">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="CIN" name="cin">
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="Telephone" name="tel">
                      </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn-save">Save</button>
      </div>
       </form>
        <!-- fin form -->

      </div>
      
    </div>
  </div>

</div>
</div>

      <!-- fin modale -->
<?php
  include_once 'footer.php';
?>

     

