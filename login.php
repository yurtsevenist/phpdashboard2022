<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuna</title>
    <!-- Custom Favicon Link -->
    <link rel="shortcut icon" href="Logos/My-İmagesMy-İmages.jpg" type="image/x-icon">
    <!-- custom css/js file link -->
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
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
                        <a class="navbar-brand" href="index.php"><span class="navbar-brand-text1">TU</span><span
                                class="navbar-brand-text2">NA</span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">Anasayfa</a>
                                </li>
                               
                            </ul>
                            <div class="d-flex">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <button class="btn btn-outline-dark" type="submit"><img
                                                        src="İcon/profile-user.png" width="20px"
                                                        class="rounded mx-auto d-block" alt="..."></button>
                                            </a>
                                            <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item text-info" href="login.php">Giriş-Yap</a>
                                                </li>
                                                <li><a class="dropdown-item text-primary"
                                                        href="register.php">Kayıt-Ol</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <section class="yüzvh">
                <div class="col-md-6 offset-md-3">
                    <form action="php/giris.php" method="post" class="box">
                        <h1 class="title">GİRİŞ</h1>
                        <input type="text" name="uname" required placeholder="Kullanıcı-Adı">
                        <input type="text"  name="password" required placeholder="Şifre">
                        <input type="submit" name="" value="Giriş">
                        <p><a href="forget.php"><code>Şifremi Unuttum?</code></a></p>
                        <div class="footer-social-media text-center">
                            <a href="https://www.instagram.com/tunasahnx/" class="fa fa-instagram"></a>
                            <a href="mailto:h.tunasahin@gmail.com" class="fa fa-google"></a>
                            <a href="#" class="fa fa-snapchat-ghost"></a>
                        </div>
                    </form>
                </div>
            </section>
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