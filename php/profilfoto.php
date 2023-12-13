<?php
include "baglan.php";
 
if(isset($_FILES['photo'])){
      $id=$_POST["id"];
      $file_name= $_FILES['photo']['name'];
      $file_size=$_FILES['photo']['size'];
      $gecici_yol=$_FILES['photo']['tmp_name'];
      $dosya_tipi=$_FILES['photo']['type'];    
      $uzanti= array('image/jpeg','image/jpg','image/png');
      $sorgu=$veritabani->prepare("SELECT * FROM users WHERE id=?");
      $sorgu->execute(array($id)); 
      foreach($sorgu as $s)
      {
          $uname=$s["uname"];
      } 
      $tmp = explode('.', $file_name);
      $dosya_uzanti = end($tmp);        
      $yeniad=$uname.".".$dosya_uzanti;
      //glob ("usersfoto/".$uname.".*");
      if (file_exists("usersfoto/".$yeniad)) 
      {
        unlink("usersfoto/".$yeniad);
      }
      if(in_array(strtolower($_FILES['photo']['type']),$uzanti)){       
        if(move_uploaded_file($gecici_yol,"usersfoto/".$yeniad))
        {
            $yol="usersfoto/".$yeniad;           
            $kayit=$veritabani->prepare("UPDATE users SET photo=? where id=?");
            $kayit->execute(array($yol,$id));
            $sorgu=$veritabani->prepare("SELECT * FROM users WHERE id=?");
            $sorgu->execute(array($id)); 
            foreach($sorgu as $s)
            {
                $_SESSION["photo"]=$s["photo"];

            }
            echo "<script>           
            window.location.href='adminprofil.php';
            </script>";
        }

        
      }
      else
      {
        echo "<script>
        alert('Seçtiğiniz dosya türü uygun değil');
        window.location.href='adminprofil.php';
        </script>";
      }
      
   
      
   
   }
?>


<div class="col-lg-8 offset-lg-2 card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header bg-primary text-white">
                            <h4 class="text-center font-weight-light my-4">Profil Fotoğrafı</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" name="id" hidden value="<?php echo $_SESSION["id"] ?>">
                               
                                     <div class="col-lg-12">
                                        <!-- Uploaded image area-->                                        
                                        <div class="image-area">
                                        <?php if($_SESSION["photo"]==null){?>
                                                <?php if($_SESSION["gender"]=="M"){ ?>
                                                    <img id="imageResult"   src="usersfoto/male.png" alt="" width="100" height="100" class="img-fluid rounded-circle shadow-sm mx-auto d-block">
                                                <?php } else {?>
                                                    <img id="imageResult"   src="usersfoto/female.png" alt="" width="100" height="100" class="img-fluid rounded-circle shadow-sm mx-auto d-block">
                                                <?php } ?>    
                                            <?php }else { ?>
                                                <img id="imageResult"   src="<?php echo $_SESSION["photo"] ?>" alt="" width="100" height="100" class="img-fluid rounded-circle shadow-sm mx-auto d-block">
                                            <?php } ?>
                                           
                                        </div>
                                        <!-- Upload image input-->
                                        <div class="input-group mb-3 px-2 py-2 border border-muted bg-white shadow-sm">
                                            <input id="upload" name="photo" type="file" onchange="readURL(this);" class="form-control border-0">
                                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Resim Seç</label>
                                            <div class="input-group-append">
                                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload-alt mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Resim Seç</small></label>
                                            </div>
                                        </div>
                                    </div> 
                              
                             
                                
                             
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Güncelle</button></div>
                                </div>
                            </form>
                        </div>

                    </div>
  </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function() {
            $('#upload').on('change', function() {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);

        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
  