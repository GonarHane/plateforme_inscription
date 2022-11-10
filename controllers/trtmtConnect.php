<?php
/* var_dump("entré");
exit; */
session_start();
require "../models/models.php";
 
 /* var_dump($_POST); */
if (isset($_POST["submit"])){
    $requeste = new ModelUser();
    $email=$_POST["email"];
    $mot_de_passe=$_POST["password"];
    $user = $requeste->selectUser($email);
    
    if (count($user) === 0 || !password_verify($mot_de_passe, $user['mdp'])){
        header('location: ../views/connexion.php?erreur=Email ou mot de passe incorrect');
        exit;
    }
    /* var_dump($_POST); */
    // pour la recupération au niveau de la bd(admin)
    
    else if ($user['roles'] === 'administrateur'){
        $_SESSION['roles'] = $user['roles'];
        $_SESSION['matricule'] = $user['matricule'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['photo'] = $user['photo'];
        $_SESSION['mail'] = $user['mail'];
        header('location: ../views/admin.php');
        exit;
    }
    
    if ($user['roles'] === 'utilisateur')
    {
        $_SESSION['roles'] = $user['roles'];
        $_SESSION['roles'] = $user['roles'];
        $_SESSION['matricule'] = $user['matricule'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['photo'] = $user['photo'];
        $_SESSION['mail'] = $user['mail'];
        header('location: ../views/user.php');
        exit;
    } 

     

}

