<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark"  id="sidenavAccordion" style="background-color:<?php echo $menurenk ?> !important; color:<?php echo $fontrenk ?>!important;">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Üye İşlemleri</div>
                            <a class="nav-link" href="uyeler.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Üyeler
                            </a>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-bar"></i></div>
                                Rapor
                            </a>
                            <div class="sb-sidenav-menu-heading">Mesaj İşlemleri</div>
                            <a class="nav-link" href="mesajlar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                                Mesajlar
                            </a>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Adres Defteri
                            </a>
                            <div class="sb-sidenav-menu-heading">Ayarlar</div>
                            <a class="nav-link" href="adminprofil.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                                Profil Bilgilerim
                            </a>
                             <a class="nav-link" href="modayar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                               Site Ayarları
                            </a> 
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                               Çıkış
                            </a>
                        </div>
                    </div>
                  
                    <?php if ($_SESSION["who"]==1)
                    {?>
                    <div class="sb-sidenav-footer" style="background-color:<?php echo $menurenk ?> !important; color:<?php echo $fontrenk ?>!important;">
                        <div class="small">Giriş Yapan:</div>                       
                        Yönetici                  
                    </div>
                    <?php } else if ($_SESSION["who"]==2){?>
                    <div class="sb-sidenav-footer" style="background-color:<?php echo $menurenk ?> !important; color:<?php echo $fontrenk ?>!important;">
                        <div class="small">Giriş Yapan:</div>                       
                        Süper Yönetici                  
                    </div>
                    <?php } else if ($_SESSION["who"]==3){?>
                        <div class="sb-sidenav-footer" style="background-color:<?php echo $menurenk ?> !important; color:<?php echo $fontrenk ?>!important;">
                        <div class="small">Giriş Yapan:</div>                       
                        Sitenin Sahibi
                        </div>
                    <?php }?> 
                     
                    
                    
                </nav>
               
            </div>