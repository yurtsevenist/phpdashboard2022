<?php
include "admin/header.php";
include "admin/topmenu.php";
include "admin/sidemenu.php";
include "baglan.php";
$who=0;
//toplam üye sayısı sorgusu
$sorgu=$veritabani->prepare("SELECT count(*) as toplam FROM users");
$sorgu->execute();
$toplamuye=$sorgu->fetchColumn();
//toplam mesaj sayısı sorgusu
$sorgu=$veritabani->prepare("SELECT count(*) as toplammesaj FROM mesajlar");
$sorgu->execute();
$toplammesaj=$sorgu->fetchColumn();
//cevaplanan mesaj sayısı sorgusu
$durum=2;
$sorgu=$veritabani->prepare("SELECT count(*) as toplammesaj FROM mesajlar where durum=?");
$sorgu->execute(array($durum));
$cevaplananmesaj=$sorgu->fetchColumn();
//şikayet konusundaki mesajların sayısı
$konu="Şikayet";
$sorgu=$veritabani->prepare("SELECT count(*) as toplammesaj FROM mesajlar where konu=?");
$sorgu->execute(array($konu));
$sikayetmesaj=$sorgu->fetchColumn();
?>

<div id="layoutSidenav_content">
    <main>
    <div class="container-fluid px-4">
                         <h5 class="mt-4">Yönetim Sayfası</h5> 
                         <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol> -->
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Toplam Üye Sayısı: <?php echo $toplamuye ?> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="uyeler.php">Detay Görüntüle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Toplam Gelen Mesaj: <?php echo $toplammesaj ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="mesajlar.php">Detay Görüntüle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Cevaplanan Mesaj Sayısı: <?php echo $cevaplananmesaj ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="mesajlar.php">Detay Görüntüle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Şikayet Konulu Mesaj Sayısı: <?php echo $sikayetmesaj ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="mesajlar.php">Detay Görüntüle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </main>
<?php
    include "admin/footer.php";
?>