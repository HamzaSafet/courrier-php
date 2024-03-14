<?php 
include_once 'header.php';
include_once 'connection.php';

$reqt="SELECT `id_regestre_dpr`, `date_courrier_dpr`, `num_ordere_dpr`, ds.destinataire, `objet_depart`, `signature`, `signer_par`, ty.type_courrier, `adress`, pr.nom_prenom ,classement_depart
       FROM regestre_depart ar INNER JOIN personne pr,type_courriers ty,destinataires ds 
       WHERE ar.`id_personne` = pr.`id_personne` and ar.id_type_courrier=ty.id_type_courrier and ar.id_dest=ds.id_dest";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();

if(isset($_GET['delete_rgt_dp'])){
  $id=$_GET['delete_rgt_dp'];
    $courrierdp->DeleteRgtr_dpr($id);

}


include_once 'datatable.php';
?>
<div class="col py-3">
<h2>Courrier Départ</h2>
<hr> 
     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-outline-primary" onclick="location.href='add_regestre_dpert.php'"><i class="fas fa-plus"></i>  Nouveau Depart</button>

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
            margin-right: 30%;
            margin-left: -35%; 
          }    
         </style>
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
          <div class="card-header" style="color: black; margin-bottom:20px;"><h5>DEPART</h5> </div>
            <div class="card-body">
            <!-- <h5 class="card-title" style="color: black;">Success card title</h5> -->
            <table id="id_datatable_dp" style="width: 100%;" class="table table-hover">
          <thead>
             <tr>
                <th>N° Classement</th>
                <th>Date Courrier</th>      
                <th>Destinataire</th>
                <th>Type Courrier</th>
                <th>Objet</th>
                <th>Signature</th>
                <th>Signée par</th>
                <th>Adress</th>
                <th>Personne</th>
                <th>Classement</th>
                <th>Action</th>
             </tr>   
          </thead>
          <tbody>
          <?php
           while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
               ?>

               <tr>
                <td><?php echo $row['num_ordere_dpr']; ?></td>
                <td><?php echo $row['date_courrier_dpr']; ?></td>
                <td><?php echo $row['destinataire']; ?></td> 
                <td><?php echo $row['type_courrier']; ?></td>   
                <td><?php echo $row['objet_depart']; ?></td>
                <td>
                   <?php 
                    if($row['signature']=="signee"){
                      echo $row['signature']; 
                    }else{
                      echo "Non signee";
                    }   
                   ?>
                </td>
                <td>
                  <?php 
                     if(empty($row['signer_par'])){
                        echo '<span class="badge rounded-pill bg-warning text-dark">Non signee</span>';
                     }else{
                       echo $row['signer_par'];
                     } 
                  ?>
                </td>           
                <td><?php echo $row['adress']; ?></td>
                <td><?php echo $row['nom_prenom']; ?></td>
                <td><?php echo $row['classement_depart']; ?></td>
                <td>
                  <a href="update_rgt_dp.php?edit_rgt_dp=<?php echo $row['id_regestre_dpr'];?>">
                       <i class="far fa-edit fa-2x"></i></a>
                  <a href="register_dpar.php?delete_rgt_dp=<?php echo $row['id_regestre_dpr'];?>" onclick="return confirm('voulez vous vraiment supprimer cet opération?')">
                     <i class="fas fa-trash-alt fa-2x"></i></a>
                </td>
               </tr>

            <?php
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
  <!-- page-content" -->
</div>
    
</body>
</div>

</html>

  <!-- data table script -->
     
  <script type="text/javascript">
      
       $(document).ready(function() {
         $('#id_datatable_dp').DataTable();
       });


    </script>


<?php 
include_once 'footer.php';
?>

