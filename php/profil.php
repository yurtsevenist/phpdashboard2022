<?php
include "user/header.php";
?>
<section class="yüzvh">
    <div class="col-md-8 offset-md-2">
        <form action="guncelle.php" method="post" class="box">
            <h3 class="title text-white">Profil Bilgilerim</h3>
            <input type="text" name="id" hidden readonly value="<?php echo $_SESSION['id']?>">
            <input type="email" name="email" readonly required placeholder="E-Mail" value="<?php echo $_SESSION['email']?>">
            <input type="text" name="uname" required placeholder="Kullanıcı-Adı" value="<?php echo $_SESSION['uname']?>">           
            <input type="password" name="opassword" required placeholder="Eski Şifrenizi Giriniz">
            <input type="password" name="password" required placeholder="Yeni Şifrenizi Giriniz">
            <input type="password" name="confirm" required placeholder="Yeni Şifrenizi Tekrar Giriniz">
            <input type="submit" name="" value="Güncelle">           
            <button type="button" class="btn btn-transparent text-danger" data-bs-toggle="modal" data-bs-target="#modalHesapsil">
Hesabımı sil
</button>
        </form>
    </div>
</section>
<?php
include "hesapsilmodal.php";
include "user/footer.php";
?>