<?php 
/* $servername = 'localhost'; $username = 'root'; $password = ''; 
try{ 
$dbco = new PDO("mysql:host=$servername;dbname=inscription", $username, $password); 
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$sql = "CREATE DATABASE gestion_ecole"; 
$dbco->exec($sql);  
  echo 'Connection réussie !';  } 
catch(PDOException $e){ echo "Erreur : " . $e->getMessage(); }  */


require "../model/models.php";
session_start();
/* var_dump($_POST); */
if (isset($_POST["submit"])){
    $requeste = new ModelUser();
    $email=$_POST["email"];
    $mot_de_passe=$_POST["mot_de_passe"];
    $user = $requeste->selectUser($email);
    if (!$user || !password_verify($mot_de_passe, $user['mot_de_passe'])){
        header('location: connexion.php?erreur=Email ou mot de passe incorrect');
        exit;
    }

    if ($user['roles'] === 'administrateur'){
        $_SESSION['roles'] = $user['roles'];
        header('location: ../views/admin.php');
        exit;
    }
    if ($user['roles'] === 'utilisateur'){
        $_SESSION['roles'] = $user['roles'];
        header('location: ../views/user.php');
        exit;
    }

}
