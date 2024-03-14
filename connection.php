<?php 

try{
    
    $user="root";
    $pass="";
    
    $conx=new PDO('mysql:host=localhost;dbname=gc',$user,$pass);

}
catch(PDOException $e){
    echo "ERROR".$e->getMessage()."<br>";
    die();
    
}


include_once 'courrier_classe.php';
include_once 'courrier_classe_dp.php';
$courrier = new CourrierDB($conx);
$courrierdp = new CourrierDPR($conx);

          


?>