<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>LanPlan</title>
    <?php /* NEW */ ?>
   <?php echo $css;?>
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
        <a class="logo__link" href="index.php"><h1 class="header__title">Lan plan</h1></a>
        <?php
        if (isset($_SESSION["member"])){
          ?>
        <form class="logout_form" action = "index.php">
        <input class="logout" type = "submit" name = "logout" value = "logout">
        </form>
          <?php
        }
        ?>

        <div aria-hidden="true" class="header__image__container1"><img class="header__image1" src="assets/images/circle_object.svg" alt="circle_object"></div>
        <div aria-hidden="true" class="header__image__container2"><img class="header__image2" src="assets/images/circle_object.svg" alt="circle_object"></div>
        <div aria-hidden="true" class="header__image__container3"><img class="header__image3" src="assets/images/circle_object.svg" alt="circle_object"></div>
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
