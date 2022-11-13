<?php
include_once "../models/models.php";
$requeste = new ModelUser();
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $requeste->archiveUser($email);
}