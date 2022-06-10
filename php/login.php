<?php
session_start();
	if(isset($_POST['btnLogin'])){

		$email = $_POST['tbEmail'];
		$lozinka = $_POST['tbLozinka'];

		$errors = [];
		$reLozinka = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors[] = "Email nije ok";
		}

		if(!preg_match($reLozinka, $lozinka)){
			$errors[] = "Lozinka mora da ima 8 karaktera, velika slova i brojeve.";
		}

		if(count($errors) > 0){
			$_SESSION['greske'] = $errors;
			header("Location: ../index.php?page=login");
		}else {
			require_once "konekcija.php";
			$lozinka1 = md5($lozinka);

			 $upit = "SELECT k.id, k.email, k.ime_prezime, k.korisnicko_ime, u.naziv FROM korisnik k INNER JOIN uloga u 
              ON k.uloga_id = u.id WHERE aktivan = 1 
              AND email = :email AND lozinka = :password";

			    $priprema = $konekcija->prepare($upit);
			    $priprema->bindParam(":email", $email);
			    $priprema->bindParam(":password", $lozinka1);

			    $priprema->execute();
				$user = $priprema->fetchAll(); 
				if($user){
				foreach($user as $us){
			    if($us->naziv=="korisnik") {

                    $_SESSION['korisnik'] = $us; 
                    
			        header("Location: ../index.php?page=korisnik");
			        
				}else if($us->naziv=="admin"){
					$_SESSION['admin'] = $us;
					header("Location: ../index.php?page=admin");
				}else {
					header("Location: ../index.php?page=login");
			        $_SESSION['greske'] = "Greska, email ili password.";
				}
			}
		}else{
			header("Location: ../index.php?page=login");
			$_SESSION['greske'] = "Greska, email ili password.";
	
		}
		}
	}