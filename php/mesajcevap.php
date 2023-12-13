<?php
include "baglan.php";
$cevap=$_POST["cevap"];
$who=$_POST["semail"];//semail oturum açan kişin mail adresini belirtir
echo $who;
$id=$_POST["id"];
$sorgu=$veritabani->prepare("SELECT * FROM mesajlar WHERE id=?");
$sorgu->execute(array($id));
if($sorgu->rowCount()>0)
{
    foreach($sorgu as $satir)
    {       
        $email=$satir["email"]; 
       
                       
    }
  

    $durum=2;
    $kayit=$veritabani->prepare('UPDATE mesajlar SET durum = ? WHERE id = ?');
    $kayit->execute(array($durum,$id));
    $kayit=$veritabani->prepare("INSERT INTO cevaplar SET mesaj_id=?, who=?,email=?,cevap=?");
    $kayit->execute(array($id,$who,$email,$cevap));     
    require "PHPMailer/inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz  
                
    $mail = new PHPMailer();   
    $mail->SMTPKeepAlive = true;   
    $mail->Mailer = "smtp"; // don't change the quotes!
    $mail->IsSMTP();
    $mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
    $mail->Host = "mail.ihmtal.com"; // Mail sunucusuna ismi
    $mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
    $mail->IsHTML(true);
    $mail->SetLanguage("tr", "phpmailer/language");
    $mail->CharSet  ="utf-8";
    $mail->Username = "info@ihmtal.com"; // Mail adresimizin kullanicı adi
    $mail->Password = "onbira4848"; // Mail adresimizin sifresi
    $mail->SetFrom("info@ihmtal.com", "İhsan Mermerci Web Grubu"); // Mail attigimizda gorulecek ismimiz
    $mail->AddAddress($email); // Maili gonderecegimiz kisi yani alici
    $mail->Subject = "Mesajınıza Cevap Verilmiştir"; // Konu basligi
    $mail->Body = $cevap; // Mailin icerigi
    if(!$mail->Send()){
        echo "<script>
            alert('$mail->ErrorInfo');
            window.location.href='mesajlar.php';
            </script>";
    
    } else {
        echo "<script>
            alert('E-Posta Gönderildi');
            window.location.href='mesajlar.php';
            </script>";
    }
    $mail->ClearAddresses();
    $mail->ClearAttachments();
}

?>