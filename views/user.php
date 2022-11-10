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
                <span class="d-flex">
                <ul>
                    <li><a href="../views/deconnexion.php" class="mt-1"><i class="bi bi-box-arrow-right text-white "></i></a></li>
                </ul>
                <div class="ml-auto  mt-3 " style="margin-left:auto;max-height: 2.5rem;">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary " type="submit">Rechercher</button>
                        </form>
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
                  

                        while($a = $sql->fetch()){
                            
                                echo ' <tr  scope="row">';
                                    echo '<td>'.$a['nom'].'</td>';
                                    echo '<td>'.$a['prenom'].'</td>';
                                    echo '<td>'.$a['mail'].'</td>';
                                    echo '<td>'.$a['matricule'].'</td>';
                                    echo '<td>'.$a['roles'].'</td>';
                                
                                   

                                    


                                    
                                echo '</tr>';
                        }
                  
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