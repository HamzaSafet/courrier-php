<?php

class CourrierDB{
     
    private $db;

    public function __construct($conn)
    {
        $this->db=$conn;
    }
    
    public function CreateRgtr_arv($date_arrivee,$num_ordere_arv,$date_courrier_arriver,$num_lettre_arrivee
           ,$objet_arriver,$date_observation,$id_personne,$id_type_courrier,$id_dest,$classement_arrivee)
    {
        try {
        $reqt="INSERT INTO `regestre_arrivee`(`date_arrivee`, `num_ordere_arv`, `date_courrier_arriver`, `num_lettre_arrivee`, `objet_arriver`, `date_observation`, `id_personne`, `id_type_courrier`, `id_dest`,`classement_arrivee`) VALUES (:date_arrivee,:num_ordere_arv,:date_courrier_arriver,:num_lettre_arrivee,:objet_arriver,:date_observation,:id_personne,:id_type_courrier,:id_dest,:classement_arrivee)";

        $stmt = $this->db->prepare($reqt); 
        $stmt->bindparam(":date_arrivee",$date_arrivee);
        $stmt->bindparam(":num_ordere_arv",$num_ordere_arv);
        $stmt->bindparam(":date_courrier_arriver",$date_courrier_arriver);
        $stmt->bindparam(":num_lettre_arrivee",$num_lettre_arrivee);
        $stmt->bindparam(":objet_arriver",$objet_arriver);
        $stmt->bindparam(":date_observation",$date_observation);
        $stmt->bindparam(":id_personne",$id_personne);
        $stmt->bindparam(":id_type_courrier",$id_type_courrier);
        $stmt->bindparam(":id_dest",$id_dest);
        $stmt->bindparam(":classement_arrivee",$classement_arrivee);
        $stmt->execute();
        return true ;
        } catch (PDOException $e) {
         echo $e->getMessage();
          return false;
        }
    }
    
    public function getRgtr_arv($id_regestre_arv)
    {
        try {

            $reqt="SELECT * FROM `regestre_arrivee` WHERE id_regestre_arv=:id_regestre_arv";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->execute(array(":id_regestre_arv"=>$id_regestre_arv));
             $editRows=$stmt->fetch(PDO::FETCH_ASSOC);
             return $editRows ;

        } catch (PDOException $e) {
            $e->getMessage();
            return $e;
        }
        
    }


