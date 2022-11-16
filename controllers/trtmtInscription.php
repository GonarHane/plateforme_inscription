<?php

include("../config/bd.php") ;

include("../models/models.php") ;
if (isset($_POST['submit'])){
   

    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password1']) ) {
        echo"case manquant";

        # code...
        header('location:../views/inscription.php');
        exit;


    }else {


      


        $prenom=$_POST["prenom"];
        $nom=$_POST["name"];
        $email=$_POST["email"];
        $roles=$_POST["role"];
        $mdp=md5($_POST["password1"]);
        $photo = null;
        if($_FILES["photo"]["size"] !== 0) {
            $photo= file_get_contents($_FILES["photo"]["tmp_name"]);
        }

        /* $matricule=$requeste->generateMatricule(); */
        $requeste = new ModelUser();
        $userExists = $requeste->getUser($email);
        if ($userExists) {
            header('location:../views/inscription.php');
            echo"mail exist";
            exit;
        }
        $mat = $requeste->generateMatricule();
        $date_heure = date('y-m-d h:i:s');
        $requeste->ajoutUser($nom,$prenom,$mdp,$roles,$mat,$email, $photo,$date_heure); 
        //insertion dans bd
        //$insert = $bd -> query ("INSERT INTO users (matricule, nom, prenom, mail, roles, mdp) VALUES('$mat','$nom','$prenom','$email', '$roles', '$mdp')");
       
        header('location:../views/connexion.php');
        exit;
    }

    

    
    
}