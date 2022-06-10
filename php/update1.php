<?php 
if(isset($_POST['btnIzmeni'])){
  require_once("konekcija.php");
  $id = $_POST['hiddenKorisnikID'];
  $ime = $_POST['tbIme'];
  $email = $_POST['tbEmail'];
  $username = $_POST['tbKIme'];
  $lozinka= $_POST['tbLozinka'];
  $reFullName ="/^([A-Z][a-z]{2,15})(\s[A-Z][a-z]{2,15})+$/";
  $reUserPass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
  $greske = [];
  $code=404;
  $data=null;
  if(!preg_match($reFullName, $ime)) {
  array_push($greske, "Polje za ime nije u dobrom formatu");
  }
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  array_push($greske, "Polje za email nije u dobrom formatu");
  }
  if(!preg_match($reUserPass, $username)) {
  array_push($greske, "Korisnicko ime mora imati barem 8 karaktera, jedno veliko slovo i brojeve");
  }
  if(!preg_match($reUserPass, $lozinka)) {
  array_push($greske, "Lozinka mora imati barem 8 karaktera, jedno veliko slovo i brojeve");
  }
  if(count($greske)){
  $code=422;
  $data=$greske;
  }
  else{
$query = "UPDATE korisnik SET ime_prezime=:ime, korisnicko_ime=:username,
email=:email, lozinka=:lozinka WHERE id=:id";
$lozinka=md5($lozinka);
$izmena = $konekcija->prepare($query); 
$izmena->bindParam(":ime",$ime);
$izmena->bindParam(":username",$username);
$izmena->bindParam(":email",$email);
$izmena->bindParam(":lozinka",$lozinka);
$izmena->bindParam(":id",$id);

if($izmena->execute()) {
    header("Location: ../index.php?page=korisnik");
} else { 
echo "<h4>Greska: Korisnik nije izmenjen.</h4>";

}
}
}
?>