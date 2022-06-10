<?php
if(isset($_POST['btnNovi'])){
    include "konekcija.php";
    header("Content-type:application/json");
    $opis = $_POST['tbOpis'];
    $src = $_POST['tbSrc'];
    $alt = $_POST['tbAlt'];

$query2 = "INSERT INTO galerija (opis, src, alt) VALUES(:opis, :src, :alt)";
 $priprema2 = $konekcija->prepare($query2);
 $priprema2->bindParam(':opis', $opis);
 $priprema2->bindParam(':src', $src);
 $priprema2->bindParam(':alt', $alt);

// try{
//  $code = $priprema2->execute() ? 201 : 500;
//  $data = 'success';
//  }
 try {
    $code = $priprema2->execute();
  
    if($code){ 
        header("Location: ../index.php?page=admin");
        $data = 'success';
        $code = 201;
    } else {
        $code = 500;

    }
}
catch(PDOException $e){
 $code = 500;
 $data = $e;
 }
 
 catch(PDOException $e){
 $code=409;
 }
 
 // http_response_code($code);
 // echo json_encode($data);
  }
 