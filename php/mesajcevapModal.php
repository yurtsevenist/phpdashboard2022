<!-- Modal -->
<!-- Modal -->
<?php
if(isset($_POST['mesajcevapbtn'])) {
include "baglan.php";
$cevap=$_POST["cevap"];
$who=$_POST["semail"];//semail oturum açan kişin mail adresini belirtir
echo $who;
$id=$_POST["id"];
$sorgu=$veritabani->prepare("SELECT * FROM mesajlar WHERE id=?");
$sorgu->execute(array($id));
if($sorgu->rowCount()>0)
{
    foreach($sorgu as $satir)
    {       
        $email=$satir["email"]; 
       
                       
    }
  

    $durum=2;
    $kayit=$veritabani->prepare('UPDATE mesajlar SET durum = ? WHERE id = ?');
    $kayit->execute(array($durum,$id));
    $kayit=$veritabani->prepare("INSERT INTO cevaplar SET mesaj_id=?, who=?,email=?,cevap=?");
    $kayit->execute(array($id,$who,$email,$cevap));     
    require "PHPMailer/inc/class.phpmailer.php"; // PHPMailer dosyamızı çağırıyoruz  
                
    $mail = new PHPMailer();   
    $mail->SMTPKeepAlive = true;   
    $mail->Mailer = "smtp"; // don't change the quotes!
    $mail->IsSMTP();
    $mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
    $mail->Host = "mail.ihmtal.com"; // Mail sunucusuna ismi
    $mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
    $mail->IsHTML(true);
    $mail->SetLanguage("tr", "phpmailer/language");
    $mail->CharSet  ="utf-8";
    $mail->Username = "info@ihmtal.com"; // Mail adresimizin kullanicı adi
    $mail->Password = "onbira4848"; // Mail adresimizin sifresi
    $mail->SetFrom("info@ihmtal.com", "İhsan Mermerci Web Grubu"); // Mail attigimizda gorulecek ismimiz
    $mail->AddAddress($email); // Maili gonderecegimiz kisi yani alici
    $mail->Subject = "Mesajınıza Cevap Verilmiştir"; // Konu basligi
    $mail->Body = $cevap; // Mailin icerigi
    if(!$mail->Send()){
        echo "<script>
            alert('$mail->ErrorInfo');
            window.location.href='mesajlar.php';
            </script>";
    
    } else {
        echo "<script>
            alert('E-Posta Gönderildi');
            window.location.href='mesajlar.php';
            </script>";
    }
    $mail->ClearAddresses();
    $mail->ClearAttachments();
}
}
?>
<div class="modal fade" id="modalMesajCevap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="email">Mesaj Gönderen : ?</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
            <div class="mb-3">
            <input type="text" hidden name="id" id="id" value="">
             <p style="font-weight: bold;" id="konu"></p>
             <hr>
             <p id="metin"></p>
             <br>
             <hr>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Cevap:</label>
             <input type="text" hidden name="semail" value="<?php echo $_SESSION["email"]?>"> <!--buradaki semail oturum açan kişinin mail adresidir  -->
            <textarea class="form-control" id="cevap" name="cevap"></textarea>
          </div>          
            </div>
            <div class="modal-footer">
                <button type="submit" name="mesajcevapbtn" class="btn btn-primary">Cevapla</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>

            </div>
        </form>
        </div>
    </div>
</div>
<script>
        var mesajc = document.getElementById('modalMesajCevap')
        mesajc.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var id = button.getAttribute('id') 
        var konu = button.getAttribute('konu')        
        var email = button.getAttribute('email')
        var metin = button.getAttribute('metin')        
        var modal_id=mesajc.querySelector('#id') 
        var modal_email=mesajc.querySelector('#email') 
        var modal_konu=mesajc.querySelector('#konu')
        var modal_metin=mesajc.querySelector('#metin')           
        modal_email.textContent="Mesaj Gönderen :" + email     
        modal_konu.textContent=konu
        modal_metin.textContent=metin    
        modal_id.value=id;
    })
</script>

