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
                        <img src="data:image/png;base64,<?= base64_encode($_SESSION['photo']) ?>" class="rounded-circle" height="60" width="60" alt="">
                        <em><?= $_SESSION['matricule'] ?? null ?></em>
                    </span>

                    <span class="d-flex  mt-4  w-50" style="max-height: 2rem;">
                        <?= $_SESSION['prenom'] ?? null ?>
                        <?= $_SESSION['nom'] ?? null ?><br>
                        <?= $_SESSION['mail'] ?? null ?>
                        
                        <span style="margin-left: auto">
                            <h4><a href="archiver.php" class="text-white">liste des non actifs</a> </h4>
                        </span>
                    </span>
                    
                    <div class="ml-auto  mt-3 " style="margin-left:auto;max-height: 2.5rem;">
               
               <form action="" method="post" style="display: flex;gap:15px;">   
                 <input type="text" name="classe" placeholder="" class="form-control md-1" id="rech">   
               <input type="submit" name="verif" value="RECHERCHER" class="btn btn-info" id="search"></form>
                 </div>
                 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
                    <a href="../views/deconnexion.php" class="mt-1"><i class="bi bi-box-arrow-right text-white " style="font-size:40px;"></i></a>
                    
                </span>
            </div>

            <h1 class="d-flex justify-content-center mb-5 mt-5 ">Espace Administrateur</h1>

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
                            
                            /* Pagination req start */
                            if (isset($_GET['page']) && !empty($_GET['page'])) {
                                $currentPage = (int) strip_tags($_GET['page']);
                              } else {
                                $currentPage = 1;
                              }
                              $db = new PDO('mysql:host=localhost;dbname=inscription;', 'root', '');
                              $sq = $db->query("SELECT COUNT(*) AS etat FROM users WHERE mail != '$email' and etat=1;");
                              $row = $sq->fetch();


                            $sql = $db->query("SELECT * FROM users WHERE mail != '$email' and etat=1");

                              $nbArticles = (int) $row['etat'];
                              
                              // On détermine le nombre d'articles par page
                              $parPage = 5;

                              $pages = ceil($nbArticles / $parPage);

// Calcul du 1er article de la page
                           $premier = ($currentPage  * $parPage) - $parPage;
                              
                            $mat = $_SESSION['matricule'];
                            $sql = $db->query("SELECT * FROM users WHERE etat=1 and matricule!='$mat'  LIMIT $premier, $parPage");
                            /* Pagination req fin */
                            
                            if (isset($_POST["verif"])) {
                                if (isset($_POST["classe"])) {
                                  $classe = $_POST["classe"];
                                  if (!empty($classe)) {
                                    $sl = $db->query("SELECT * FROM users WHERE mail != '$email' AND etat=1 AND Nom LIKE '%$classe%' OR Prenom LIKE '%$classe%'");
while ($a = $sl->fetch()) {
                            ?>

                                 <tr  scope="row">
                                <td class="border border-1 border-dark"><?= $a['nom']?></td>
                                <td class="border border-2 border-dark"><?= $a['prenom'] ?></td>
                                <td class="border border-2 border-dark"><?= $a['mail'] ?></td>
                                <td class="border border-2 border-dark"><?= $a['matricule'] ?></td>
                                <td class="border border-2 border-dark"><?= $a['roles'] ?></td>

                                <td class= "border border-2 border-dark">

                                    <span style="display:flex; justify-content:space-between;font-size:30px;">
                                    <a title="modifier" onclick="return confirm('Voulez vous vraiment modifier');" href="modification.php?email=<?=$a['mail']?>"><i class="bi bi-pencil-square "></i></a>
                                    <a title="archiver" onclick="return confirm('Voulez vous vraiment archiver');" href="archive.php?email=<?=$a['mail']?>"><i class="bi bi-archive-fill text-red"></i></a>
                                    <a title="switcher" href="switch.php?email=<?=$a['mail']?>"><i class="bi bi-arrow-repeat "></i></a>
                                    </span>

                                    </td>



                                </tr>
                            <?php
                                 }}}}

                                 if (empty($classe)) {
while ($a = $sql->fetch()) {
                            ?>

                                 <tr  scope="row">
                                <td class="border border-1 border-dark"><?= $a['nom']?></td>
                                <td class="border border-2 border-dark"><?= $a['prenom'] ?></td>
                                <td class="border border-2 border-dark"><?= $a['mail'] ?></td>
                                <td class="border border-2 border-dark"><?= $a['matricule'] ?></td>
                                <td class="border border-2 border-dark"><?= $a['roles'] ?></td>

                                <td class= "border border-2 border-dark">

                                    <span style="display:flex; justify-content:space-between;font-size:30px;">
                                    <a title="modifier" onclick="return confirm('Voulez vous vraiment modifier');" href="modification.php?email=<?=$a['mail']?>"><i class="bi bi-pencil-square "></i></a>
                                    <a title="archiver" onclick="return confirm('Voulez vous vraiment archiver');" href="archive.php?email=<?=$a['mail']?>"><i class="bi bi-archive-fill text-red"></i></a>
                                    <a title="switcher" href="switch.php?email=<?=$a['mail']?>"><i class="bi bi-arrow-repeat "></i></a>
                                    </span>

                                    </td>



                                </tr>
                            <?php
                                 } }
?>

                        </tr>

                    </tbody>
                </table>
            </div>

            <span class="d-flex justify-content-center">
        <nav>
          <!-- Pagination start -->
  <ul class="pagination">


    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
      <a href="admin.php?page=<?= $currentPage - 1 ?>" class="page-link">
        < </a>
    </li>
    <?php for ($page = 1; $page <= $pages; $page++) : ?>
      <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
      <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
        <a href="admin.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
      </li>
    <?php endfor ?>
    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
      <a href="admin.php?page=<?= $currentPage + 1 ?>" class="page-link">></a>
    </li>
  </ul>
  <!-- Pagination end -->
</nav></span> </div>
    </body>
</html>