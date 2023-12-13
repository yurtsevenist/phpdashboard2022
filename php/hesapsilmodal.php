<!-- Modal -->
<div class="modal fade" id="modalHesapsil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Hesap Sil</h5>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $_SESSION["uname"]?> isimli kullanıcı hesabınız silinecek, eminmisiniz ?
      </div>
      <div class="modal-footer">
         <a type="button" href="hesapsil.php?kid=<?=$_SESSION["id"]?>" class="btn btn-danger">Onayla</a>
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
        
      </div>
    </div>
  </div>
</div>