<?php
include "baglan.php";
$email=$_POST["email"];
$sorgu=$veritabani->prepare("SELECT * FROM users WHERE email=?");
$sorgu->execute(array($email));
if($sorgu->rowCount()>0)
{
                $password=rand(100000,999999);
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $kayit=$veritabani->prepare('UPDATE users SET password = ? WHERE email = ?');
                $kayit->execute(array($pass,$email));
                require "PHPMailer/inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz  
                
    $mail = new PHPMailer();   
    $mail->SMTPKeepAlive = true;   
    $mail->Mailer = "smtp"; // don't change the quotes!
    $mail->IsSMTP();
    $mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
    $mail->Host = "sinav.ihmtal.com"; // Mail sunucusuna ismi
    $mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
    $mail->IsHTML(true);
    $mail->SetLanguage("tr", "phpmailer/language");
    $mail->CharSet  ="utf-8";
    $mail->Username = "eposta@sinav.ihmtal.com"; // Mail adresimizin kullanicı adi
    $mail->Password = "websinav2021"; // Mail adresimizin sifresi
    $mail->SetFrom("eposta@sinav.ihmtal.com", "Web Sınav"); // Mail attigimizda gorulecek ismimiz
    $mail->AddAddress($email); // Maili gonderecegimiz kisi yani alici
    $mail->Subject = "Şifre Değişikliği"; // Konu basligi
    $mail->Body = "Şifreniz $password olmuştur"; // Mailin icerigi
    if(!$mail->Send()){
        echo "<script>
            alert('$mail->ErrorInfo');
            window.location.href='../forget.html';
            </script>";
    
    } else {
        echo "<script>
            alert('E-Posta Gönderildi');
            window.location.href='../forget.html';
            </script>";
    }
    $mail->ClearAddresses();
    $mail->ClearAttachments();
}
else
{
    echo "<script>
    alert('Bu E-Posta Adresi Sistemde Kayıtlı değil');
    window.location.href='../forget.html';
    </script>";
}
