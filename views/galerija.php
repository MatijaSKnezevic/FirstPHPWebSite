
    <div class="col-sm-8 text-left"> 
      <h1>Welcome Galerija</h1>
      <p>Jedinstveni sajt za preporuke za citanje knjiga, osnovni cilj je da pomogne citaocima da odaberu dobru knjigu za citanje.
      <br><br>
      Korisnici mogu da pogledaju ocene drugih korisnika, i na osnovu toga odluce koju ce knjigu citati.
      <br><br>
      Namera portala nije da bude elitisticki, da promovise samo tzv. visoku knjizevnost, već da u svim knjizevnim vrstama i zanrovima istice one knjige koje su najbolje. U tom smislu portal je namenjenim svima onima koji u moru literature traze nešto zaista dobro za sebe.
</p>
      <hr>
    <?php
    
    require_once "php/konekcija.php";

 
      $upit1 = "SELECT * from galerija";
      $rezultat = $konekcija->query($upit1);
      $rezult = $rezultat->fetchAll();

      foreach($rezult as $rez):

    ?>
    <?php if(($rez->id-1)%3==0||$rez->id==1){
    echo "<div class='row'>";
    }
    ?>
    <div class="col-sm-2" style="background-color:white; margin-bottom:10px;">
    <img src="images/<?=$rez->src?>"  alt="<?=$rez->alt?>" width="100%" height="250">
    </div>
    <div class="col-sm-2" style="background-color:lavenderblush;">
    <p>
    <?=$rez->opis?>
    </p>
    <p>Ocena</p>
    1 <input type="radio" name="ocena">
    2 <input type="radio" name="ocena">
    3 <input type="radio" name="ocena">
    4 <input type="radio" name="ocena">
    5 <input type="radio" name="ocena">
    
    </div>
    <?php if($rez->id%3==0){
    echo " </div>";
    }
    ?>
   
      <?php endforeach;
    ?>
      
    </div>