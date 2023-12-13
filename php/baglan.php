<?php
  try
  {
       $veritabani=new PDO("mysql:host=127.0.0.1;dbname=mustafa;charset=utf8",'root','');
        //$veritabani=new PDO("mysql:host=localhost;dbname=ihtmafew_proje1;charset=utf8",'ihmtafew_11a','onbira4848');
  }
  catch(PDOException $e)
  {
        echo "<script>
        alert('Veri Tabanı Bağlantı Hatası !!!');
        window.location.href='../login.html';
        </script>";
  }
?>