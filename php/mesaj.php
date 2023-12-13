<?php
include "baglan.php";
$email=$_POST["email"];
$konu=$_POST["konu"];
$metin=$_POST["metin"];
$kayit=$veritabani->prepare("INSERT INTO mesajlar SET email=?,konu=?,metin=?");
$kayit->execute(array($email,$konu,$metin));
//burada istenirse mail gonderme yapılabilir
echo "<script>
alert('Mesajınız alınmıştır en kısa sürede size dönüş yapılacaktır');
window.location.href='../index.html';
</script>";
?>