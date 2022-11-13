<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="accueil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap/dist/js/bootstrap.js">
    <link rel="stylesheet" href="/bootstrap/scss/bootstrap.scss">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bd-secondary">
    <div class="container ">
        <div class="container admin col-lg-12 mt-4">
            <div class="row text-white btn-lg text-center mt-2" style="background-color:blue;">
            <span class="col-1 ">
                        <img src="data:image/jpg;base64,<?= base64_encode($_SESSION['photo']) ?>" class="rounded-circle" height="60" width="60" alt="">
                        <em><?= $_SESSION['matricule'] ?? null ?></em>
                    </span>

                    <span class="d-flex  mt-4  w-50" style="max-height: 2rem;">
                        <?= $_SESSION['prenom'] ?? null ?>
                        <?= $_SESSION['nom'] ?? null ?><br>
                        <?= $_SESSION['mail'] ?? null ?>
                        
                        <span style="margin-left: auto">
                           
                        
                        </span>
                    </span>
            <span class="d-flex">
                <ul>
                    <li><a href="../views/deconnexion.php" class="mt-1"><i class="bi bi-box-arrow-right text-white "></i></a></li>
                </ul>
                <div class="ml-auto  mt-3 " style="margin-left:auto;max-height: 2.5rem;">
               
                  <form action="" method="post" style="display: flex;gap:15px;">   
                    <input type="text" name="classe" placeholder="" class="form-control md-1" id="rech">   
                  <input type="submit" name="verif" value="RECHERCHER" class="btn btn-info" id="search">    </form>
                    </div>
                </span>
            </div>
            <h1 class="d-flex justify-content-center">Espace utilisateurs</h1>
            <div class="row mt-5">
                <table class="table table-striped table-bordered">
                    <thead class="text-white btn-lg text-center" style="background-color:orange">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Matricule</th>
                            <th scope="col">Role</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                  /* pour archiver  */
                  $email = $_SESSION['mail'];
                  $db = new PDO('mysql:host=localhost;dbname=inscription;', 'root', '');
                  $sql = $db->query("SELECT * FROM users WHERE mail != '$email' AND etat=1");
                  
                  if (isset($_POST["verif"])) {
                    if (isset($_POST["classe"])) {
                      $classe = $_POST["classe"];
                      if (!empty($classe)) {
                        $sl = $db->query("SELECT * FROM users WHERE mail != '$email' AND etat=1 AND Nom LIKE '%$classe%' OR Prenom LIKE '%$classe%'");
                         
                        while($a = $sl->fetch()){
                            
                                echo ' <tr  scope="row">';
                                    echo '<td>'.$a['nom'].'</td>';
                                    echo '<td>'.$a['prenom'].'</td>';
                                    echo '<td>'.$a['mail'].'</td>';
                                    echo '<td>'.$a['matricule'].'</td>';
                                    echo '<td>'.$a['roles'].'</td>';
                                
                                   

                                    


                                    
                                echo '</tr>';
                            } } }  }

                            if (empty($classe)) {
                                while($a = $sql->fetch()){
                                    
                                        echo ' <tr  scope="row">';
                                            echo '<td>'.$a['nom'].'</td>';
                                            echo '<td>'.$a['prenom'].'</td>';
                                            echo '<td>'.$a['mail'].'</td>';
                                            echo '<td>'.$a['matricule'].'</td>';
                                            echo '<td>'.$a['roles'].'</td>';
                                        
                                           
        
                                            
        
        
                                            
                                        echo '</tr>';
                                    } }
                  
                  ?>

                    </tbody>
                             
                                </span>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>