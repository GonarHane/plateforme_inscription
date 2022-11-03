<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styler.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>page-admin</title>
    <style>
        td {
            /*     border:1px solid black; */
            padding: 1rem;
        }
    </style>
</head>

<body>
    <?php
    /* include("model/model.php"); */
    ?>
    <div class="container" style="border: 1px solid  cornflowerblue;">
        <div class="row  m-5">
            <div class="part1 col-lg-3  " style="border: 1px solid blue;height: 50rem;">
                <div>
                    <div class="logo ">
                        <img class="logo mx-auto" src="models/images/2rives.jpeg" alt="logo" style="width: 8rem;height: 8rem;"><br><br>
                        <hr>
                        <div class="d-block  monTitre text-center" style="background-color:  orange;">
                            <h4>Tableau de bord</h4>
                        </div>
                        <p class="para text-center p-3"><img src="image/utilisateur.png" style="width: 2rem;height: 2rem;" alt=""><strong>Utilisateurs</strong></p>
                        <div class="lesUsers text-center " style="color: black;">
                            <a href="actifs.php"><strong>actifs</strong></a><br>
                            <a href="archivés.php"><strong> archivés</strong></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="part2 col-lg-9">
                <div class="row profil" style="background-color:  cornflowerblue;height:15rem">
                    <div class="col-lg-4 mt-5">
                        <p>image et matricule</p>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <input type="text" placeholder="Rechercher">
                    </div>
                    <div class="col-lg-2 mt-5">
                        <a href="page-connexion.php"><img src="image/deconnect.svg" style="height:2rem;" alt=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <!-- pour tableau -->
                        <table class="table">
                            <thead>
                                <tr class="">
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Matricule</th>
                                    <th scope="col">Rôle</th>
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $bdd=new ModelUser;
                                  $lister = $bdd->newBD->prepare("SELECT * FROM user WHERE etat=0 ");
                                  $lister->execute();
                                  while ($row=$lister->fetch(PDO::FETCH_ASSOC)) {
                                   $nom=$row['nom'];
                                   $prenom=$row['prenom'];
                                   $email=$row['mail'];
                                   $matricule=$row['matricule'];
                                   $role=$row['rol'];
                                   echo'
                                   <tr>
                                   <td>'.$prenom.'</td>
                                   <td>'.$nom.'</td>
                                   <td>'.$email.'</td>
                                   <td>'.$matricule.'</td>
                                   <td>'.$role.'</td>
                                   <td>
                                   <button><i class="bi bi-archive"></i>
                                   </button>
                                   </td>
                                  
                                    </tr>
                                   ';
                                  }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

    </div>
</body>

</html>