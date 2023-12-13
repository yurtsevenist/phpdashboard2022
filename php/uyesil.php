<?php
 try{
    include "baglan.php";
    $email=$_POST['email'];   
    $sorgu=$veritabani->prepare("SELECT * FROM users WHERE email=?");
    $sorgu->execute(array($email));
    if($sorgu->rowCount()>0)
    {
        $kayit=$veritabani->prepare("DELETE FROM users WHERE email=?");
        $kayit->execute(array($email));
      
        echo "<script>
        alert('Seçilen Kullanıcı Üyeliği Sonlandırılmıştır');
        window.location.href='uyeler.php';
        </script>";
    }
  

 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Hata meydana geldi : $e');
    window.location.href='uyeler.php';
    </script>";
 }

?>