<?php
require "../config/bd.php";
require "../models/models.php";
/* var_dump($_POST);
die;
 */
if (isset($_POST['submit'])){

    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password1']) ) {


        # code...
        header('location: ../views/inscription.php');
        exit;


    }else {





        $prenom=$_POST["prenom"];
        $nom=$_POST["name"];
        $email=$_POST["email"];
        $roles=$_POST["role"];
        $mdp=$_POST["password1"];
        $photo=$_POST["photo"];

        /* $matricule=$requeste->generateMatricule(); */
        $requeste = new ModelUser();
        $userExists = $requeste->getUser($email);
        if ($userExists) {
            header('location: ../views/inscription.php');
            exit;
        }
        $mat = $requeste->generateMatricule();
        $pass = password_hash($mdp, PASSWORD_DEFAULT);
        //insertion dans bd
        $insert = $bd -> query ("INSERT INTO users (matricule, nom, prenom, mail, roles, mdp) VALUES('$mat','$nom','$prenom','$email', '$roles', '$pass')");
        header('location: ../views/connexion.php');
        exit;
    }

    


    
    
}
    
