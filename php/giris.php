<?php
include "baglan.php";
$email=$_POST["email"];
$password=$_POST["password"];
$sorgu=$veritabani->prepare("SELECT * FROM users WHERE email=?");
$sorgu->execute(array($email));
if($sorgu->rowCount()>0)
{         
        foreach($sorgu as $satir)
        {
            $uname=$satir["uname"];
            $email=$satir["email"];
            $who=$satir["who"]; 
            $pass=$satir["password"];
            $id=$satir["id"];
            $photo=$satir["photo"];
            $gender=$satir["gender"];             
        }
        if($who==-1)
        {
            echo "<script>
            alert('Üyeliğiniz Askıya alındığı için giriş yapamazsınız lütfen bizimle iletişim kurun');
            window.location.href='../login.html';
            </script>";
        }
        if (password_verify($password, $pass))
        {
            session_start();
           
            $_SESSION["who"]=$who;
            $_SESSION["uname"]=$uname;
            $_SESSION["email"]=$email;
            $_SESSION["id"]=$id; 
            $_SESSION["photo"]=$photo;
            $_SESSION["gender"]=$gender;         
            if($who==1)
            {
                $_SESSION["oturum"]="yonetici";
                echo "<script>
                alert('Hoşgeldin $uname');
                window.location.href='admin.php';
                </script>";
            }
            else 
            {
                $_SESSION["oturum"]="kullanici";
                echo "<script>
                alert('Hoşgeldin $uname');
                window.location.href='user.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
            alert('Şifreniz Hatalı !!!');
            window.location.href='../index.php';
            </script>";
        }
       
}
else
{
    echo "<script>
    alert('Kullanıcı adı Hatalı !!!');
    window.location.href='../index.php';
    </script>";
}

?>