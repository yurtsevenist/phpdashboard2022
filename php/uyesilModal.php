<!-- Modal -->
<?php
 try{
    if(isset($_POST['uyesilbtn'])) {
    include "baglan.php";
    $email=$_POST['email'];   
    $sorgu=$veritabani->prepare("SELECT * FROM users WHERE email=?");
    $sorgu->execute(array($email));
    if($sorgu->rowCount()>0)
    {
        $kayit=$veritabani->prepare("DELETE FROM users WHERE email=?");
        $kayit->execute(array($email));
      
        echo "<script>
        alert('Seçilen Kullanıcı Üyeliği Sonlandırılmıştır');
        window.location.href='uyeler.php';
        </script>";
    }
}
  

 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Hata meydana geldi : $e');
    window.location.href='uyeler.php';
    </script>";
 }

?>
<div class="modal fade" id="modalUyesil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Üye Sil</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post">
            <div class="modal-body text-center text-danger">
                <input type="text" hidden name="email" id="email" value="">
               <p id="email2"></p>
            </div>
            <div class="modal-footer">
                <button type="submit" name="uyesilbtn" class="btn btn-danger">Onayla</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>

            </div>
        </form>
        </div>
    </div>
</div>
<script>
        var uyesil = document.getElementById('modalUyesil')
        uyesil.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var email = button.getAttribute('data')        
        var modal_p = uyesil.querySelector('#email2')  
        var modal_input=uyesil.querySelector('#email')       
        modal_p.textContent = email +" isimli kullanıcı silinecek!"
        modal_input.value=email;
    })
</script>