<!-- Modal -->
<div class="modal fade" id="settings" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
      
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-warning" id="signIn-tab" data-bs-toggle="tab" data-bs-target="#sign-in" type="button" role="tab" aria-controls="sign-in" aria-selected="true">Üye Giriş</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-info" id="signUp-tab" data-bs-toggle="tab" data-bs-target="#sign-up" type="button" role="tab" aria-controls="sign-up" aria-selected="false">Üye Ol</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-danger" id="forget-tab" data-bs-toggle="tab" data-bs-target="#forget" type="button" role="tab" aria-controls="forget" aria-selected="false">Şifremi Unuttum</button>
                        </li>
                    </ul>
               
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row justify-content-center">
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="sign-in" role="tabpanel" aria-labelledby="signIn-tab">
                        <?php include "front/login.php";?>
                    </div>
                    <div class="tab-pane fade" id="sign-up" role="tabpanel" aria-labelledby="signUp-tab">                     
                    <?php include "front/register.php";?>
                    </div>
                    <div class="tab-pane fade" id="forget" role="tabpanel" aria-labelledby="forget-tab">                     
                    <?php include "front/forget.php";?>
                    </div>


                </div>
            </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>