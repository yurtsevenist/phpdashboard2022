<?php
if ($_POST) { 
    include("baglan.php"); 
    $data = $_POST['data'];   
    $durum=1;
    $kayit=$veritabani->prepare('UPDATE mods SET durum = ? WHERE modname = ?');
    $kayit->execute(array($durum,$data));
    $durum=0;
    $kayit=$veritabani->prepare('UPDATE mods SET durum = ? WHERE modname <> ?');
    $kayit->execute(array($durum,$data));   
     
     
   

}


?>