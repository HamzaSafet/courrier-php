<?php
include_once 'header.php';

include_once 'connection.php';


if (isset($_POST['btn_save'])) {

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
  $valaid=array();
  if(!empty($id_personne)&& !empty($date_arrivee)&& !empty($num_ordere_arv)&& !empty($date_courrier_arriver)&& !empty($num_lettre_arrivee)&& !empty($id_dest)&& !empty($objet_arriver)&& !empty($id_type_courrier)){
    $courrier->CreateRgtr_arv($date_arrivee,$num_ordere_arv,$date_courrier_arriver,$num_lettre_arrivee
              ,$objet_arriver,$date_observation,$id_personne,$id_type_courrier,$id_dest,$classement_arrivee);
    $valaid[]="Votre operation ajout avec succes.";
        
  }else{
    $error[]="Tout les chomp obligatior.";
  }  
}

if(isset($_POST['btn_save_dest'])){
  $destinataire=$_POST['destinataire'];
  if(!empty($destinataire)){
    $courrier->CreateDest($destinataire);
    // $valaid[]="votre operation ajout avec succes.";
        
  }else{
    $error[]="Tout les champ obligatoire.";
  }  
}

if(isset($_POST['btn_save_type'])){
  $type_courrier=$_POST['type_courrier'];
  if(!empty($type_courrier)){
    $courrier->CreateType($type_courrier);
    // $valaid[]="votre operation ajout avec succes.";
        
  }else{
    $error[]="Tout les champ obligatoire.";
  }  
}
?>


  <!-- sidebar-wrapper  -->
 
<div class="col py-3">
<h2>Ajouter un Regestre Arrive</h2>
   <style>
      .marg{
        margin-right: 56%;
      }
      .btn_select{
        margin-bottom: -44%;
        margin-right: -136%;
        margin-left: -105%;
        margin-top: -47%;
      }
      .slect_des{
        margin-left: -45%;
        margin-bottom: -8%;
      }
      .inbt_dat {
         margin-left: -55%;
      }
      .typecour{
        margin-left: -17%;
        margin-bottom: -11%;
      }
      .btn_type{
        margin-top: -23%;
        margin-bottom: -22%;
        margin-right: -90%;
      }
      
   </style>
         
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
     
      <hr>

      <footer class="text-center">
        <!-- form ajouter regestre -->
          
<?php

$reqt="SELECT MAX(`num_ordere_arv`) as max_numOrd FROM `regestre_arrivee` ORDER BY `id_regestre_arv` DESC";
$stmt = $conx->prepare("$reqt"); 
$stmt->execute();
$invNum = $stmt -> fetch(PDO::FETCH_ASSOC);
$max_numOrd = $invNum['max_numOrd'];

$reqt1="SELECT DISTINCT(YEAR(`date_arrivee`)) as date_arrive  FROM `regestre_arrivee` WHERE `id_regestre_arv`=(SELECT max(`id_regestre_arv`) FROM regestre_arrivee)";
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
                      <input type="input" class="form-control" value="<?php echo $max_numOrd; ?>" name="num_ordere_arv">
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="input" class="form-control" placeholder="N° Référence" name="num_lettre_arrivee">
                      </div>
                    </td>
                    <td style="padding-top: 3%;">
                     <div class="col">
                      <label for="">Date Aujourd'hui</label>
                     </div>
                    </td>
                    <td style="padding-top: 3%;">
                      <div class="col">
                      <input type="date" class="form-control" placeholder="" name="date_arrivee">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 5%;">
                     <div class="col marg">
                      <label for="">Date Courrier </label>
                     </div>
                    </td>
                    <td style="padding-top: 5%; margin-right: 10%;">
                      <div class="col ">
                        <input type="date" class="form-control inbt_dat" placeholder="" name="date_courrier_arriver">
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
                               <select id="inputState" class="form-select slect_des" name="id_dest">
                           <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {   
                               ?> 
                                 <option selected value="<?php echo $row['id_dest'];?>"><?php echo $row['destinataire']; ?></option>
                               <?php   
                              }
                          ?>
                          <option selected value="0">Expéditeur</option>
                        </select>
                        <button type="button" class="btn btn-outline-primary btn_select" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-plus"></i></button>
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
                               <select id="inputState" class="form-select typecour" name="id_type_courrier">
                           <?php 
                                while ($row = $stmt->fetch(PDO :: FETCH_ASSOC)) {   
                               ?> 
                                 <option selected value="<?php echo $row['id_type_courrier'];?>"><?php echo $row['type_courrier']; ?></option>
                               <?php   
                              }
                          ?>
                          <option selected value="0">type courrier</option>
                        </select>
                        <button type="button" class="btn btn-outline-primary btn_type" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"><i class="fas fa-plus"></i></button>
                     </div>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="4" style="padding-top: 5%;">
                     <div class="col">
                      <label for="inputAddress" class="form-label">Objet</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="objet_arriver"></textarea>
                     </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 5%;">
                     <div class="col marg">
                      <label for="">Date Obsérvation</label>
                     </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                         <input type="date" class="form-control" placeholder="" name="date_observation">
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                     <div class="col-12">
                       <input type="input" class="form-control" placeholder="classement arrivee" name="classement_arrivee">
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
                <tr>
                    <td colspan="4" style="padding-top: 5%;">
                      <div class="col">
                        <button type="button" class="btn btn-primary" onclick="location.href='regestre_arrive.php'">return</button>
                      </div>
                    </td>
                    <td style="padding-top: 5%;">
                      <div class="col">
                        <button type="submit" class="btn btn-primary" name="btn_save">Save </button>
                      </div>
                    </td>
                </tr>
            </table>
    </div>

    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <input type="input" class="form-control" placeholder="Expéditeur" name="destinataire">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn_save_dest">Save</button>
      </div>
    </div>
  </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajouter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <input type="input" class="form-control" placeholder="type courrier" name="type_courrier">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn_save_type">Save</button>
      </div>
    </div>
  </div>
</div>


  
</form>
        <!-- fin form ajouter regestre -->
      </footer>

      <!-- Button trigger modal -->


  <!-- page-content" -->
</div>

<?php include_once 'footer.php'; ?>

