<?php
 	if(isset($_POST['id'])){
 		header("Content-type: application/json");
 		require_once('konekcija.php');
 		$code =404;
 		$data = null;

 		$query="SELECT *, k.id AS korisnikId FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id  WHERE k.id = :id";
 		$izmena = $konekcija->prepare($query);
 		$izmena->bindParam(":id", intval($_POST['id']));
 		
	    try {
	    	$izmena->execute();
	        $korisnik = $izmena->fetch();
	        if($korisnik){ 
	        	$data = $korisnik;
	        	$code = 201;
	        } else {
	        	$code = 500;
	        }
	        
	        
	    }catch(PDOException $e) {
	        $code = 500;
	        $data = $e -> getMessage();
	    }

 	}
http_response_code($code);
echo json_encode($data);
		

		
		?>
	