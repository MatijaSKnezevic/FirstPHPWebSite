<?php

session_start();

 if(isset($_POST['register'])){

 include "konekcija.php";
 header("Content-type:application/json");
 $fullname = $_POST['fullname'];
 $email = $_POST['email'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $reFullName ="/^([A-Z][a-z]{2,15})(\s[A-Z][a-z]{2,15})+$/";
 $reUserPass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
 $greske = [];
 $code=404;
 $data=null;
 if(!preg_match($reFullName, $fullname)) {
 array_push($greske, "Polje za ime nije u dobrom formatu");
 }
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
 array_push($greske, "Polje za email nije u dobrom formatu");
 }
 if(!preg_match($reUserPass, $username)) {
 array_push($greske, "Korisnicko ime mora imati barem 8 karaktera");
 }
 if(!preg_match($reUserPass, $password)) {
 array_push($greske, "Lozinka mora imati barem 8 karaktera");
 }
 if(count($greske)){
 $code=422;
 $data=$greske;
 }
 else{
 try{
 $query = "SELECT * FROM korisnik WHERE korisnicko_ime = :username OR email = :email";

 $priprema = $konekcija->prepare($query);
 $priprema->bindParam(':username', $username);
 $priprema->bindParam(':email', $email);
 $rezultat = $priprema->execute();
 $dohvati = $priprema-> fetch();
 if($dohvati){
 $code=409;
 }
 else{
 $md5lozinka=md5($password);
$query2 = "INSERT INTO korisnik (ime_prezime, korisnicko_ime, email, lozinka, aktivan, uloga_id) VALUES(:fullname, :username, :email, :lozinka, 1, 2)";
 $priprema2 = $konekcija->prepare($query2);
 $priprema2->bindParam(':fullname', $fullname);
 $priprema2->bindParam(':email', $email);
 $priprema2->bindParam(':username', $username);
 $priprema2->bindParam(':lozinka', $md5lozinka);

// try{
//  $code = $priprema2->execute() ? 201 : 500;
//  $data = 'success';
//  }
 try {
    $code = $priprema2->execute();
  
    if($code){ 
        $_SESSION['noviK']=$code;
        header("Location: ../index.php?page=login");
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
 }
 }
 catch(PDOException $e){
 $code=409;
 }
 }
//  http_response_code($code);
  //echo json_encode($data);
 }
?>