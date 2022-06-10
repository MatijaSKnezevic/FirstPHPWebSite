<div class="col-sm-8 text-left"> 

<div class="col-sm-4 text-left"> 
      <h1>Dobrodosli <?=$_SESSION['admin']->korisnicko_ime?></h1>
      
      <img src="images/ja.jpg" class="img-circle" width="200px" height="200px" alt="Cinque Terre">
      <hr>
      <h3>Vasi podaci</h3>
      <div class="col-sm-8 text-left"> 
     
      <form action="php/update1.php" method="POST">
      <p>Ime i prezime: </p><input type="text" name="tbIme" id="tbIme" placeholder="<?=$_SESSION['admin']->ime_prezime?>"/>
     
      
      <p>Email:</p> <input type="text" name="tbEmail" id="tbEmail" placeholder="<?=$_SESSION['admin']->email?>"/>
      
      <p>Korisnicko ime:</p> <input type="text" name="tbKIme" id="tbKIme" placeholder="<?=$_SESSION['admin']->korisnicko_ime?>"/>
   

      <p>Nova Lozinka:</p> <input type="text" name="tbLozinka" id="tbLozinka" placeholder="Lozinka"/> 
      
      <br> <br>
    <button type="submit" id="izmeni" name="btnIzmeni" class="btn btn-warning btnIzmeni" data-id="<?=$_SESSION['admin']->id;?>" >Izmeni</button>    <br>
     </form>
        <button onclick="funkcija()"  type="submit" name="btnPopuni" class="btn btn-warning btnPopuni" data-id="<?=$_SESSION['admin']->id;?>">Popuni</button><br> <br>
      <!-- <form action="php/delete.php" method="POST">
      <button type="button" name="btnBrisanje" class="btn btn-danger btnBrisanje" data-id="<?=$_SESSION['admin']->id;?>">Izbrisite nalog</button></form>
      <br> <br> -->
      </div>

    </div>
    <div class="col-sm-4 text-left"> 
      <h2>Izbrisi Korisnika</h2>
      <form action="php/delete.php" method="POST">
      <?php
      require_once "php/konekcija.php";
      $upit= "SELECT id, email, korisnicko_ime, uloga_id from korisnik where uloga_id=2";
      $priprema = $konekcija->query($upit)->fetchAll();
      foreach($priprema as $pit):
    
    ?>
     
    <p><?=$pit->email;?></p>
    <input type="text" class="odgovor" name="neznam" value="<?=$pit->korisnicko_ime;?>">
    <button type="button" name="btnObrisi" class="btn btn-danger btnObrisi" data-id="<?=$pit->id;?>">Obrisi</button>
    
   <br>  
   <?php
      endforeach;
      ?>
    <br>
    <br>
</form>
      <hr>
         </div>
 <div class="col-sm-4 text-left">
 <h2>Dodaj knjigu</h2>
     <form method="POST" action="php/nova.php">
    <p>Opis: </p><input type="text" name="tbOpis" id="tbOpis" placeholder="Opis"/>
    <br>
    <p>Putanja:</p> <input type="text" name="tbSrc" id="tbSrc" placeholder="Putanja"/>
    <br>   
    <p>Alt:</p> <input type="text" name="tbAlt" id="tbAlt" placeholder="Alt"/>
   <br>
    <input type='submit' name="btnNovi" value="Dodaj knjigu"/>
    </form>
</div>
    
</div>