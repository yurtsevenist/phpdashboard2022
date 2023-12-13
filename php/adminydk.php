<?php
session_start();
if($_SESSION["oturum"]!="yonetici")
{
    session_destroy();
    session_unset();
    unset($_SESSION['oturum']);
    header("Location:../login.html");
}


?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuna</title>
    <!-- Custom Favicon Link -->
    <link rel="shortcut icon" href="../Logos/My-İmages.png" type="image/x-icon">
    <!-- custom css/js file link -->
    <script src="../script.js"></script>
    <link rel="stylesheet" href="../style.css">
    <!-- Bt css/js file link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- Footer Social Media File Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Menü Fixing Sript -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    $('.menu').addClass('sabitleme');
                } else {
                    $('.menu').removeClass('sabitleme');
                }
            });
        });

    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <header class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded bg-opacity-50">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.html"><span class="navbar-brand-text1">TU</span><span
                                class="navbar-brand-text2">NA</span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.html">Anasayfa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Hakkımda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html">Hobilerim</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Blog
                                    </a>
                                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item text-white" href="#">Gün 1</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled">Siteme Hoş Geldiniz . . .</a>
                                </li>
                            </ul>
                            <div class="d-flex">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <button class="btn btn-outline-dark" type="submit"><img
                                                        src="../İcon/profile-user.png" width="20px"
                                                        class="rounded mx-auto d-block" alt="..."></button>
                                            </a>
                                            <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                                <li><button class="dropdown-item text-info" onclick="location.href='logout.php'">Çıkış Yap</button>
                                                </li>                                              
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
           
              <div class="col-md-12 mt-5 text-white text-center" style="margin-top: 20%;">
                  <h1>BURASI YÖNETİCİ SAYFASI</h1>
              </div>
            <footer class="col-md-12 mb-4 mt-5 login-register-footer">
                <div class="my-footer">
                    <div class="footer-text">
                        <p class="text-muthed"><span class="footer-copy-text">Copyright © </span><a
                                href="https://tuna.ihmtal.com"
                                style="text-decoration: none; color: gray;">tuna.ihmtal.com</a> </p>
                    </div>
                    <div class="footer-social-media text-center">
                        <a href="https://www.instagram.com/tunasahnx/" class="fa fa-instagram"></a>
                        <a href="mailto:h.tunasahin@gmail.com" class="fa fa-google"></a>
                        <a href="#" class="fa fa-snapchat-ghost"></a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>