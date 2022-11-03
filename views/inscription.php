
<?php
/* insertion bd */
//require('../controllers/trtmtInscription.php');

/* $firtname = $name = $email = $role = $password1 = $password2 = $photo = "";
if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
$firstname = $POST["fisrtname"];
$name = $POST["name"];
$email = $POST["email"];
$role = $POST["role"];
$password1 = $POST["password1"];
$password2 = $POST["password2"];
$photo = $POST["photo"];
} */

?>
<!DOCTYPE html>
<html lang="fr">
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
    <div class="container">

    
    <!-- <header><img style=" width: 100% ; height:300px;"src="../models/images/sky4.jpg" alt="" /> -->
    <div class="divider"></div>
    <div class="heading">
        <h2> FORMULAIRE INSCRIPTION</h2>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2">
            <form id="inscription_post" method="POST" action="../controllers/trtmtInscription.php">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="prenom">Prenom<span class="red"> *</span> </label>
                        <input type="text" id="firstname" name="prenom" class="form-control" placeholder="votre prenom">
                        <p class="comments d-none" id="champ-reqFirstname">Champ requis</p>
    
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="name">Nom<span class="red"> *</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="votre nom">
                        <p class="comments d-none" id="champ-reqName">Champ requis</p>
                    
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="email">Email<span class="red"> *</span> </label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="votre email" >
                        <p class="comments d-none" id="champ-reqEmail">Champ requis</p>
                        <p class="comments d-none" id="email-invalid">Email invalide</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="role">Role<span class="red"> *</span> </label>
                        <select class="form-select" class="form-control" name="role" id="role" aria-label="Default select example" >
                            <option selected>sélectionner votre role</option>
                            <option value="1">administrateur</option>
                            <option value="2">utilisateur</option>
                        </select>
                        <p class="comments d-none" id="champ-reqRole">Champ requis</p>
                        
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="password1">Mot de passe<span class="red"> *</span></label>
                        <input type="password" class="form-control" name="password1" id="password1" placeholder="votre mot de passe" >
                        <p class="comments d-none" id="champ-reqPass1">Champ requis</p>
                    
                    </div>
                    <div class="col-md-6 mb-2">
                    <label for="inputPassword2">Confirmation du mot de passe<span class="red">*</span></label>
                        <input type="password" class="form-control" name="password2" id="password2" placeholder="confirmer votre mot de passe">
                        <p class="comments d-none" id="champ-reqPass2">Champ requis</p>
                        <p class="comments d-none" id="confPass">email non conforme</p>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="photo" class="form-label">Photo</label>
                        <input class="form-control" type="file" name="photo" id="formFile" >
                    
                    </div> 
                    <div class="col-md-6-offset-6">
                        <button class="btn btn-primary"  class="button1" name="submit" id="submit" type="submit" value="envoyer">S'inscrire</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
      
   
    

    </div>  
    <script src="./js/inscript.js"></script> 
</body>

</html>

<!-- <style>
    #img{
        width: 100%;
        height: 300px;
        padding: 670px 380px;
    }

    header{
        width: 100%;
        height: 300px
    }

    </style> -->