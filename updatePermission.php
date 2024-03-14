<?php
include_once 'header.php';

include_once 'connection.php';

if(isset($_POST['btn_update'])){
  $id_permission=$_GET['edit_order_courrier'];
  $date_debu=$_POST['date_debu'];
  $date_fin=$_POST['date_fin'];
  $motif=$_POST['motif'];
  $adresse=$_POST['adresse'];
  $id_personne=$_POST['id_personne'];
  $error=array();
  $valaid=array();
  if(!empty(!empty($id_personne) && !empty($date_fin) && !empty($date_debu) && $adresse !="" && $motif !="")){
    $courrier-> ModiffiePermissions($id_permission,$date_debu,$date_fin,$motif,$adresse,$id_personne);
    $valaid[]="votre operation ajout avec succes.";
        
  }else{
    $error[]="choisi une personne.";
  }  
}

if (isset($_GET['edit_order_courrier'])) {   
    extract($courrier->getPermission($_GET['edit_order_courrier']));
  }

?>

  <!-- sidebar-wrapper  -->
<div class="col py-3">
<h2>Modiffier une Permission</h2>
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

        if(isset($valaid)){
         foreach ($valaid as $vl) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success : </strong> <?php echo $vl?>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          <?php
         }
       }

      ?>

      <style>
        
        
         .datePer{
            padding-left: 5%;
            padding-right: 0%;
            margin-right: -100%;
            margin-left: 60%;
          }
          .inputP{
            margin-right: -202%;
          }
          .inputPp{
            margin-right: -170%;
            margin-left: 27%;
          }
      </style>

      <footer class="text-center">
        <!-- form ajouter regestre -->
    <form class="row g-3" method="POST">
        <div class="card border-secondary" style="max-width: 60rem; margin-left: 10%;margin-top: 4%;">
         <div class="card-header bg-transparent border-secondary">Permission</div>
           <div class="card-body text-secondary">
            <h5 class="card-title">Modifier Permission</h5>
       

          
        
            
        <table id="id_datatable_ord">
                <tr>
                   <td style="padding-top: 5%;">
                     <div class="col inputP">
                      <label for="">Date Debu</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col datePer">
                        <input type="date" value="<?php echo $date_debu ?>" class="form-control" name="date_debu">
                      </div>
                    </td>
                </tr>
                <tr>
                   <td style="padding-top: 5%;">
                     <div class="col inputP">
                      <label for="">Date Fin</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col datePer">
                        <input type="date" value="<?php echo $date_fin ?>" class="form-control" name="date_fin">
                      </div>
                    </td>

                </tr>
                <tr>
                   <td style="padding-top: 5%;" colspan="2">
                      <div class="col inputPp">
                        <input type="input" value="<?php echo $motif ?>" class="form-control" placeholder="Motif" name="motif">
                      </div>
                    </td>
                </tr>
                <tr>
                   <td style="padding-top: 5%;" colspan="2">
                      <div class="col inputPp">
                        <input type="input" value="<?php echo $adresse ?>" class="form-control" placeholder="Adress" name="adresse">
                      </div>
                    </td>
                </tr>
                <tr>
                   <td style="padding-top: 5%;" colspan="2">
                   <div class="col inputPp">
                          <?php 
                          
                              include_once 'connection.php';
                              $reqt="SELECT `id_personne`,`nom_prenom` FROM `personne`";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
      
                            ?>
                              <select id="inputState" class="form-select" name="id_personne">
                          <?php while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {
                          if($row['id_personne'] == $id_personne){
                            ?>
                               <option selected value="<?php echo $row['id_personne'];?>"><?php echo $row['nom_prenom']; ?></option>
                            <?php
                          }else{
                            ?>
                                <option  value="<?php echo $row['id_personne'];?>"><?php echo $row['nom_prenom']; ?></option>
                            <?php
                          }
                         ?> 
                                
                       <?php } ?>
                           <option  value="0">choisir une personne</option>
                           </select>
                       </div>
                    </td>
                </tr>
            </table>
  
        

        <!-- fin form ajouter regestre -->
        </div>
       <div class="card-footer bg-transparent border-success">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary" onclick="location.href='permission.php'" type="button">Return</button>
           <button type="submit" class="btn btn-primary me-md-2" name="btn_update" >Save</button>
        
       </div>
      </div>
    </div>
</form>
</footer>
   
</div>
</div>
<script type="text/javascript" src="static/js/jquery-3.5.1.min.js"></script>
<?php include_once 'footer.php'; ?>

<script type="text/javascript">

//    $('select[name="segnature"]').change(function(){
//     var selectBox = document.getElementById("inputStateSig");
//     var selectedValue = selectBox.options[selectBox.selectedIndex].value;
//     var id = "signee" + $(this).val();

//      if(selectedValue=="signee"){
//       $('div.colsignee').show();
//      }else{
//        $('div.colsignee').hide();
//      }
  
// });

</script>
