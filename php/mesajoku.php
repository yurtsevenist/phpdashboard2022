<?php
include "baglan.php";
$id=$_POST["id"];
$sorgu=$veritabani->prepare("SELECT * FROM mesajlar WHERE id=?");
$sorgu->execute(array($id));

if($sorgu->rowCount()>0)
{
    foreach($sorgu as $satir)
    {       
        $email=$satir["email"]; 
        $durum=$satir["durum"];
                       
    }
    if($durum==2)
    {
        $drm=2;
    }
    else
    {
        $drm=1;
    }
    $kayit=$veritabani->prepare('UPDATE mesajlar SET durum = ? WHERE id = ?');
    $kayit->execute(array($drm,$id));
    echo "<script>  
    window.location.href='mesajlar.php';
    </script>";
}

?>