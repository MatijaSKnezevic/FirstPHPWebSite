
	<div class="col-sm-8 text-left" id="login">
    <h3>Registracija/Logovanje</h3><br>
		<?php 
		 
			if(isset($_SESSION['noviK'])):
				
				
        ?>
          </form>    
        <form method="POST" action="php/login.php">
			<input type="text" name="tbEmail" placeholder="Email" class="login-input"/><br><br>
			
			<input type="text" name="tbLozinka" placeholder="Lozinka" class="login-input"/><br><br>
            
             <input type='submit' name="btnLogin" value="Logovanje" class="login-input"/><br><br>
            
        </form>
	
	<?php  unset($_SESSION['noviK']);?>

		<?php else: ?>
        <form method="POST" action="php/registracija.php">
		
        <input type="text" id="ime1" name="tbImePrezime" placeholder="Vase ime i prezime" class="registracija-input"/> 
        <p id="ime1Greska"></p>
        <input type="text" id="email" name="tbEmail1" placeholder="Vas email" class="registracija-input"/>
        <p id="emailGreska"></p>
        <input type="password" id="lozinka" name="tbLozinka1" placeholder="Vasa lozinka" class="registracija-input"/>
        <p id="lozinkaGreska"></p>
        <input type="text" id="korisnickoIme" name="tbKorisnik1" placeholder="Vase korisnicko ime" class="registracija-input"/>
        <p id="korisnickoGreska"></p>
        <h3 id="proslo"></h3>
        <br><br>
            
        <input type='submit' id="btnRegistracija" name="btnRegistracija" value="Registruj se"/>
            </form>    
        <form method="POST" action="php/login.php">
			<input type="text" name="tbEmail" placeholder="Vas email" class="login-input"/>
			<input type="password" name="tbLozinka" placeholder="Vasa lozinka" class="login-input"/> <br>           
             <input type='submit' name="btnLogin" value="Logovanje" class="login-input"/>
            
             
            
        </form>
	

		<?php endif; ?>
		<?php if(isset($_SESSION['greske'])):
			var_dump($_SESSION['greske']);
			unset($_SESSION['greske']);
		?>
		<?php endif; ?>
	</div>