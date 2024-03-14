<?php

include_once 'header.php';

include_once 'connection.php';

if (isset($_POST['btn-update'])) {
    
    $id_personne=$_GET['edit_personne'];
    $nom_prenom=$_POST['nom_prenom'];
    $fonction=$_POST['fonction'];
    $grade=$_POST['grade'];
    $matrecule=$_POST['matrecule'];
    $cin=$_POST['cin'];
    $tel=$_POST['tel'];
    $error=array();
    $sucsses=array();
    if (!empty($nom_prenom)) {
      $courrier->ModiffiePersonne($id_personne,$nom_prenom,$fonction,$grade,$tel,$matrecule,$cin);
      // header('location:regestre_arrive.php');
      $sucsses[]="Les données ont été modifiés avec succès.";
    }else{
      $error[]="les chompte obligatiore.";
    }
      
}

if(isset($_GET['edit_personne'])){
    $id=$_GET['edit_personne'];
    extract($courrier->getPersonne($id));
  }

?>

<!-- sidebar-wrapper  -->     
      
<div class="col py-3">
<h2>Modiffier une Personne</h2>

      
      <hr>

      <footer class="text-center">
        <!-- form ajouter regestre -->
          
        <div class="card">
           <h5 class="card-header">Modiffier Personne</h5>
           <div class="card-body">
             <h5 class="card-title"></h5>
              

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
    
            if(isset($sucsses)){
             foreach ($sucsses as $vl) {
              ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success : </strong> <?php echo $vl?>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php
             }
           }
        ?>

              <!-- form -->
        <form method="POST">
            
                      <div class="col" style="padding-top: 3%;">
                      <input type="input" class="form-control" value="<?php echo $nom_prenom ?>" placeholder="Nom et Prennome" name="nom_prenom">
                     </div>

                      <div class="col" style="padding-top: 3%;">
                      <input type="input" class="form-control" value="<?php echo $fonction ?>" placeholder="Fonction" name="fonction">
                      </div>

                      <div class="col" style="padding-top: 3%;">
                      <input type="input" class="form-control" value="<?php echo $grade ?>" placeholder="Grade" name="grade">
                     </div>
                   
                      <div class="col" style="padding-top: 3%;">
                      <input type="input" class="form-control" value="<?php echo $matrecule ?>" placeholder="Matrecule" name="matrecule">
                      </div>
                 
               
                      <div class="col" style="padding-top: 3%;">
                      <input type="input" class="form-control" value="<?php echo $cin ?>" placeholder="CIN" name="cin">
                     </div>
                
                      <div class="col" style="padding-top: 3%;">
                      <input type="input" class="form-control" value="<?php echo $tel ?>" placeholder="Telephone" name="tel">
                      </div>
            
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="location.href='personne.php'">return</button>
        <button type="submit" class="btn btn-primary" name="btn-update">Save</button>
      </div>
       </form>
        <!-- fin form --> 

           </div>
        </div>

 

        <!-- fin form ajouter regestre -->
      </footer>
    </div>
  <!-- page-content" -->
</div>

<?php include_once 'footer.php'; ?>