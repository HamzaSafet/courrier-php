<?php
include_once 'header.php';

include_once 'connection.php';

if (isset($_POST['btn_update'])) {
    
  $id_regestre_arv=$_GET['edit_rgt_arv'];
  $date_arrivee=$_POST['date_arrivee'];
  $num_ordere_arv=$_POST['num_ordere_arv'];
  $date_courrier_arriver=$_POST['date_courrier_arriver'];
  $num_lettre_arrivee=$_POST['num_lettre_arrivee'];
  $id_dest=$_POST['id_dest'];
  $objet_arriver=$_POST['objet_arriver'];
  $date_observation=$_POST['date_observation'];
  $id_type_courrier=$_POST['id_type_courrier'];
  $id_personne=$_POST['id_personne'];
  $classement_arrivee=$_POST['classement_arrivee'];
  $error=array();
  $sucsses=array();
  if (!empty($id_personne)) {
    $courrier->ModiffierRgtr_arv($id_regestre_arv,$date_arrivee,$num_ordere_arv,$date_courrier_arriver,$num_lettre_arrivee,$id_dest,$objet_arriver,$date_observation,$id_type_courrier,$id_personne,$classement_arrivee);
    // header('location:regestre_arrive.php');
    $sucsses[]="Les données ont été modifiés avec succès.";
  }else{
    $error[]="choisi une personne.";
  }
    
}
if (isset($_GET['edit_rgt_arv'])) {   
extract($courrier->getRgtr_arv($_GET['edit_rgt_arv']));
}
?>

  <!-- sidebar-wrapper  -->
      

<div class="col py-3">
<h2>Modiffier un Regestre Arrive</h2>
    
      
      <?php
         if(isset($error)){
           foreach ($error as $er) {
            ?>
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
               <strong>SUCSSES : </strong> <?php echo $vl?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           <?php
          }
        }
      ?>
     
      <hr>

      <footer class="text-center">
        <!-- form ajouter regestre -->
          
        <form class="row g-3" method="POST">
            <table>
                <tr>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="N° classement" value="<?php echo"$num_ordere_arv" ?>" name="num_ordere_arv">
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="N° courrier arrivee" value="<?php echo"$num_lettre_arrivee"; ?>" name="num_lettre_arrivee">
                      </div>
                    </td>
                    <td style="padding-top: 3%;">
                     <div class="col-12">
                      <label for="">Date Aujourd'hui</label>
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="date" class="form-control" value="<?php echo"$date_arrivee"; ?>" name="date_arrivee">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 5%;">
                     <div class="col">
                      <label for="">Date Courrier </label>
                     </div>
                    </td>
                    <td style="padding-top: 5%; margin-right: 10%;">
                      <div class="col">
                        <input type="date" class="form-control" value="<?php echo"$date_courrier_arriver"; ?>" name="date_courrier_arriver">
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                      <?php 
                              include_once 'connection.php';
                              $reqt="SELECT `id_dest`,`destinataire` FROM `destinataires`";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
                            ?>
                              <select id="inputState" class="form-select" name="id_dest">
                           <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {   
                                  if ($row['id_dest']== $id_dest) {
                                    ?>
                                      <option selected value="<?php echo $row['id_dest'];?>"><?php echo $row['destinataire']; ?></option>
                                    <?php
                                  }else{
                                    ?>
                                      <option  value="<?php echo $row['id_dest'];?>"><?php echo $row['destinataire']; ?></option>
                                    <?php
                                  }
                               ?> 
                                 
                               <?php   
                              }
                          ?>
                          <option  value="0">désignation du déstinataire</option>
                        </select>
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                     <div class="col">
                          <?php 
                              include_once 'connection.php';
                              $reqt="SELECT `id_type_courrier`, `type_courrier` FROM `type_courriers`";
                              $stmt=$conx->prepare($reqt);
                              $stmt->execute();
                            ?>
                                <select id="inputState" class="form-select" name="id_type_courrier">
                                 
                                 <?php 
                                      while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {   
                                        if ( $row['id_type_courrier']==$id_type_courrier) {
                                           ?>
                                             <option selected value="<?php echo $row['id_type_courrier'];?>"><?php echo $row['type_courrier']; ?></option>
                                           <?php
                                        }else{
                                          ?>
                                            <option  value="<?php echo $row['id_type_courrier'];?>"><?php echo $row['type_courrier']; ?></option>
                                          <?php
                                        }
                                      
                                    }
                                ?>
                                <option  value="0">type courrier</option>
                              </select>
                     </div>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4" style="padding-top: 5%;">
                     <div class="col">
                      <label for="inputAddress" class="form-label">Objet</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="objet_arriver"><?php echo"$objet_arriver"; ?></textarea>
                     </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 5%;">
                     <div class="col-12">
                      <label for="">Date Obsérvation</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                      <input type="date" class="form-control" value="<?php echo"$date_observation"; ?>" name="date_observation">
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                     <div class="col-12">
                       <input type="input" class="form-control" placeholder="classement arrivee" value="<?php echo"$classement_arrivee"; ?>" name="classement_arrivee">
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
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
                <tr>
                    <td colspan="4" style="padding-top: 5%;">
                      <div class="col">
                        <button type="button" class="btn btn-primary" onclick="location.href='regestre_arrive.php'">return</button>
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                        <button type="submit" class="btn btn-primary" name="btn_update">Save </button>
                      </div>
                    </td>
                </tr>
            </table>
    </div>
  
</form>

        <!-- fin form ajouter regestre -->
      </footer>
  <!-- page-content" -->
</div>

<?php include_once 'footer.php'; ?>

