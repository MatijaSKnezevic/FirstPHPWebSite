<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php?page=meni">Logo</a>
    </div> 
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <?php
      require_once "php/konekcija.php";
      $upit= "SELECT tekst FROM navmeni where redosled < 5";
      $priprema = $konekcija->query($upit)->fetchAll();
      foreach($priprema as $nav):
        ?>
      <li><a href="index.php?page=<?=$nav->tekst?>"><?=ucwords($nav->tekst)?></a></li>
      
      <?php
      endforeach;
      ?>
       
        <?php if(isset($_SESSION['korisnik'])):?>
						<li><a href="php/logout.php">Odjavi se</a></li>
						<li><a href="index.php?page=korisnik">Korisnik</a></li>
					<?php elseif(isset($_SESSION['admin'])): ?>
						<li><a href="php/logout.php">Odjavi se</a></li>
					
            <li><a href="index.php?page=admin">Admin</a></li>
          <?php else: ?>
						<li><a href="index.php?page=login">Logovanje</a></li>
					<?php endif; ?>
          
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="dokumentacija.pdf"><span class="glyphicon glyphicon-log-in"></span> Dokumetacija</a></li>
      </ul>
    </div>
  </div>
</nav>