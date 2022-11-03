<?php
require "../config/bd.php";
/* var_dump($_POST);
die;
 */
if (isset($_POST['submit'])){

    
    $prenom=$_POST["prenom"];
    $nom=$_POST["name"];
    $email=$_POST["email"];
    $roles=$_POST["role"];
    $mdp=$_POST["password1"];
    $photo=$_POST["photo"];

    /* $matricule=$requeste->generateMatricule(); */

    //insertion dans bd
    $insert = $bd -> query ("INSERT INTO users (nom, prenom, mail, roles, mdp) VALUES('$nom','$prenom','$email', '$roles', '$mdp')");

    


    
    
}
    
