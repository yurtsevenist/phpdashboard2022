<?php
include "admin/header.php";
include "admin/topmenu.php";
include "admin/sidemenu.php";

if(isset($_POST['modbtn'])) {
include "baglan.php";
$zemin=$_POST["zemin"];
$font=$_POST["font"];
$durum=1;
$yer="menu";
$kayit=$veritabani->prepare('UPDATE mods SET color = ? WHERE yer = ? AND durum=? ');
$kayit->execute(array($zemin,$yer,$durum));
$yer="font";
$kayit=$veritabani->prepare('UPDATE mods SET color = ? WHERE yer = ? AND durum=? ');
$kayit->execute(array($font,$yer,$durum));
$durum=1;
$mods=$veritabani->prepare("SELECT * FROM mods WHERE durum=?");
$mods->execute(array($durum));
}
?>
<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
                         <h5 class="mt-4">Mod Ayar Sayfası</h5> 
                         <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <div class="col-md-6 offset-md-3">
                                <form action="" method="post">
                        <div class="mb-3 col-md-2 offset-md-5">
                        <label for="zemin" class="form-label">Zemin Rengi</label>
                        <input type="color" class="form-control" id="zemin" name="zemin" value="<?php echo $menurenk ?>"> 
                        </div>
                        <div class="mb-3 col-md-2 offset-md-5">
                        <label for="font" class="form-label">Font Rengi</label>
                        <input type="color" class="form-control" id="font" name="font" value="<?php echo $fontrenk ?>"> 
                        </div>
                        <div class="col-md-3 offset-md-5">
                        <button type="submit" name="modbtn" class="btn btn-primary">Güncelle</button>      
                        </div>       
                       
                                </form>
                        </div>                
    </main>
<?php
    include "admin/footer.php";
?>