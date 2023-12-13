<!-- Modal -->
<?php
   if(isset($_POST['mesajokubtn'])) {
include "baglan.php";
$id=$_POST["id"];
$sorgu=$veritabani->prepare("SELECT * FROM mesajlar WHERE id=?");
$sorgu->execute(array($id));

if($sorgu->rowCount()>0)
{
    foreach($sorgu as $satir)
    {       
        $email=$satir["email"]; 
        $durum=$satir["durum"];
                       
    }
    if($durum==2)
    {
        $drm=2;
    }
    else
    {
        $drm=1;
    }
    $kayit=$veritabani->prepare('UPDATE mesajlar SET durum = ? WHERE id = ?');
    $kayit->execute(array($drm,$id));
    echo "<script>  
    window.location.href='mesajlar.php';
    </script>";
}
   }
?>
<div class="modal fade" id="modalMesajGoruntule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="email">Mesaj Gönderen : ?</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
            <div class="mb-3">
            <input type="text" hidden name="id" id="id" value="">
            <label for="recipient-name" class="col-form-label">Konu:</label>
            <input readonly type="text" class="form-control" id="konu">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Mesaj:</label>
            <textarea readonly class="form-control" id="metin"></textarea>
          </div>
           <p id="kdate" style="font-size: 12px;" class="text-center"></p>
            </div>
            <div class="modal-footer">
                <button type="submit" name="mesajokubtn" class="btn btn-dark">Görüldü At</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>

            </div>
        </form>
        </div>
    </div>
</div>
<script>
        var mesajg = document.getElementById('modalMesajGoruntule')
        mesajg.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('id') 
        var konu = button.getAttribute('konu')        
        var email = button.getAttribute('email')
        var metin = button.getAttribute('metin') 
        var kdate = button.getAttribute('kdate')  
        var modal_id=mesajg.querySelector('#id') 
        var modal_email=mesajg.querySelector('#email') 
        var modal_konu=mesajg.querySelector('#konu')
        var modal_metin=mesajg.querySelector('#metin') 
        var modal_kdate=mesajg.querySelector('#kdate')  
        modal_email.textContent="Mesaj Gönderen :" + email     
        modal_konu.value=konu
        modal_metin.value=metin
        modal_kdate.textContent="Gönderilme Tarihi: "+kdate
        modal_id.value=id;
    })
</script>