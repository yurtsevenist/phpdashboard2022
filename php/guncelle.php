<?php
include "baglan.php";


$id=$_POST["id"];
$uname=$_POST["uname"];
$email=$_POST["email"];
$opassword=$_POST["opassword"];
$password=$_POST["password"];
$confirm=$_POST["confirm"];
$sorgu=$veritabani->prepare("SELECT * FROM users WHERE id=?");
$sorgu->execute(array($id));
if($sorgu->rowCount()>0)
{
    foreach($sorgu as $satir)
    {       
        $uemail=$satir["email"];  
        $pass=$satir["password"];
        $who=$satir["who"];                  
    }
    if($uemail!=$email)
    {
        if($who==0)
        {
        echo "<script>
        alert('Çakallık yapma email adresini değiştiremezsin');
        window.location.href='profil.php';
        </script>";
        }
        else
        {
            echo "<script>
            alert('Çakallık yapma email adresini değiştiremezsin');
            window.location.href='adminprofil.php';
            </script>"; 
        }
     }
    else
    {
        if (password_verify($opassword, $pass))
        {
            if($password!=$confirm)
            {
                if($who==0)
                {
                echo "<script>
                alert('Yeni Şifre ile Şifre tekrarınız uyuşmuyor');
                window.location.href='profil.php';
                </script>"; 
                }
                else
                {
                    echo "<script>
                    alert('Yeni Şifre ile Şifre tekrarınız uyuşmuyor');
                    window.location.href='adminprofil.php';
                    </script>";  
                }
            }
            else
            {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $kayit=$veritabani->prepare('UPDATE users SET uname = ?,password = ? WHERE id = ?');
                $kayit->execute(array($uname,$pass,$id));
                if($who==0)
                {
                    echo "<script>
                    alert('Kayıdınız Güncellenmiştir Yeni Şifreniz ile giriş yapabilirsiniz');
                    window.location.href='profil.php';
                    </script>";
                }
                else
                {
                    echo "<script>
                    alert('Kayıdınız Güncellenmiştir Yeni Şifreniz ile giriş yapabilirsiniz');
                    window.location.href='adminprofil.php';
                    </script>";
                }
              
            }
        } 
        else
        {
            if($who==0)
            {
                echo "<script>
                alert('Eski Şifreniz hatalı');
                window.location.href='profil.php';
                </script>"; 
            }
            else
            {
                echo "<script>
                alert('Eski Şifreniz hatalı');
                window.location.href='adminprofil.php';
                </script>"; 
            }
         
        }  
    }

}
?>