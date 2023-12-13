<?php
include "admin/header.php";
include "admin/topmenu.php";
include "admin/sidemenu.php";
include "baglan.php";
$sorgu=$veritabani->prepare("SELECT * FROM mesajlar");
$sorgu->execute();
$mesajlar=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.
?>

<div id="layoutSidenav_content">
    <main>
    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Kullanıcılardan Gelen Mesajlar
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Kimden?</th>
                                            <th>Konu</th>
                                            <th>Mesaj</th>
                                            <th>Mesaj Tarihi</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kimden?</th>
                                            <th>Konu</th>
                                            <th>Mesaj</th>
                                            <th>Mesaj Tarihi</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </tfoot>
                                 <tbody>
                                     <?php foreach($mesajlar as $mesaj){?>
                                       <tr>
                                            <td><?=$mesaj->email?></td>
                                           
                                            <td><?=$mesaj->konu?></td>
                                            <td><?=$mesaj->metin?></td>
                                            <td><?=$mesaj->kdate?></td>
                                            <?php if($mesaj->durum==0){?>
                                                <td style="color:darkred; font-weight:bold">Okunmadı</td>
                                                <?php } else if($mesaj->durum==1){?>
                                                    <td style="color:green;font-weight:bold">Okundu</td>
                                                    <?php } else { ?>
                                                    <td style="color:darkblue;font-weight:bold">Cevaplandı</td>
                                                    <?php } ?>
                                            <td class="text-center">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#modalMesajCevap" id="<?php echo $mesaj->id?>" email="<?php echo $mesaj->email?>" konu="<?php echo $mesaj->konu?>" metin="<?php echo $mesaj->metin?>"  class="btn btn-secondary"><span class="fas fa-pen" title="Cevapla"></span></a> 
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#modalMesajGoruntule" id="<?php echo $mesaj->id?>" email="<?php echo $mesaj->email?>" konu="<?php echo $mesaj->konu?>" metin="<?php echo $mesaj->metin?>" kdate="<?php echo $mesaj->kdate?>" class="btn btn-dark"><span class="fas fa-eye" title="Görüntüle"></span></a>
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#modalMesajsil" id="<?php echo $mesaj->id?>" email="<?php echo $mesaj->email?>" konu="<?php echo $mesaj->konu?>" class="btn btn-danger"><span class="fas fa-trash" title="Sil"></span></a>
                                           
                                        </td>                                     
                                        </tr>
                                        <?php }?>
                                 </tbody>
                                </table>
                            </div>
                        </div>
    </main>
<?php
include "mesajsilModal.php";
include "mesajcevapModal.php";
include "mesajgoruntuleModal.php";
include "admin/footer.php";
?>