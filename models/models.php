<?php
class ModelUser
{
    var $db;
    public function __construct()
    {
        try {

            $this->db = new PDO('mysql:host=localhost;dbname=inscription;', 'root', '');
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
    
        return 'US'.$randomString;
    }
    public function ajoutUser($nom,$prenom,$mot_de_passe,$role,$matricule,$email, $photo,$date_heure){
           
        try {
            $sql=$this->db->prepare('INSERT INTO `user` (`nom`, `prenom`,`mdp`,`roles`,`matricule`,`etat`,`mail`, `photo`,`date_ajout`)
                                        VALUES (:nom,:prenom,:mot_de_passe,:roles,:matricule,:etat,:email, :photo,:date_heure)');
           
                    $sql->execute(array(
                        'matricule' => $matricule,
                        'nom' =>$nom,
                        'prenom' => $prenom,
                        'mail'=>$email,                       
                        'roles' => $role,
                        'mdp' => $mot_de_passe,
                        'etat' => 1,
                        'date_ajout'=> $date_heure,
                        'photo' => $photo
                    
                    ));  
                
    
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getUser($email)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE mail='$email'and etat='1'";
            $res = $this->db->query($sql);
            if ($res->rowCount() > 0){
                return true;
            }
            return false;
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    // 
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
    /* public fonction disconnectUser($email)
    {
        try{
            $sql
        }
    } */
    public function updateUser($email,$prenom,$nom, $ancienEmail)
    {
        try {
            $sql = "SELECT * FROM `users` WHERE mail='$email'";
            $res = $this->db->query($sql);
    
            if ($res->rowCount() > 0){
                $res = $res->fetch();
                if ($res['mail'] !== $ancienEmail) {
                    header("location: modification.php");
                    exit;
                }
            }
            $sql2 =  "UPDATE users SET mail='$email', prenom='$prenom', nom='$nom' WHERE mail='$ancienEmail'";
            $this->db->exec($sql2);
            header("location: admin.php");
            exit;
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function archiveUser($email)
    {
        try {

                $sql =  "UPDATE users SET etat=0 WHERE mail='$email'";
                $this->db->exec($sql);
                header("location: admin.php");
                exit;
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function desarchiveUser($email)
    {
        try {

                $sql =  "UPDATE users SET etat=1 WHERE mail='$email'";
                $this->db->exec($sql);
                header("location: admin.php");
                exit;
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function switchRole($email)
    {
        try {
            $user  = $this->selectUser($email);
            
            $sql = $user['roles'] == 'administrateur' ?  "UPDATE users SET roles='utilisateur' WHERE mail='$email'": "UPDATE users SET roles='administrateur' WHERE mail='$email'";
            $this->db->exec($sql);
            header("location: admin.php");
            exit;
        
    } catch (\Throwable $th) {
        //throw $th;
    }
    }
    public function searchUser($email)
    {
        try {
            $user  = $this->serchUser($email);
            
            $sql = $user['mail'];
            $this->db->exec($sql);
            header("location: admin.php");
            exit;
        
    } catch (\Throwable $th) {
        //throw $th;
    }
    }
}