    public function ModiffierRgtr_arv($id_regestre_arv,$date_arrivee,$num_ordere_arv,$date_courrier_arriver,$num_lettre_arrivee,$id_dest,$objet_arriver,$date_observation,$id_type_courrier,$id_personne,$classement_arrivee)
    {
        try {

            $reqt="UPDATE `regestre_arrivee` SET `date_arrivee`=:date_arrivee,`num_ordere_arv`=:num_ordere_arv,`date_courrier_arriver`=:date_courrier_arriver,`num_lettre_arrivee`=:num_lettre_arrivee,`id_dest`=:id_dest,`objet_arriver`=:objet_arriver,`date_observation`=:date_observation,`id_type_courrier`=:id_type_courrier,`id_personne`=:id_personne,`classement_arrivee`=:classement_arrivee WHERE `id_regestre_arv`=:id_regestre_arv";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->bindparam(":date_arrivee",$date_arrivee);
             $stmt->bindparam(":num_ordere_arv",$num_ordere_arv);
             $stmt->bindparam(":date_courrier_arriver",$date_courrier_arriver);
             $stmt->bindparam(":num_lettre_arrivee",$num_lettre_arrivee);
             $stmt->bindparam(":id_dest",$id_dest);
             $stmt->bindparam(":objet_arriver",$objet_arriver);
             $stmt->bindparam(":date_observation",$date_observation);
             $stmt->bindparam(":id_type_courrier",$id_type_courrier);
             $stmt->bindparam(":id_personne",$id_personne);
             $stmt->bindparam(":id_regestre_arv",$id_regestre_arv);
             $stmt->bindparam(":classement_arrivee",$classement_arrivee);
             $stmt->execute();
             return true ;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
        
    }

    public function DeleteRgtr_arv($id_regestre_arv)
    {
        $reqt="DELETE FROM `regestre_arrivee` WHERE id_regestre_arv=:id_regestre_arv ";
        $stmt = $this->db->prepare("$reqt"); 
        $stmt->bindparam(":id_regestre_arv",$id_regestre_arv);
        $stmt->execute();
        return true ;

    }

    public function DataViewRgtr_arv()
    {
    
         $reqt="SELECT `id_regestre_arv`, `date_arrivee`, `num_ordere_arv`, `date_courrier_arriver`, `num_lettre_arrivee`, `designation_destinataire`, `objet_arriver`, `date_observation`, pr.nom_prenom, `type_arrivee` FROM regestre_arrivee ar INNER JOIN personne pr WHERE ar.`id_personne` = pr.`id_personne`";
         $stmt = $this->db->prepare("$reqt"); 
         $stmt->execute();
         $result=$stmt->fetchAll();
         $count=$stmt->rowCount();
         return array(
             "results"=>$result,
             "counts"=>$count
         );
             
    }

    public function DataViewRgtr_dp()
    {
    
         $reqt="SELECT `id_regestre_dpr`, `date_courrier_dpr`, `num_ordere_dpr`, `destinataire`, `objet_depart`, `signature`, `signer_par`, `type_courrier`, `adress`, pr.nom_prenom FROM regestre_depart ar INNER JOIN personne pr WHERE ar.`id_personne` = pr.`id_personne`";
         $stmt = $this->db->prepare("$reqt"); 
         $stmt->execute();
         $result=$stmt->fetchAll();
         $count=$stmt->rowCount();
         return array(
             "results"=>$result,
             "counts"=>$count
         );
             
    }

    public function addNumOr_Rgtr_arv()
    {
        try {

             $reqt="SELECT MAX(`num_ordere_arv`) as max_numOrd FROM `regestre_arrivee`";
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

    //personne

    public function CreatePersonne($nom_prenom,$fonction,$grade,$matrecule,$cin,$tel)
    {
        try {
        $reqt="INSERT INTO `personne`(`nom_prenom`, `fonction`, `grade`, `matrecule`, `cin`, `tel`) VALUES (:nom_prenom,:fonction,:grade,:matrecule,:cin,:tel)";

        $stmt = $this->db->prepare($reqt); 
        $stmt->bindparam(":nom_prenom",$nom_prenom);
        $stmt->bindparam(":fonction",$fonction);
        $stmt->bindparam(":grade",$grade);
        $stmt->bindparam(":matrecule",$matrecule);
        $stmt->bindparam(":cin",$cin);
        $stmt->bindparam(":tel",$tel);
        $stmt->execute();
        return true ;
        } catch (PDOException $e) {
         echo $e->getMessage();
          return false;
        }
    }


    public function DataView_persone()
    {
    
         $reqt="SELECT * FROM `personne` WHERE 1";
         $stmt = $this->db->prepare("$reqt"); 
         $stmt->execute();
         if ($stmt->rowCount()>0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
               ?>
               <tr>
                <td><?php echo $row['nom_prenom']; ?></td>
                <td><?php echo $row['fonction']; ?></td>
                <td><?php echo $row['grade']; ?></td>    
                <td><?php echo $row['matrecule']; ?></td>
                <td><?php echo $row['cin']; ?></td>
                <td><?php echo $row['tel']; ?></td>
                <td>
                  <a href="update_personne.php?edit_personne=<?php echo $row['id_personne'];?>">
                       <i class="far fa-edit fa-2x"></i></a>
                  <a href="personne.php?delete_personne=<?php echo $row['id_personne'];?>" onclick="return confirm('voulez vous vraiment supprimer cet personne?')">
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

    public function Delete_personne($id_personne)
    {
        $reqt="DELETE FROM `personne` WHERE id_personne=:id_personne ";
        $stmt = $this->db->prepare("$reqt"); 
        $stmt->bindparam(":id_personne",$id_personne);
        $stmt->execute();
        return true ;
    }

    public function getPersonne($id_personne)
    {
        try {

            $reqt="SELECT * FROM `personne` WHERE id_personne=:id_personne";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->execute(array(":id_personne"=>$id_personne));
             $editRows=$stmt->fetch(PDO::FETCH_ASSOC);
             return $editRows ;

        } catch (PDOException $e) {
            $e->getMessage();
            return $e;
        }
        
    }

    public function ModiffiePersonne($id_personne,$nom_prenom,$fonction,$grade,$tel,$matrecule,$cin)
    {
        try {

            $reqt="UPDATE `personne` SET `nom_prenom`=:nom_prenom,`fonction`=:fonction,`grade`=:grade,`tel`=:tel,`matrecule`=:matrecule,`cin`=:cin WHERE `id_personne`=:id_personne";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->bindparam(":nom_prenom",$nom_prenom);
             $stmt->bindparam(":fonction",$fonction);
             $stmt->bindparam(":grade",$grade);
             $stmt->bindparam(":tel",$tel);
             $stmt->bindparam(":matrecule",$matrecule);
             $stmt->bindparam(":cin",$cin);
             $stmt->bindparam(":id_personne",$id_personne);
             $stmt->execute();
             return true ;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
        
    }

    public function searchPersonne($searchVl)
    {
        try {
             
            $reqt="SELECT `id_personne`, `nom_prenom`, `fonction`, `grade`, `tel`, `matrecule`, `cin` FROM `personne` WHERE nom_prenom LIKE :nom_prenom OR fonction LIKE :fonction OR grade LIKE :grade OR tel LIKE :tel OR matrecule LIKE :matrecule OR cin LIKE :cin";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->bindValue(':nom_prenom','%' . $searchVl . '%');
             $stmt->bindValue(':fonction','%' . $searchVl . '%');
             $stmt->bindValue(':grade','%' . $searchVl . '%');
             $stmt->bindValue(':tel','%' . $searchVl . '%');
             $stmt->bindValue(':matrecule','%' . $searchVl . '%');
             $stmt->bindValue(':cin','%' . $searchVl . '%');
             $stmt->execute();
             if ($stmt->rowCount()>=0) {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                   ?>
                   <tr>
                    <td><?php echo $row['nom_prenom']; ?></td>
                    <td><?php echo $row['fonction']; ?></td>
                    <td><?php echo $row['grade']; ?></td>    
                    <td><?php echo $row['matrecule']; ?></td>
                    <td><?php echo $row['cin']; ?></td>
                    <td><?php echo $row['tel']; ?></td>
                    <td>
                      <a href="update_personne.php?edit_personne=<?php echo $row['id_personne'];?>">
                           <i class="far fa-edit fa-2x"></i></a>
                      <a href="personne.php?delete_personne=<?php echo $row['id_personne'];?>" onclick="return confirm('voulez vous vraiment supprimer cet personne?')">
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

        } catch (PDOException $e) {
            $e->getMessage();
            return $e;
        }
        
    }


    // order courrier

    public function CreateOrderCourrier($numero_courrier,$date_order,$classification_courrier,$id_personne,$courries)
    {
        try {
        $reqt="INSERT INTO `order_courrier`(`numero_courrier`, `date_order`, `classification_courrier`, `id_personne`, `courries`) VALUES (:numero_courrier,:date_order,:classification_courrier,:id_personne,:courries)";

        $stmt = $this->db->prepare($reqt); 
        $stmt->bindparam(":numero_courrier",$numero_courrier);
        $stmt->bindparam(":date_order",$date_order);
        $stmt->bindparam(":classification_courrier",$classification_courrier);
        $stmt->bindparam(":id_personne",$id_personne);
        $stmt->bindparam(":courries",$courries);

        $stmt->execute();
        return true ;
        } catch (PDOException $e) {
         echo $e->getMessage();
          return false;
        }
    }

    public function Delete_order_courrier($id_order)
    {
        $reqt="DELETE FROM `order_courrier` WHERE id_order=:id_order ";
        $stmt = $this->db->prepare("$reqt"); 
        $stmt->bindparam(":id_order",$id_order);
        $stmt->execute();
        return true ;
    }

    public function ModiffieOrder($id_personne,$classification_courrier,$date_order,$id_order)
    {
        try {

            $reqt="UPDATE `order_courrier` SET `id_personne`=:id_personne,`classification_courrier`=:classification_courrier,`date_order`=:date_order WHERE id_order=:id_order";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->bindparam(":classification_courrier",$classification_courrier);
             $stmt->bindparam(":date_order",$date_order);
             $stmt->bindparam(":id_personne",$id_personne);
             $stmt->bindparam(":id_order",$id_order);
             $stmt->execute();
             return true ;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
        
    }

    public function getOrder($id_order)
    {
        try {

            $reqt="SELECT * FROM `order_courrier` WHERE id_order=:id_order";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->execute(array(":id_order"=>$id_order));
             $editRows=$stmt->fetch(PDO::FETCH_ASSOC);
             return $editRows ;

        } catch (PDOException $e) {
            $e->getMessage();
            return $e;
        }
        
    }



    //user

    public function CreateUser($users,$logine,$pass)
    {
        try {
        $reqt="INSERT INTO `utilisateur`(`users`,`logine`, `pass` ) VALUES (:users,:logine,:pass)";
        $stmt = $this->db->prepare($reqt); 
        $stmt->bindparam(":users",$users);
        $stmt->bindparam(":logine",$logine);
        $stmt->bindparam(":pass",$pass);
        $stmt->execute();
        return true ;
        } catch (PDOException $e) {
         echo $e->getMessage();
          return false;
        }
    }

    public function DeleteUser($id_utilisateur)
    {
        $reqt="DELETE FROM `utilisateur` WHERE id_utilisateur=:id_utilisateur ";
        $stmt = $this->db->prepare("$reqt"); 
        $stmt->bindparam(":id_utilisateur",$id_utilisateur);
        $stmt->execute();
        return true ;
    }


    public function DataView_User()
    {
    
         $reqt="SELECT * FROM `utilisateur` WHERE 1";
         $stmt = $this->db->prepare("$reqt"); 
         $stmt->execute();
         if ($stmt->rowCount()>0) {
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
               ?>
               <tr>
                <td><?php echo $row['users']; ?></td>
                <td><?php echo $row['logine']; ?></td>
                <td><?php echo $row['pass']; ?></td>    
                <td>
                  <a href="user.php?delete_user=<?php echo $row['id_utilisateur'];?>" onclick="return confirm('voulez vous vraiment supprimer cet utilisateur ?')">
                  <span style="color: Tomato;">
                    <i class="fas fa-trash-alt fa-2x"></i></a>
                   </span>
                  
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


    public function searchUser($searchVl)
    {
        try {
             
            $reqt="SELECT * FROM `utilisateur` WHERE users LIKE :users OR logine LIKE :logine OR pass LIKE :pass";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->bindValue(':users','%' . $searchVl . '%');
             $stmt->bindValue(':logine','%' . $searchVl . '%');
             $stmt->bindValue(':pass','%' . $searchVl . '%');
             $stmt->execute();
             if ($stmt->rowCount()>=0) {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                   ?>
                   <tr>
                    <td><?php echo $row['users']; ?></td>
                    <td><?php echo $row['logine']; ?></td>
                    <td><?php echo $row['pass']; ?></td>    
                    <td>
                      <a href="user.php?delete_user=<?php echo $row['id_utilisateur'];?>" onclick="return confirm('voulez vous vraiment supprimer cet personne?')">
                      <span style="color: Tomato;">
                         <i class="fas fa-trash-alt fa-2x"></i></a>
                       </span>
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

        } catch (PDOException $e) {
            $e->getMessage();
            return $e;
        }
        
    }

    // désténataire

    public function CreateDest($destinataire)
    {
        try {
        $reqt="INSERT INTO `destinataires`(`destinataire`) VALUES (:destinataire)";

        $stmt = $this->db->prepare($reqt); 
        $stmt->bindparam(":destinataire",$destinataire);
        $stmt->execute();
        return true ;
        } catch (PDOException $e) {
         echo $e->getMessage();
          return false;
        }
    }

    // public function ModiffierRgtr_arv($id_dest,$destinataire)
    // {
    //     try {

    //         $reqt="UPDATE `destinataires` SET `destinataire`=:destinataire WHERE `id_dest`=:id_dest";

    //          $stmt = $this->db->prepare("$reqt"); 
    //          $stmt->bindparam(":destinataire",$destinataire);
    //          $stmt->bindparam(":id_dest",$id_dest);
    //          $stmt->execute();
    //          return true ;
    //     } catch (PDOException $e) {
    //         $e->getMessage();
    //         return false;
    //     }
        
    // }

    //type courrier
    public function CreateType($type_courrier)
    {
        try {
        $reqt="INSERT INTO `type_courriers`(`type_courrier`) VALUES (:type_courrier)";

        $stmt = $this->db->prepare($reqt); 
        $stmt->bindparam(":type_courrier",$type_courrier);
        $stmt->execute();
        return true ;
        } catch (PDOException $e) {
         echo $e->getMessage();
          return false;
        }
    }

    //permission
    
    public function CreatePermissions($date_debu,$date_fin,$motif,$adresse,$id_personne)
    {
        try {
        $reqt="INSERT INTO `permissions`(`date_debu`, `date_fin`, `motif`, `adresse`, `id_personne`) VALUES (:date_debu,:date_fin,:motif,:adresse,:id_personne)";

        $stmt = $this->db->prepare($reqt); 
        $stmt->bindparam(":date_debu",$date_debu);
        $stmt->bindparam(":date_fin",$date_fin);
        $stmt->bindparam(":motif",$motif);
        $stmt->bindparam(":adresse",$adresse);
        $stmt->bindparam(":id_personne",$id_personne);
        $stmt->execute();
        return true ;
        } catch (PDOException $e) {
         echo $e->getMessage();
          return false;
        }
    }
    

    public function ModiffiePermissions($id_permission,$date_debu,$date_fin,$motif,$adresse,$id_personne)
    {
        try {

            $reqt="UPDATE `permissions` SET `date_debu`=:date_debu,`date_fin`=:date_fin,`motif`=:motif,`adresse`=:adresse,`id_personne`=:id_personne WHERE `id_permission`=:id_permission";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->bindparam(":date_debu",$date_debu);
             $stmt->bindparam(":date_fin",$date_fin);
             $stmt->bindparam(":motif",$motif);
             $stmt->bindparam(":adresse",$adresse);
             $stmt->bindparam(":id_personne",$id_personne);
             $stmt->bindparam(":id_permission",$id_permission);
             $stmt->execute();
             return true ;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    public function DeletePermissions($id_permission)
    {
        $reqt="DELETE FROM `permissions` WHERE id_permission=:id_permission ";
        $stmt = $this->db->prepare("$reqt"); 
        $stmt->bindparam(":id_permission",$id_permission);
        $stmt->execute();
        return true ;

    }

    public function getPermission($id_permission)
    {
        try {

            $reqt="SELECT * FROM `permissions` WHERE id_permission=:id_permission";

             $stmt = $this->db->prepare("$reqt"); 
             $stmt->execute(array(":id_permission"=>$id_permission));
             $editRows=$stmt->fetch(PDO::FETCH_ASSOC);
             return $editRows ;

        } catch (PDOException $e) {
            $e->getMessage();
            return $e;
        }
        
    }


}

?>