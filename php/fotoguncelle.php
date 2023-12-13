<?php
include "baglan.php";
$id=$_POST["id"];
$photo=$_POST["photo"];
$sorgu=$veritabani->prepare("SELECT * FROM users WHERE id=?");
$sorgu->execute(array($id));
if($sorgu->rowCount()>0)
{
                   
                $kayit=$veritabani->prepare('UPDATE users SET photo = ? WHERE id = ?');
                $kayit->execute(array($photo,$id));            
                
                    echo "<script>
                    alert('Fotografınız güncellenmiştir');
                    window.location.href='profilfoto.php';
                    </script>";
                         
            
         
         
    }
    else
    {
        echo "<script>
        alert('Kayıt bulunamadı');
        window.location.href='profilfoto.php';
        </script>";
    }




