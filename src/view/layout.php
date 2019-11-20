<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>LanPlan</title>
    <?php /* NEW */ ?>
    <?php echo $css;?>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ape8ojm.css">
  </head>
  <div class="body__wrapper">
  <body class="body">

    <main>
      <?php
        if(!empty($_SESSION['error'])) {
          echo '<div class="error box">' . $_SESSION['error'] . '</div>';
        }
        if(!empty($_SESSION['info'])) {
          echo '<div class="info box">' . $_SESSION['info'] . '</div>';
        }
      ?>

    <header class="header">
        <h1 class="header__title">Lan plan</h1>
        <div class="header__image__container1"><img class="header__image1" src="../src/assets/images/circle_object.svg" alt="circle_object"></div>
        <div class="header__image__container2"><img class="header__image2" src="../src/assets/images/circle_object.svg" alt="circle_object"></div>
        <div class="header__image__container3"><img class="header__image3" src="../src/assets/images/circle_object.svg" alt="circle_object"></div>
    </header>

    <?php echo $content;?>

    <footer class="footer">
        <p class="footer__text">Lan Plan</p>
    </footer>
    </main>
    <?php echo $js; ?>

  </body>
  </div>


</html>
