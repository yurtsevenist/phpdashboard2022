<?php
include "admin/header.php";
include "admin/topmenu.php";
include "admin/sidemenu.php";
include "baglan.php";
$sorgu=$veritabani->prepare("SELECT * FROM users");
$sorgu->execute();
$kayitlar=$sorgu-> fetchAll(PDO::FETCH_OBJ);//object olarak verilerimizi çekiyoruz.

?>

<div id="layoutSidenav_content">
    <main>
    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Kayıtlı Üye Bilgileri
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Kullanıcı Adı</th>
                                            <th>Üye Türü</th>
                                            <th>E-Posta</th>
                                            <th>Kayıt Tarihi</th>
                                            <th>İşlemler</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kullanıcı Adı</th>
                                            <th>Üye Türü</th>
                                            <th>E-Posta</th>
                                            <th>Kayıt Tarihi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </tfoot>
                                 <tbody>
                                     <?php foreach($kayitlar as $kayit){?>
                                       <tr>
                                            <td><?=$kayit->uname?></td>
                                            <?php if($kayit->who==0){?><td>Kullanıcı</td><?php }else if($kayit->who==-1){ ?><td>Üyelik Askıda</td><?php }else{?><td>Yönetici</td><?php } ?>
                                            <td><?=$kayit->email?></td>
                                            <td><?=$kayit->rdate?></td>
                                            <td class="text-center"> <a type="button" data-bs-toggle="modal" data-bs-target="#modalUyeDuzenle" dataId="<?php echo $kayit->id?>"
                                             dataEmail="<?php echo $kayit->email ?>"  dataUname="<?php echo $kayit->uname ?>"  dataWho="<?php echo $kayit->who ?>"
                                             dataRdate="<?php echo $kayit->rdate ?>" class="btn btn-secondary" href="#"><span class="fas fa-pen" title="Düzenle"></span></a> 
                                            <!-- <a type="button" class="btn btn-dark" href="#"><span class="fas fa-eye" title="Görüntüle"></span></a> -->
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#modalUyesil" data="<?php echo $kayit->email?>" class="btn btn-danger"><span class="fas fa-trash" title="Sil"></span></a>
                                           
                                        </td>                                     
                                        </tr>
                                        <?php } ?>
                                 </tbody>
                                </table>
                            </div>
                        </div>
    </main>
 
<?php
include "uyesilModal.php";
include "uyeduzenleModal.php";
include "admin/footer.php";
?>


