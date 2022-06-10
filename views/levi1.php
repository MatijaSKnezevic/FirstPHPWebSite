<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav text-left list-group">
    
    <?php
      require_once "php/konekcija.php";
      $upit= "SELECT tekst FROM navmeni where redosled < 5";
      $priprema = $konekcija->query($upit)->fetchAll();
      foreach($priprema as $nav):
        ?>
      <li class="list-group-item list-group-item-success"><a href="index.php?page=<?=$nav->tekst?>" class="link"><?=ucwords($nav->tekst)?></a></p>
      
      <?php
      endforeach;
      ?>
    </div>