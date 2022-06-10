 <?php   

session_start();

    if(isset($_POST['posalji'])){
       $idK=$_SESSION['korisnik']->id;
      $odg = array("1"=>$_POST['jedan'],"2"=>$_POST['dva'],"3"=>$_POST['tri']);
      foreach($odg as $od => $odg_value) {
  
        require_once "konekcija.php";
      $query2 = "INSERT INTO odgovori (odgovor, idPitanje) VALUES(:odg, :id)";
 $priprema2 = $konekcija->prepare($query2);
 $priprema2->bindParam(':odg', $odg_value);
 $priprema2->bindParam(':id', $od);

 try {
    $code = $priprema2->execute();
  
    if($code){ 
        $_SESSION["hvala"]=$code;
        header("Location: ../index.php?page=korisnik");
      
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
}
// http_response_code($code);
//   echo json_encode($data);
}
?>