<?php 
session_start();
unset($_SESSION['admin']);
unset($_SESSION['korisnik']);
header("Location: ../index.php?page=login");
?>