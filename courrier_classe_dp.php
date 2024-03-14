<?php 

class CourrierDPR{

    private $db;

    public function __construct($conx)
    {
        $this->db=$conx;
    }

    public function CreateRgtr_dpr($date_courrier_dpr,$num_ordere_dpr,$id_dest,$objet_depart,
         $signature,$signer_par,$id_type_courrier,$adress,$id_personne,$classement_depart)
    {
        try {
        $reqt="INSERT INTO `regestre_depart`(`date_courrier_dpr`, `num_ordere_dpr`, `id_dest`, `objet_depart`, `signature`, `signer_par`, `id_type_courrier`, `adress`, `id_personne`,`classement_depart`) VALUES (:date_courrier_dpr,:num_ordere_dpr,:id_dest,:objet_depart,:signature,:signer_par,:id_type_courrier,:adress,:id_personne,:classement_depart)";

        $stmt = $this->db->prepare($reqt); 
        $stmt->bindparam(":date_courrier_dpr",$date_courrier_dpr);
        $stmt->bindparam(":num_ordere_dpr",$num_ordere_dpr);
        $stmt->bindparam(":id_dest",$id_dest);
        $stmt->bindparam(":objet_depart",$objet_depart);
        $stmt->bindparam(":signature",$signature);
        $stmt->bindparam(":signer_par",$signer_par);
        $stmt->bindparam(":id_type_courrier",$id_type_courrier);
        $stmt->bindparam(":adress",$adress);
        $stmt->bindparam(":id_personne",$id_personne);
        $stmt->bindparam(":classement_depart",$classement_depart);
        $stmt->execute();
        return true ;
        } catch (PDOException $e) {
         echo $e->getMessage();
          return false;
        }
    }

    // public function CreateRgtr_dpr($date_courrier_dpr,$num_ordere_dpr,$id_dest,$objet_depart,
    //      $signature,$signer_par,$id_type_courrier,$adress,$id_personne)
    // {
    //     try {
    //     $reqt="INSERT INTO `regestre_depart`(`date_courrier_dpr`, `num_ordere_dpr`, `id_dest`, `objet_depart`, `signature`, `signer_par`, `id_type_courrier`, `adress`, `id_personne`) VALUES (:date_courrier_dpr,:num_ordere_dpr,:id_dest,:objet_depart,:signature,:signer_par,:id_type_courrier,:adress,:id_personne)";

    //     $stmt = $this->db->prepare($reqt); 
    //     $stmt->bindparam(":date_courrier_dpr",$date_courrier_dpr);
    //     $stmt->bindparam(":num_ordere_dpr",$num_ordere_dpr);
    //     $stmt->bindparam(":id_dest",$id_dest);
    //     $stmt->bindparam(":objet_depart",$objet_depart);
    //     $stmt->bindparam(":signature",$signature);
    //     $stmt->bindparam(":signer_par",$signer_par);
    //     $stmt->bindparam(":id_type_courrier",$id_type_courrier);
    //     $stmt->bindparam(":adress",$adress);
    //     $stmt->bindparam(":id_personne",$id_personne);
    //     $stmt->execute();
    //     return true ;
    //     } catch (PDOException $e) {
    //      echo $e->getMessage();
    //       return false;
    //     }
    // }

    public function getRgtr_dpr($id_regestre_dpr)
    {
        try {

            $reqt="SELECT * FROM `regestre_depart` WHERE `id_regestre_dpr`=:id_regestre_dpr";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->execute(array(":id_regestre_dpr"=>$id_regestre_dpr));
             $editRows=$stmt->fetch(PDO::FETCH_ASSOC);
             return $editRows ;

        } catch (PDOException $e) {
            $e->getMessage();
            return $e;
        }       
    }

    public function ModiffierRgtr_dpr($id_regestre_dpr,$date_courrier_dpr,$num_ordere_dpr,$id_dest,$objet_depart,$signatur,$signier_par,$id_type_courrier,$adress,$id_personne,$classement_depart)
    {
        try {

             $reqt="UPDATE `regestre_depart` SET `id_regestre_dpr`=:id_regestre_dpr,`date_courrier_dpr`=:date_courrier_dpr,`num_ordere_dpr`=:num_ordere_dpr,`id_dest`=:id_dest,`objet_depart`=:objet_depart,`signature`=:signatur,`signer_par`=:signer_par,`id_type_courrier`=:id_type_courrier,`adress`=:adress,`id_personne`=:id_personne,`classement_depart`=:classement_depart WHERE `id_regestre_dpr`=:id_regestre_dpr";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->bindparam(":id_regestre_dpr",$id_regestre_dpr);
             $stmt->bindparam(":date_courrier_dpr",$date_courrier_dpr);
             $stmt->bindparam(":num_ordere_dpr",$num_ordere_dpr);
             $stmt->bindparam(":id_dest",$id_dest);
             $stmt->bindparam(":objet_depart",$objet_depart);
             $stmt->bindparam(":signatur",$signatur);
             $stmt->bindparam(":signer_par",$signier_par);
             $stmt->bindparam(":id_type_courrier",$id_type_courrier);
             $stmt->bindparam(":adress",$adress);
             $stmt->bindparam(":id_personne",$id_personne);
             $stmt->bindparam(":classement_depart",$classement_depart);
             $stmt->execute();
             return true ;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }   
    }


