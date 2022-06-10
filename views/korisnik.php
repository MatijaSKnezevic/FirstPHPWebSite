
<div class="col-sm-4 text-left"> 
      <h1>Dobrodosli <?=$_SESSION['korisnik']->korisnicko_ime?></h1>
      <p>Postavite vasu sliku:</p>
      <img src="cinqueterre.jpg" class="img-circle" alt="Cinque Terre">
      <hr>
      <h3>Vasi podaci</h3>
      <div class="col-sm-8 text-left"> 
     
      <form action="php/update1.php" method="POST">
      <p>Ime i prezime: </p><input type="text" name="tbIme" id="tbIme" placeholder="<?=$_SESSION['korisnik']->ime_prezime?>"/>
     
      
      <p>Email:</p> <input type="text" name="tbEmail" id="tbEmail" placeholder="<?=$_SESSION['korisnik']->email?>"/>
      
      <p>Korisnicko ime:</p> <input type="text" name="tbKIme" id="tbKIme" placeholder="<?=$_SESSION['korisnik']->korisnicko_ime?>"/>
   

      <p>Nova Lozinka:</p> <input type="text" name="tbLozinka" id="tbLozinka" placeholder="Lozinka"/> 
      <input type="hidden" id="hiddenKId" name="hiddenKorisnikID"/>
      <br> <br>
    <button type="submit" id="izmeni" name="btnIzmeni" class="btn btn-warning btnIzmeni" data-id="<?=$_SESSION['korisnik']->id;?>" >Izmeni</button>    <br>
     </form>
        <button onclick="funkcija()"  type="submit" name="btnPopuni" class="btn btn-warning btnPopuni" data-id="<?=$_SESSION['korisnik']->id;?>">Popuni</button><br> <br>
      <form action="php/delete.php" method="POST">
      <button type="button" name="btnBrisanje" class="btn btn-danger btnBrisanje" data-id="<?=$_SESSION['korisnik']->id;?>">Izbrisite nalog</button></form>
      <br> <br>
      </div>

    </div>
    <div class="col-sm-4 text-left"> 
      <h1>Anketa</h1>
      <form action="php/anketa.php" method="POST">
      <?php
      require_once "php/konekcija.php";
      $upit= "SELECT pitanje, tekst from pitanja";
      $priprema = $konekcija->query($upit)->fetchAll();
      foreach($priprema as $pit):
    
    ?>
     
      
    <p><?=$pit->pitanje;?></p>
    <input type="text" class="odgovor" name="<?=$pit->tekst;?>" placeholder="Vas odgovor">
   
   <br>  
   <?php
      endforeach;
      ?>
     
    <br>
    <input type="submit" value="Posalji" name="posalji" id="odgovori">
    <br>
</form>
      <hr>
      <?php
        if(isset($_SESSION["hvala"])):
      ?>
      <p id="tekstOdg">
          Hvala na izdvojenom vremenu! :D
      </p>
        <?php 
      
      endif;?>
    </div>

    