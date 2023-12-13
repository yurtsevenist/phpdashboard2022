<!-- Modal -->
<?php
 try{
    if(isset($_POST['mesajsilbtn'])) {
    include "baglan.php";
    $id=$_POST['id'];   
    $sorgu=$veritabani->prepare("SELECT * FROM mesajlar WHERE id=?");
    $sorgu->execute(array($id));
    if($sorgu->rowCount()>0)
    {
        $kayit=$veritabani->prepare("DELETE FROM mesajlar WHERE id=?");
        $kayit->execute(array($id));
      
        echo "<script>
       
        
        window.location.href='mesajlar.php';
        </script>";
    }
}
  

 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Hata meydana geldi : $e');
    window.location.href='mesajlar.php';
    </script>";
 }

?>
<div class="modal fade" id="modalMesajsil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Mesaj Sil</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body text-center text-danger">
                <input type="text" hidden name="id" id="id" value="">
                <p id="bilgi"></p>
            </div>
            <div class="modal-footer">
                <button type="submit" name="mesajsilbtn" class="btn btn-danger">Onayla</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>

            </div>
        </form>
        </div>
    </div>
</div>
<script>
        var mesajsil = document.getElementById('modalMesajsil')
        mesajsil.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('id') 
        var konu = button.getAttribute('konu')        
        var email = button.getAttribute('email') 
        var modal_input=mesajsil.querySelector('#id') 
        var modal_p=mesajsil.querySelector('#bilgi')       
        modal_p.textContent = email +" isimli kullanıcıdan gelen " + konu + "  konusundaki mesaj silinecektir!"
        modal_input.value=id;
    })
</script>