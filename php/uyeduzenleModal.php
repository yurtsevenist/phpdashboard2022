<!-- Modal -->
<?php
if(isset($_POST['submit'])) {
include "baglan.php";
$who=$_POST["who"];
$id=$_POST["id"];
echo $who;
$kayit=$veritabani->prepare('UPDATE users SET who = ? WHERE id = ?');
$kayit->execute(array($who,$id)); 
echo "<script>
window.location.href='uyeler.php';
</script>";
}

?>
<div class="modal fade" id="modalUyeDuzenle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="uname">Üye Kullanıcı Adı : ?</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post">
            <input type="text" hidden name="id" id="id" value="">
            <div class="modal-body">
            <div class="mb-3">           
            <label for="email" class="col-form-label">E-Posta Adresi:</label>
            <input readonly type="text" class="form-control" id="email">
          </div>
            <div class="mb-3">            
            <label for="recipient-name" class="col-form-label">Üyelik Türü:</label>
          
            <select class="form-select" id="who" name="who" aria-label="Default select example">                
                <option value="0">Kullanıcı</option>
                <option value="1">Yönetici</option>
                <option value="2">Süper Yönetici</option>
                <option value="-1">Üyeliği Askıya Al</option>
                </select>
          </div>          
           <p id="rdate" style="font-size: 12px;" class="text-center"></p>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-info">Güncelle</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>

            </div>
        </form>
        </div>
    </div>
</div>
<script>
        var uyeg = document.getElementById('modalUyeDuzenle')
        uyeg.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('dataId')               
        var email = button.getAttribute('dataEmail')
        var uname = button.getAttribute('dataUname')
        var who = button.getAttribute('dataWho') 
        var rdate = button.getAttribute('dataRdate')  
        var modal_id=uyeg.querySelector('#id') 
        var modal_email=uyeg.querySelector('#email') 
        var modal_uname=uyeg.querySelector('#uname')  
        var modal_who=uyeg.querySelector('#who')      
        var modal_rdate=uyeg.querySelector('#rdate')  
        modal_uname.textContent="Üye Kullanıcı Adı :" + uname     
        modal_email.value=email
        modal_who.value=who
        modal_rdate.textContent="Kayıt Tarihi: "+rdate
        modal_id.value=id;
    })
</script>