<?php

 session_start();

// include "php/konekcija.php";
// include "php/funkcije.php";


// --  FAJLOVI U KOJIMA SE NALAZE KODOVI ZA INSERT I UPDATE POSTA

// include "php/insert_post.php";
// include "php/update_post.php";

$page = "";

if(isset($_GET['page'])){
	$page = $_GET['page'];
}

include "views/header.php";
include "views/nav.php";
include "views/levi1.php";

switch($page){
    case "autor":
        include "views/autor.php";
        break;
    case "galerija":
        include "views/galerija.php";
        break;
    case "1":
        include "views/galerija.php";
        break;
    case "2":
        include "views/galerija.php";
        break;
    
    case "kontakt":
        include "views/kontakt.php";
        break;
    case "meni":
        include "views/meni.php";
        break;
    case "login":
        include "views/login.php";
        break;
    case "korisnik":
        if(isset($_SESSION["korisnik"])){
            
            include "views/korisnik.php";
              
        }else{
            
            include "views/login.php";
        }break;
    
    case "admin":
        if(isset($_SESSION["admin"])){
            include "views/admin.php";
        
    }else{
        
        include "views/login.php";
       
    }
    break;
    
}

// 	case "zadatak":
// 		include "views/zadatak.php";
// 		break;
// 	case "resenje":

// 		// Ukoliko je prosledjen ID, korisnik je kliknuo na link "Izmeni"
// 		// Potrebno je dohvatiti iz baze podatke o postu koga treba izmeniti
	
// 		// if(isset($_GET['id'])){

// 		// 	$id = $_GET['id'];

// 		// 	$upit = "
// 		// 		SELECT p.*, s.alt, s.putanja, s.putanja_mala 
// 		// 		FROM post p 
// 		// 			INNER JOIN slika s
// 		// 				ON p.slika_id = s.id
// 		// 		WHERE p.id = :id";

// 		// 	$priprema = $konekcija->prepare($upit);
// 		// 	$priprema->bindParam(":id", $id);

// 		// 	try {
// 		// 		$rez = $priprema->execute();

// 		// 		if($rez){
// 		// 			$postToUpdate = $priprema->fetch();
// 		// 		}
// 		// 	}
// 		// 	catch(PDOException $ex){
// 		// 		echo $ex->getMessage();
// 		// 	}
// 		// }

// 		include "views/resenje.php";
// 		break;
// 	case "login":
// 		include "views/login.php";
// 		break;
// 	default:
// 		include "views/zadatak.php";
// 		break;
// }
include "views/desni2.php";
include "views/footer.php";
