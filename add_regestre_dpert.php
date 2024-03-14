<?php
include_once 'header.php';

include_once 'connection.php';

if(isset($_POST['btn_save'])){
  $date_courrier_dpr=$_POST['date_courrier_dpr'];
  $num_ordere_dpr=$_POST['num_ordere_dpr'];
  $id_dest=$_POST['id_dest'];
  $objet_depart=$_POST['objet_depart'];
  $segnature=$_POST['segnature'];
  $signier_par=$_POST['signier_par'];
  $id_type_courrier=$_POST['id_type_courrier'];
  $adress=$_POST['adress'];
  $id_personne=$_POST['id_personne'];
  $classement_depart=$_POST['classement_depart'];
  $error=array();
  $valaid=array();
  if(!empty($id_personne)&&!empty($date_courrier_dpr)&&!empty($num_ordere_dpr)&&!empty($id_dest)&&!empty($objet_depart)&&!empty($id_type_courrier)){
    $courrierdp-> CreateRgtr_dpr($date_courrier_dpr,$num_ordere_dpr,$id_dest,$objet_depart,
    $segnature,$signier_par,$id_type_courrier,$adress,$id_personne,$classement_depart);
    $valaid[]="votre operation ajout avec succes.";
        
  }else{
    $error[]="Tout les chomp obligatior.";
  }  
}

?>

  <!-- sidebar-wrapper  -->

<div class="col py-3">
 <h2>Ajouter un Regestre Depart</h2>
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


      <footer class="text-center">
        <!-- form ajouter regestre -->

<?php

$reqt="SELECT MAX(`num_ordere_dpr`) as max_numOrd FROM `regestre_depart` ORDER BY `id_regestre_dpr` DESC";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$invNum = $stmt -> fetch(PDO::FETCH_ASSOC);
$max_numOrd = $invNum['max_numOrd'];

$reqt1="SELECT DISTINCT(YEAR(`date_courrier_dpr`)) as date_arrive  FROM `regestre_depart` WHERE `id_regestre_dpr`=(SELECT max(`id_regestre_dpr`) FROM regestre_depart)";
$stmt1 = $conx->prepare("$reqt1"); 
$stmt1->execute();
$dateNow = $stmt1 -> fetch(PDO::FETCH_ASSOC);
$max_date_now = $dateNow['date_arrive'];
$dateSystem=date('Y');
if($max_date_now==$dateSystem){
   $max_numOrd=$max_numOrd+1;
}else{
   $max_numOrd=1;
}

?>
       
       <form class="row g-3" method="POST">
            <table>
                <tr>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control"  placeholder="N° classement" value="<?php echo $max_numOrd ?>" name="num_ordere_dpr">
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                     <div class="col-12">
                      <label for="">Date Courrier</label>
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="date" class="form-control" placeholder="" name="date_courrier_dpr">
                      </div>
                    </td>
                    <td style="padding-top: 3%;">
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
                               ?> 
                                 <option selected value="<?php echo $row['id_dest'];?>"><?php echo $row['destinataire']; ?></option>
                               <?php   
                              }
                          ?>
                          <option selected value="0">désignation du déstinataire</option>
                        </select>
                      </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top: 5%;">
                     <div class="col">
                      <label for="inputAddress" class="form-label">Objet</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="objet_depart"></textarea>
                     </div>
                    </td>
                </tr>
                <tr>
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
                               ?> 
                                 <option selected value="<?php echo $row['id_type_courrier'];?>"><?php echo $row['type_courrier']; ?></option>
                               <?php   
                              }
                          ?>
                          <option selected value="0">type courrier</option>
                        </select>
                      </div>
                    </td>
                    <td colspan="3" style="padding-top: 5%;">
                     <div class="col">
                      <input type="input" class="form-control" placeholder="Adresse" name="adress">
                     </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 5%;">                    
                      <div class="col">
                        <select id="inputStateSig" name="segnature" class="form-select">
                           <option value="signee">signée</option>
                           <option selected value="signee_pas">Non signée</option> 
                        </select>
                      </div>
                    </td>
                    
                    <td colspan="1" style="padding-top: 5%;">
                       <div class="colsignee" style="display:none;">
                          <input type="input" class="form-control" placeholder="signée par" name="signier_par">
                       </div>
                    </td>
                    <td style="padding-top: 5%;">
                     <div class="col-12">
                       <input type="input" class="form-control" placeholder="classement courrier" name="classement_depart">
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                      <?php  
                          $reqt="SELECT `id_personne`,`nom_prenom` FROM `personne`";
                          $stmt=$conx->prepare($reqt);
                          $stmt->execute();
                        ?>
                    <select id="inputState" class="form-select" name="id_personne">
                       <?php while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) { ?> 
                                <option selected value="<?php echo $row['id_personne'];?>"><?php echo $row['nom_prenom']; ?></option>
                       <?php } ?>
                           <option selected value="0">choisir une personne</option>
                    </select>
                       </div>
                    </td>                   
                </tr>
                <tr>
                    <td colspan="4" style="padding-top: 3%;">
                      <div class="col">
                        <button type="button" class="btn btn-primary" onclick="location.href='register_dpar.php'">return</button>
                      </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                        <button type="submit" name="btn_save" class="btn btn-primary">Save </button>
                      </div>
                    </td>
                </tr>
            </table>
    </div>
  
</form>

        <!-- fin form ajouter regestre -->
      </footer>
    </div>

</div>
<script type="text/javascript" src="static/js/jquery-3.5.1.min.js"></script>
<?php include_once 'footer.php'; ?>
<script type="text/javascript">

$('select[name="segnature"]').change(function(){
    var selectBox = document.getElementById("inputStateSig");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    var id = "signee" + $(this).val();

     if(selectedValue=="signee"){
      $('div.colsignee').show();
     }else{
       $('div.colsignee').hide();
     }
  
});

</script>





       
 



