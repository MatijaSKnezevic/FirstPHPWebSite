<?php

$statusCode = 404;

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}

if(isset($_POST['id'])){
	
    $id = $_POST['id'];

    include "konekcija.php";
	
    $upit = $konekcija->prepare("DELETE FROM korisnik WHERE id = :id");
    $upit->bindParam(':id', $id);

    try{
        $rezultat = $upit->execute();

        if($rezultat){
            $statusCode = 204;
            unset($_SESSION['korisnik']);
            
      unset($_SESSION["hvala"]);
            //unset($_SESSION['admin']);
            header("Location: ../index.php?page=login");
        } else {
            $statusCode = 500;
        }
    }
    catch(PDOException $e){
        $statusCode = 500;
    }
}

http_response_code($statusCode);