    // public function ModiffierRgtr_dpr($id_regestre_dpr,$date_courrier_dpr,$num_ordere_dpr,$id_dest,$objet_depart,$signatur,$signier_par,$id_type_courrier,$adress,$id_personne)
    // {
    //     try {

    //          $reqt="UPDATE `regestre_depart` SET `id_regestre_dpr`=:id_regestre_dpr,`date_courrier_dpr`=:date_courrier_dpr,`num_ordere_dpr`=:num_ordere_dpr,`id_dest`=:id_dest,`objet_depart`=:objet_depart,`signature`=:signatur,`signer_par`=:signer_par,`id_type_courrier`=:id_type_courrier,`adress`=:adress,`id_personne`=:id_personne WHERE `id_regestre_dpr`=:id_regestre_dpr";

    //          $stmt = $this->db->prepare("$reqt"); 
    //          $stmt->bindparam(":id_regestre_dpr",$id_regestre_dpr);
    //          $stmt->bindparam(":date_courrier_dpr",$date_courrier_dpr);
    //          $stmt->bindparam(":num_ordere_dpr",$num_ordere_dpr);
    //          $stmt->bindparam(":id_dest",$id_dest);
    //          $stmt->bindparam(":objet_depart",$objet_depart);
    //          $stmt->bindparam(":signatur",$signatur);
    //          $stmt->bindparam(":signer_par",$signier_par);
    //          $stmt->bindparam(":id_type_courrier",$id_type_courrier);
    //          $stmt->bindparam(":adress",$adress);
    //          $stmt->bindparam(":id_personne",$id_personne);
    //          $stmt->execute();
    //          return true ;
    //     } catch (PDOException $e) {
    //         $e->getMessage();
    //         return false;
    //     }   
    // }

    public function DeleteRgtr_dpr($id_regestre_dpr)
    {
        $reqt="DELETE FROM `regestre_depart` WHERE id_regestre_dpr=:id_regestre_dpr ";
        $stmt = $this->db->prepare("$reqt"); 
        $stmt->bindparam(":id_regestre_dpr",$id_regestre_dpr);
        $stmt->execute();
        return true ;

    }

    public function DataViewRgtr_dpr()
    {
    
         $reqt="SELECT * FROM `regestre_depart` WHERE 1";
         $stmt = $this->db->prepare("$reqt"); 
         $stmt->execute();
         if ($stmt->rowCount()>0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
               ?>
               <tr>
                <td><?php echo $row['date_courrier_dpr']; ?></td>
                <td><?php echo $row['num_ordere_dpr']; ?></td>
                <td><?php echo $row['destinataire']; ?></td>
                <td><?php echo $row['objet_depart']; ?></td>
                <td><?php echo $row['signature']; ?></td>
                <td><?php echo $row['signer_par']; ?></td>
                <td><?php echo $row['type_courrier']; ?></td>
                <td><?php echo $row['adress']; ?></td>
                <td><?php echo $row['id_personne']; ?></td>
                <td>
                  <a href="update_rgt_arv.php?edit_rgt_arv=<?php echo $row['id_regestre_arv'];?>">
                       <i class="far fa-edit fa-2x"></i></a>
                  <a href="regestre_arrive.php?delete_rgt_arv=<?php echo $row['id_regestre_arv'];?>"  onclick="return confirm('Are you sure?')">
                     <i class="fas fa-trash-alt fa-2x"></i></a>
                </td>
               </tr>
               <?php
            }
         }else{
             ?>
               <td>No Results :( </td>
               </tr>
             <?php
         }
              
    }

    public function addNumOr_Rgtr_dpr()
    {
        try {

             $reqt="SELECT MAX(`num_ordere_dpr`) as max_numOrd FROM `regestre_depart`";
             $stmt = $this->db->prepare("$reqt"); 
             $stmt->execute();
             $invNum = $stmt -> fetch(PDO::FETCH_ASSOC);
             $max_numOrd = $invNum['max_numOrd'];
             return $max_numOrd  ;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
        
    }

}

?>