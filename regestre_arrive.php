<?php 
include_once 'header.php';
include_once 'connection.php';

$reqt="SELECT `id_regestre_arv`, `date_arrivee`, `num_ordere_arv`, `date_courrier_arriver`, `num_lettre_arrivee`, `objet_arriver`, `date_observation`, pr.nom_prenom,ty.type_courrier,ds.destinataire,classement_arrivee
       FROM regestre_arrivee ar INNER JOIN personne pr,type_courriers ty,destinataires ds 
       WHERE ar.`id_personne` = pr.`id_personne` and ar.id_type_courrier=ty.id_type_courrier and ar.id_dest=ds.id_dest";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();

  if(isset($_GET['delete_rgt_arv'])){
    $id=$_GET['delete_rgt_arv'];
      $courrier->DeleteRgtr_arv($id);

  }

  include_once 'datatable.php';
?>
<div class="col py-3">
<h2>Courrier Arrivée</h2>
<hr> 

     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <button type="button" class="btn btn-outline-primary" onclick="location.href='add_regestre_arrive.php'"><i class="fas fa-plus"></i>  Nouveau Arrivée</button>

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
          <div class="card-header" style="color: black; margin-bottom:20px;"><h5>ARRIVEE</h5> </div>
            <div class="card-body">
            <!-- <h5 class="card-title" style="color: black;">Success card title</h5> -->
            <table id="id_datatable_ar" style="width: 100%;" class="table table-hover" >
          <thead>
             <tr>
                <th>Date Aujourd'hui</th>
                <th>N°Order</th>
                <th>Date Arriver</th>
                <th>N°lettre</th>
                <th>Expéditeur</th>
                <th>Objet</th>
                <th>Date Reponse</th>
                <th>Type Courrier</th>
                <th>classement</th>
                <th>Personne</th>
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
            <?php
           while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
               ?>

               <tr>
                <td><?php echo $row['date_arrivee']; ?></td>
                <td><?php echo $row['num_ordere_arv']; ?></td>
                <td><?php echo $row['date_courrier_arriver']; ?></td>    
                <td><?php echo $row['num_lettre_arrivee']; ?></td>
                <td><?php echo $row['destinataire']; ?></td>
                <td><?php echo $row['objet_arriver']; ?></td>
                <td><?php echo $row['date_observation']; ?></td>
                <td><?php echo $row['type_courrier']; ?></td>
                <td><?php echo $row['classement_arrivee']; ?></td>
                <td><?php echo $row['nom_prenom']; ?></td>
                <td>
                  <a href="update_rgt_arv.php?edit_rgt_arv=<?php echo $row['id_regestre_arv'];?>">
                       <i class="far fa-edit fa-2x"></i></a>
                  <a href="regestre_arrive.php?delete_rgt_arv=<?php echo $row['id_regestre_arv'];?>" onclick="return confirm('voulez vous vraiment supprimer cet courrier ?')">
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
<!-- page-wrapper -->
 

    <!-- data table script -->
    <script type="text/javascript">
      
      $(document).ready(function() {
        $('#id_datatable_ar').DataTable();
      });

    </script>
    <!-- data table script -->

</body>

</html>

</div>

<?php 
include_once 'footer.php';
?>
