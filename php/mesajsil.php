<?php
 try{
    include "baglan.php";
    $id=$_POST['id'];   
    $sorgu=$veritabani->prepare("SELECT * FROM mesajlar WHERE id=?");
    $sorgu->execute(array($id));
    if($sorgu->rowCount()>0)
    {
        $kayit=$veritabani->prepare("DELETE FROM mesajlar WHERE id=?");
        $kayit->execute(array($id));
      
        echo "<script>
        alert('Seçilen Mesaj Silinmiştir');
        window.location.href='mesajlar.php';
        </script>";
    }
  

 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Hata meydana geldi : $e');
    window.location.href='mesajlar.php';
    </script>";
 }

?>