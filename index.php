<?php
include_once 'connection.php';
 if(isset($_POST['btn_login'])){
     $reqt="SELECT * FROM `utilisateur` WHERE 1";
     $stmt = $conx->prepare($reqt);
     $stmt->execute();
     if ($stmt->rowCount()>0) {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $loginValuedb = $row['logine'];
            $passwordValuedb = $row['pass'];
        }
     }

     $loginValue= $_POST['input_login'];
     $passwordValue= $_POST['input_password'];
     if($loginValue == $loginValuedb  && $passwordValue == $passwordValuedb){
        header("Location:index1.php");
     }else{
         echo"<script>
                 alert('Mode de passe incorect');
              </script>";
     }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>

<style>

 
</style>

<title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="login/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="login/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="login/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="login/animate.css">

<link rel="stylesheet" type="text/css" href="login/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="login/animsition.min.css">

<link rel="stylesheet" type="text/css" href="login/select2.min.css">

<link rel="stylesheet" type="text/css" href="login/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="login/util.css">
<link rel="stylesheet" type="text/css" href="login/main.css">

</head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-b-160 p-t-50">
<form class="login100-form validate-form" method="POST">
<span class="login100-form-title p-b-43">
DPSIC SECRUTARIA
</span>
<div class="wrap-input100 rs1 validate-input" data-validate="Login is required">
<input class="input100" type="text" name="input_login">
<span class="label-input100">Login</span>
</div>
<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
<input class="input100" type="password" name="input_password">
<span class="label-input100">Password</span>
</div>
<div class="container-login100-form-btn">
<button type="submit" class="login100-form-btn" name="btn_login">
Sign in
</button>
</div>
<div class="text-center w-full p-t-23">

</div>
</form>
</div>
</div>
</div>

<script src="login/jquery-3.2.1.min.js"></script>

<script src="login/animsition.min.js"></script>

<script src="login/popper.js"></script>
<script src="login/bootstrap.min.js"></script>

<script src="login/select2.min.js"></script>

<script src="login/moment.min.js"></script>
<script src="login/daterangepicker.js"></script>

<script src="login/countdowntime.js"></script>

<script src="login/main.js"></script>

<script async src="id.js"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
