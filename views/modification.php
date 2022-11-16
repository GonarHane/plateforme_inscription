<?php
     session_start();
 include_once "../models/models.php";
 $requeste = new ModelUser();
/*  tester si la variable submit existe */
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $user = $requeste->selectUser($email);
}
  if(isset($_POST["submit"]))
  {
    $message = "";
    if(empty($_POST["email"]) || empty($_POST["prenom"]) || empty($_POST["nom"])) {
        header("location: modification.php?erreur=Veuillez remplir tous les champs");
        exit;
    }
      if(isset($_POST["email"]) && isset($_POST["prenom"]) && isset($_POST["nom"]))
      {
         
         $email = $_POST["email"];
         $prenom = $_POST["prenom"];
         $nom = $_POST["nom"];
         $mail = $_GET['email'];
      
         $requeste->updateUser($email, $prenom, $nom, $mail);
    }
    }
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
            <form id="connection" method="post" action="" role="form">
            <div class="heading">

            <h2> modification</h2>
            <div>
                <span class="text-danger"><?= $_GET['erreur'] ?? null?></span>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row">
        <div class="col-md-6 mb-2">
                        <label for="prenom">Prenom<span class="red"> *</span> </label>
                        <input type="text" value="<?=$user['prenom']?>" id="firstname" name="prenom" class="form-control" placeholder="votre prenom">
                        <p class="comments d-none" id="champ-reqFirstname">Champ requis</p>
    
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="name">Nom<span class="red"> *</span></label>
                        <input type="text" value="<?=$user['nom']?>" id="name" name="nom" class="form-control" placeholder="votre nom">
                        <p class="comments d-none" id="champ-reqName">Champ requis</p>
                    
                </div> 
                    <div class="col-md-6 mb-2">
                        <label for="email">Email<span class="red"> *</span> </label>
                        <input type="text" value="<?=$user['mail']?>" id="email" name="email" class="form-control" placeholder="votre email" >
                        <p class="comments d-none" id="champ-reqEmail">Champ requis</p>
                        <p class="comments d-none" id="email-invalid">Email invalide</p>
                    </div>
                    <div class="col-md-6-offset-6">
                        <button class="btn btn-primary"  class="button1" name="submit" id="submit" type="submit" value="envoyer">modifier les infos</button>
                    </div>
                    </div>
                

            </form>
            </div>
    
      
   
    

    </div>  
    </div>
     

<script src="./js/modif.js"></script> 
</body>

</html>