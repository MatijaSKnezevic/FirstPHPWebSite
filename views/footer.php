<footer class="container-fluid text-center">
<div class="collapse navbar-collapse">
      
<ul id="footerMeni" class="nav navbar-nav">
      <?php
      require_once "php/konekcija.php";
      $upit= "SELECT tekst FROM navmeni where redosled < 5";
      $priprema = $konekcija->query($upit)->fetchAll();
      foreach($priprema as $nav):
        ?>
      <li><a href="index.php?page=<?=$nav->tekst?>"><?=strtoupper($nav->tekst)?></a></li>
      
      <?php
      endforeach;
      ?>
      </ul>  
</div>  
</footer>
<script src="style/main1.js" type="text/javascript"></script>
</body>
</html>