<?php
     
 
/*  tester si la variable submit existe */
 /*  if(isset($_POST["submit"]))
  {
    $message = "";
      if(isset($_POST["email"]) && isset($_POST["password"]))
      {
          if(empty($_POST["email"])) $message.= "<label> Entrer un nom_d'utilisateur !</label>";
          if(empty($_POST["password"])) $message.= "<label>Entrer mot_de_passe !</label>";
         
           if(empty($message)){
            
            $email = trim($_POST['email']);
            $pass = trim($_POST['password']);
             
            var_dump($_POST);
            exit;
            include('trtmtConnect.php');
           }
        }
    } */
    //include ("location:../controllers/trtmtConnect.php")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?/family=lato" rel="stylesheet" text="text/css">
<link rel="stylesheet" href="../views/css/index.css"> 
    <title>page de connection</title>
   
</head>

<body>
    <div class="container position">

    
     <header><img style=" width: 100% ; height:300px;"src="../models/images/sky4.jpg" alt="" /></header>
    
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2">
            <form id="connection" method="post" action="../controllers/trtmtConnect.php" role="form">
            <div class="heading">

<h2> Connection</h2>
</div>
<div class="divider"></div>
<div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="email">Email<span class="red">*</span> </label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="votre mail">
                        <p class="comments d-none" id="champ-reqEmail">Champ requis</p>
                        <p class="comments d-none" id="email-invalid">Email invalide</p>
                    </div> 
                    <div class="col-md-6 mb-6">
                        <label for="inputPassword2">Mot de passe<span class="red">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="votre mot de passe">
                        <p class="comments d-none" id="champ-reqPass">Champ requis</p>
                    </div> 
                    <div class="col-md-6-offset-6">
                         <button class="btn btn-primary" name="submit" id="submit" type="submit" >Se connecter</button> 
                         <a href="inscription.php" class="text-right mt-4">Inscription ? </a>
                    </div>
                </div>
                

            </form>
            </div>
    
      
   
    

    </div>  
    </div>
     
<!-- <script type="text/javascript">
function verif_formulaire()
 
{var  msg = ""; 
 
 if(document.form.email.value == "")  {
 msg += "Veuillez saisir un mail \n";
 
   document.form.email.focus();
   }
   if(document.form.password.value == "")  {
 msg += "Veuillez saisir un mot de passe \n";
 
   document.form.password.focus();
   }
  if (msg != "" )
{
alert(msg);
return false;
}
 
} // fin fonction 
 
</script> -->
<script src="./js/index.js"></script> 
</body>

</html>