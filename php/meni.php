<?php   
    require_once("konekcija.php");
    
    if($konekcija){
        $upit = "SELECT * FROM navmeni WHERE status=1 order by redosled";
        $rezultatNavMeni =$konekcija->query($upit);
        if($rezultatNavMeni->rowCount()>0){
            foreach($rezultatNavMeni as $red){
              echo $red->link;
            }
        }
    }else{
        echo "ne radi";
    }


?>