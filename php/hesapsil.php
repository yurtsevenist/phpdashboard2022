<?php
 try{
    include "baglan.php";
    $id=$_GET['kid'];
    $sorgu=$veritabani->prepare("SELECT * FROM users WHERE id=?");
    $sorgu->execute(array($id));
    if($sorgu->rowCount()>0)
    {
        $kayit=$veritabani->prepare("DELETE FROM users WHERE id=?");
        $kayit->execute(array($id));
        session_start();
        session_destroy();
        session_unset();
        unset($_SESSION['oturum']);
        echo "<script>
        alert('Üyeliğiniz Sonlandırılmıştır, tekrar bekleriz :)');
        window.location.href='../login.html';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Kayıt bulunamadı');
        window.location.href='../login.html';
        </script>";
    }

 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Hata meydana geldi : $e');
    window.location.href='../login.html';
    </script>";
 }

?>