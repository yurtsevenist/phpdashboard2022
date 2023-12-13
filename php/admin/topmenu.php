<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:<?php echo $menurenk ?> !important; color:<?php echo $fontrenk ?>!important;">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="adminprofil.php">
            <?php if ($_SESSION["photo"] == null) { ?>
                <?php if ($_SESSION["gender"] == "M") { ?>
                    <img src="usersfoto/male.png" class="rounded-circle" alt="" width="40">
                <?php } else { ?>
                    <img src="usersfoto/female.png" class="rounded-circle" alt="" width="40">
                <?php } ?>
            <?php } else { ?>
                <img src="<?php echo $_SESSION["photo"] ?>" class="rounded-circle" alt="" width="40">
            <?php } ?>
            <?php echo $_SESSION["uname"] ?></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="adminprofil.php">Profil Bilgilerim</a></li>
                    <!-- <li><a class="dropdown-item" href="#!">Activity Log</a></li> -->
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Çıkış</a></li>
                </ul>

            </li>       
         </ul>
         <ul class="form-check form-switch navbar-nav ms-3">
                <input class="form-check-input" type="checkbox" role="switch" id="toggle-event" <?php if ($modname == "gunduz") { ?>checked title="Aktif Mod:Gündüz" <?php } else { ?> unchecked title="Aktif Mod:Gece" <?php } ?>>
         </ul>

            <script>
                $(function() {
                    $('#toggle-event').change(function() {
                        if ($(this).prop('checked') == true) {
                            data = "gunduz";

                        } else {
                            data = "gece";
                        }
                        console.log(data);
                        $.ajax({
                            type: 'POST',
                            url: 'mod.php', //işlem yaptığımız sayfayı belirtiyoruz
                            data: {
                                data: data
                            }, //datamızı yolluyoruz
                            success: function(result) {
                                setTimeout(function() {
                                    location.reload();
                                }, 100);
                            },
                            error: function() {
                                alert('Hata');
                            }
                        });

                    })
                })
            </script>
    </nav>