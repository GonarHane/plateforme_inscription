<?php session_start();

?>
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
<!-- background-color:RGB(51, 21, 15) -->

<body class="bd-secondary">
    <div class="container border-danger">
        <div class="container admin col-lg-12 mt-4 ">
            <div class="row text-white btn-lg text-center mb-8 mt-2 border border-primary" style="background-color:RGB(135, 206, 235)">
                <span class="d-flex justify-content-center">
                    <!-- pour l'affichage sur le profil -->
                    <span class="col-1 ">
                        <img src="data:image/jpg;base64,<?= base64_encode($_SESSION['photo']) ?>" class="rounded-circle" height="60" width="60" alt="">
                        <em><?= $_SESSION['matricule'] ?? null ?></em>
                    </span>

                    <span class="d-flex  mt-4  w-50" style="max-height: 2rem;">
                        <?= $_SESSION['prenom'] ?? null ?>
                        <?= $_SESSION['nom'] ?? null ?><br>
                        <?= $_SESSION['mail'] ?? null ?>
                        
                        <span style="margin-left: auto">
                            <h4><a href="archive.php" class="text-white">liste des utilisateurs</a> </h4>
                        </span>
                    </span>
                    
                    <div class="ml-auto  mt-3 " style="margin-left:auto;max-height: 2.5rem;">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </form>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                    <a href="../views/connexion.php" class="mt-1"><i class="bi bi-box-arrow-right text-white " style="font-size:40px;"></i></a>
                    
                </span>
            </div>

            <h1 class="d-flex justify-content-center mb-4  ">Espace Administrateur</h1>

            <div class="row">
                <table class="table table-striped table-bordered border border-2 border-dark">
                    <thead class="text-white btn-lg text-center border border-2 border-dark" style="background-color:rgb(255, 165, 0)">
                        <tr class="border border-1 border-dark">
                            <th scope="col" class="border border-2 border-dark">Nom</th>
                            <th scope="col" class="border border-2 border-dark">Prenom</th>
                            <th scope="col" class="border border-2 border-dark">Email</th>
                            <th scope="col" class="border border-2 border-dark">Matricule</th>
                            <th scope="col" class="border border-2 border-dark">Role</th>
                            <th scope="col" class="border border-2 border-dark">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <?php
                            $email = $_SESSION['mail'];
                            $db = new PDO('mysql:host=localhost;dbname=inscription;', 'root', '');
                            $sql = $db->query("SELECT * FROM users WHERE mail != '$email' and etat=1");
                            /* $sql = $db->query('SELECT * FROM users WHERE `roles` ="utilisateur" and etat=1'); */
                            while ($a = $sql->fetch()) {

                                echo ' <tr  scope="row">';
                                echo '<td class="border border-1 border-dark">' . $a['nom'] . '</td>';
                                echo '<td class="border border-2 border-dark">' . $a['prenom'] . '</td>';
                                echo '<td class="border border-2 border-dark">' . $a['mail'] . '</td>';
                                echo '<td class="border border-2 border-dark">' . $a['matricule'] . '</td>';
                                echo '<td class="border border-2 border-dark">' . $a['roles'] . '</td>';

                                echo '<td class= "border border-2 border-dark">

                                    <span style="display:flex; justify-content:space-between;font-size:30px;">
                                    <a href="modifier.php?modif"><i class="bi bi-pencil-square text-dark "></i></a>
                                    <a href="archive.php?archive"><i class="bi bi-archive-fill text-dark"></i></a>
                                    <a href="changer.php?swite"><i class="bi bi-arrow-repeat text-dark"></i></a>
                                    </span>

                                    </td>';



                                echo '</tr>';
                            }

                            ?>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </body>
</html>