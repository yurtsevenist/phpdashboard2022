<?php
include "admin/header.php";
include "admin/topmenu.php";
include "admin/sidemenu.php";
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 mt-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#profil" type="button" role="tab" aria-controls="home" aria-selected="true">Profil Bilgileri</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#resim" type="button" role="tab" aria-controls="profile" aria-selected="false">Profil Resmi</button>
                        </li>

                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profil" role="tabpanel" aria-labelledby="home-tab">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="text-center font-weight-light my-4">Profil Bilgilerim</h4>
                                </div>
                                <div class="card-body">
                                    <form action="guncelle.php" method="post">
                                        <input type="text" name="id" hidden value="<?php echo $_SESSION["id"] ?>">



                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" name="uname" type="text" placeholder="" value="<?php echo $_SESSION["uname"] ?>" />
                                                    <label for="inputFirstName">Kullanıcı Adı</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" readonly name="email" type="email" value="<?php echo $_SESSION["email"] ?>" />
                                            <label for="inputEmail">E-Posta Adresi</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="oinputPassword" name="opassword" type="password" placeholder="Eski Şifrenizi giriniz" />
                                                    <label for="oinputPassword">Eski Şifre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Yeni Şifrenizi giriniz" />
                                                    <label for="inputPassword">Yeni Şifre</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" type="password" name="confirm" placeholder="Yeni Şifrenizi Tekrar Giriniz" />
                                                    <label for="inputPasswordConfirm">Şifre Tekrar</label>
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
                    </div>
                    <div class="tab-pane fade" id="resim" role="tabpanel" aria-labelledby="profile-tab">
                        <?php
                        include "profilfoto.php";
                        ?>

                    </div>


                </div>
            </div>
    </main>

    <?php
    include "admin/footer.php";
    ?>