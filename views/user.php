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
                    <li>liste des archives</li>
                </ul>
                <a href=""><i class="bi bi-box-arrow-right text-white"></i></a>
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
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                  /* pour archiver  */
                  $email = $_SESSION['mail'];
                  $db = new PDO('mysql:host=localhost;dbname=inscription;', 'root', '');
                  $sql = $db->query("SELECT * FROM users WHERE mail != '$email' and etat=1");
                  

                        while($a = $sql->fetch()){
                            
                                echo ' <tr  scope="row">';
                                    echo '<td>'.$a['nom'].'</td>';
                                    echo '<td>'.$a['prenom'].'</td>';
                                    echo '<td>'.$a['mail'].'</td>';
                                    echo '<td>'.$a['matricule'].'</td>';
                                    echo '<td>'.$a['roles'].'</td>';
                                
                                   /*  echo "<td>
                                    <form action='mod_employer.php' method='post'> 
                                    <input type='hidden' name='id_em' value=".$a["id"].">
                                    <button type='submit' class='btn btn-outline-danger'>archiver</button>
                                    </form>
                                    </td>"; */

                                    


                                    
                                echo '</tr>';
                        }
                  
                  ?>

                    </tbody>
                               <!--  <span class="d-flex gap-4 offset-3">
                                <a href=""><i class="bi bi-pencil-square text-dark"></i></a>
                                <a href=""><i class="bi bi-archive-fill text-dark"></i></a>
                                <a href=""><i class="bi bi-arrow-repeat text-dark"></i></a> -->
                                </span>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
</body>

</html>