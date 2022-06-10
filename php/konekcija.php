<?php
$imeBaze = "epiz_25411771_mojabaza";
$imeServera = "sql111.epizy.com";
$username  = "epiz_25411771";
$password = "tYO8MGhfxWF4";
try{
$konekcija = new PDO("mysql:host=$imeServera;dbname=$imeBaze",$username, $password);
$konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
//var_dump($konekcija);
}catch(PDOException $e){
    
    echo $e->getMessage();

}
function executeQuery($upit){
    global $konekcija;

    $rezultat = $konekcija->query($upit)->fetchAll();
    
    return $rezultat;
}
?>