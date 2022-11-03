<?php
class ModelUser
{
    var $db;
    public function __construct()
    {
        try {

            $this->db = new PDO('mysql:host=127.0.0.1;dbname=inscription;', 'root', '');
        } catch (Exception $e) {
            die("Connection erreur du à " . $e->getMessage());
        }
    }

    function redirectUrl($url)
    {
        echo '<script language="javascript">window.location.href ="' . $url . '"</script>';
    }
    function generateMatricule($n=3) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randomString = '';
    
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
    
        return 'MAE'.$randomString;
    }
    public function ajoutUser($nom,$prenom,$password,$role,$matricule,$email){
           
        try {
            $sql=$this->db->prepare('INSERT INTO `users` (`nom`, `matricule`,`nom`,`prenom`,`mail`,`roles`,`mdp`,`etat`)
                                        VALUES (:nom,:prenom,:passwords,:roles,:matricule,:etat,:email)');
           
                    $sql->execute(array(
                        'matricule' => $matricule,
                        'nom' =>$nom,
                        'prenom' => $prenom,
                        'mail'=>$email,
                        'roles' => $role,
                        'mdp' => $password,
                        'etat' => 1
                        
                    
                    ));  
                
    
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getUser($email)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE mail='$email'";
            $res = $this->db->query($sql);
            if ($res->rowCount() > 0){
                return true;
            }
            return false;
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function selectUser($email)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE mail='$email'";
            $res = $this->db->query($sql);
            if ($res->rowCount() > 0){
                return $res->fetchAll()[0];
            }
            return null;
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}