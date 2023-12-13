<?php
session_start();
if($_SESSION["oturum"]!="yonetici")
{
    session_destroy();
    session_unset();
    unset($_SESSION['oturum']);
    header("Location:../login.html");
}
else
{
  include "baglan.php";
  $durum=1;
  $mods=$veritabani->prepare("SELECT * FROM mods WHERE durum=?");
  $mods->execute(array($durum));
  if($mods->rowCount()>0)
  {
  $durum=1;
  $mods=$veritabani->prepare("SELECT * FROM mods WHERE durum=?");
  $mods->execute(array($durum));
  foreach($mods as $mod)
  {
      $modname=$mod["modname"];
      if($mod["yer"]=="menu")
      {
          $menurenk=$mod["color"];
      }
      if($mod["yer"]=="font")
      {
          $fontrenk=$mod["color"];
      }
  }
}
else
{
    $durum=1;
    $modname="gece";
    $kayit=$veritabani->prepare('UPDATE mods SET durum = ? WHERE modname = ?');
    $kayit->execute(array($durum,$modname));    
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $_SESSION["uname"]?>-Yönetici Sayfası</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="adminstyle.css">
        <?php if($_SESSION["photo"]==null){?>
                <?php if($_SESSION["gender"]=="M"){ ?>
                    <link rel="shortcut icon" href="usersfoto/male.png" type="image/x-icon">
                <?php } else {?>
                    <link rel="shortcut icon" href="usersfoto/female.png" type="image/x-icon">
                <?php } ?>    
            <?php }else { ?>
                <link rel="shortcut icon" href="<?php echo $_SESSION["photo"] ?>" type="image/x-icon">
            
        <?php } ?>
        <link rel="shortcut icon" href="../Logos/My-İmages.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../tema/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>