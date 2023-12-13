<?php
include "baglan.php";
$uname=$_POST["uname"];
$email=$_POST["email"];
$password=$_POST["password"];
$confirm=$_POST["confirm"];
if($confirm!=$password)
{
    echo "<script>
    alert('Şifreler Eşleşmiyor');
    window.location.href='../index.php';
    </script>";
}
$pass = password_hash($password, PASSWORD_DEFAULT);
$sorgu=$veritabani->prepare("SELECT * FROM users WHERE uname=?");
$sorgu->execute(array($uname));
if($sorgu->rowCount()>0)
{
    echo "<script>
    alert('Bu Kullanıcı adı daha önce alınmış');
    window.location.href='../index.php';
    </script>";
}
else
{
    $sorgu=$veritabani->prepare("SELECT * FROM users WHERE email=?");
    $sorgu->execute(array($email));
    if($sorgu->rowCount()>0)
    {
        echo "<script>
        alert('Bu E-Posta Adresi daha önce alınmış');
        window.location.href='../index.php';
        </script>";
    }
    else
    {
        $kayit=$veritabani->prepare("INSERT INTO users SET uname=?,email=?,password=?");
        $kayit->execute(array($uname,$email,$pass));
        echo "<script>
        alert('Kayıdınız Tamamlanmıştır Kullanıcı adı ve Şifreniz ile giriş yapabilirsiniz');
        window.location.href='../index.php';
        </script>";
    }
}


?>