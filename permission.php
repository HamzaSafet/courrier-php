<?php
include_once 'connection.php';
include_once 'header.php';

$reqt="SELECT `id_permission`,`date_debu`,`date_fin`,`motif`,`adresse`,pr.nom_prenom,pr.tel FROM `permissions` pm INNER JOIN personne pr WHERE pm.`id_personne` = pr.id_personne";
$stmt=$conx->prepare($reqt);
$stmt->execute();

if(isset($_POST['btn-save'])){
  
  $date_debu=$_POST['date_debu'];
  $date_fin=$_POST['date_fin'];
  $motif=$_POST['motif'];
  $adresse=$_POST['adresse'];
  $id_personne=$_POST['id_personne'];
  $sucss=array();
  $error=array(); 
 if(!empty($id_personne) && !empty($date_fin) && !empty($date_debu) && $adresse !="" && $motif !=""){
      $courrier->CreatePermissions($date_debu,$date_fin,$motif,$adresse,$id_personne);
     $sucss[]="Cet Opération Ajouté Avec Succès.";
 }
 else{
     $error[]="Tout les Champ Obligatiore..!";
 }
}

if(isset($_GET['delete_permission'])){  

  $id=$_GET['delete_permission'];      
  $courrier->DeletePermissions($id);
  
 }

 include_once 'datatable.php';

?>

<div class="col py-3">
<h2>Permissions</h2>
<hr> 

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
       
 <div class="main">

     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i> Nouvelle Permissions </button>

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
          /* .colorDelete{
            color: #ff00009e;
          } */
          table.dataTable>thead>tr>th:not(.sorting_disabled), table.dataTable>thead>tr>td:not(.sorting_disabled) {
           padding-right: 0px;
           }
           .dateDF{
            margin-left: 23%;
            margin-right: -60%;
           }
           .marR{
            margin-right: -43%;
           }
           
         </style>
         <!-- fin style data table css -->

        <div class="card bg-wieth mb-3">
          <div class="card-header" style="color: black; margin-bottom:20px;"><h5>ORDER</h5> </div>
            <div class="card-body">
            <!-- <h5 class="card-title" style="color: black;">Success card title</h5> -->
            <table id="id_datatable_pr" style="width: 100%;" class="table table-hover" >
          <thead>
             <tr>
                <th>Nom et Prenom</th>
                <th>Date Debu</th>
                <th>Date Fin</th> 
                <th>Motif</th> 
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Action</th> 
             </tr>
          </thead>
          <tbody>
           <?php 
             if ($stmt->rowCount()>=0) {
              while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                 ?>
                 <tr>
                  <td><?php echo $row['nom_prenom']; ?></td>
                  <td><?php echo $row['date_debu']; ?></td>  
                  <td><?php echo $row['date_fin']; ?></td>
                  <td><?php echo $row['motif']; ?></td>
                  <td><?php echo $row['adresse']; ?></td>
                  <td><?php echo $row['tel']; ?></td>
                  
                  <td>
                    <a href="updatePermission.php?edit_order_courrier=<?php echo $row['id_permission'];?>">
                         <i class="far fa-edit fa-2x"></i></a>
                    <a href="permission.php?delete_permission=<?php echo $row['id_permission'];?>" onclick="return confirm('voulez vous vraiment supprimer cet operation ?')">
                       <i class="fas fa-trash-alt fa-2x colorDelete"></i></a>
                  </td> 
                 </tr>
                 <?php
              }
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
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter Permissions</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="margin-left: 30px;">
            
            <!-- form -->
        <form method="POST">
            <table id="id_datatable_ord">
                
                <tr>
                   <td style="padding-top: 5%;">
                     <div class="col-12">
                      <label for="">Date Debu</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col dateDF">
                        <input type="date" class="form-control" name="date_debu">
                      </div>
                    </td>
                </tr>
                <tr>
                   <td style="padding-top: 5%;">
                     <div class="col-12">
                      <label for="">Date Fin</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col dateDF">
                        <input type="date" class="form-control" name="date_fin">
                      </div>
                    </td>

                </tr>
                <tr>
                   <td style="padding-top: 5%;" colspan="2">
                      <div class="col marR">
                        <input type="input" class="form-control" placeholder="Motif" name="motif">
                      </div>
                    </td>
                </tr>
                <tr>
                   <td style="padding-top: 5%;" colspan="2">
                      <div class="col marR">
                        <input type="input" class="form-control" placeholder="Adress" name="adresse">
                      </div>
                    </td>
                </tr>
                <tr>
                   <td style="padding-top: 5%;" colspan="2">
                     <div class="col marR">
                          <?php 
                              $reqt="SELECT `id_personne`,`nom_prenom` FROM `personne`";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
      
                            ?>
                               <select id="inputState" class="form-select" name="id_personne">
                           <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {
                                  
                               ?> 
                                 <option selected value="<?php echo $row['id_personne'];?>"><?php echo $row['nom_prenom']; ?></option>
                               <?php  
                                
                              }
                          ?>
                          <option selected value="0">choisir une personne</option>
                        </select>
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
<script type="text/javascript">


$(document).ready(function() {

  $('#id_datatable_pr').DataTable();
});

// function display() {  
//             if(document.getElementById('flexRadioDefault1').checked) { 
//                 $('div.colsignee_arv').show();
//                 $('div.colsignee_dpr').hide();
//             } 
//             else { 
//               $('div.colsignee_dpr').show();
//               $('div.colsignee_arv').hide();
//             } 
//         } 

</script>

<?php 
include_once 'footer.php'; 
?>

