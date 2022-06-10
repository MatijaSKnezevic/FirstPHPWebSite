	
	
			$(document).ready(function(){
			

				$('.btnBrisanje').click(function(){
					var id = $(this).data('id');
					

					$.ajax({
						method: 'POST',
						url: "php/delete.php",
						dataType: 'json',
						data: {
							id : id
						},
						success: function(podaci){
							alert("Uspesno ste izbrisali nalog");
							location = 'php/logout.php'; 
						},
						error: function(xhr, statusTxt, error){
							var status = xhr.status;
							switch(status){
								case 500:
									alert("Greska na serveru. Trenutno nije moguce izbrisati korisnika.");
									break;
								case 404:
									alert("Stranica nije pronadjena.");
									break;
								default:
									alert("Greska: " + status + " - " + statusTxt);
									break;
							}
						}
					});
				});

				
				$('.btnPopuni').click(function(){
					var id = $(this).data('id');
				

					$.ajax({
						method: 'POST',
						url: "php/update.php",
						dataType: 'json',
						data: {
							id : id
						},
						success: function(podaci, status, jqXHR){
							
							console.log(jqXHR.status); 
							console.log("Podaci pristigli sa servera, ime: ", podaci.korisnikId);
							$("#tbIme").val(podaci.ime_prezime);
							$("#tbKIme").val(podaci.korisnicko_ime);
							$("#tbEmail").val(podaci.email);
							$("#hiddenKId").val(podaci.korisnikId);
							

						},
						error: function(xhr, statusTxt, error){
							var status = xhr.status;
							switch(status){
								case 500:
									alert("Greska na serveru. Trenutno nije moguce izbrisati korisnika.");
									break;
								case 404:
									alert("Stranica nije pronadjena.");
									break;
								default:
									alert("Greska error: " + status + " - " + statusTxt);
									break;
							}
						}
					});
				});
				
			});
		
