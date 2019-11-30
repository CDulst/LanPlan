
<section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>
<article class = "detail">
    <h2 class = "dashboard__title detail__title"> Lan party overview</h2>
    <div class = "detail__wrapper">
    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Name: </h3>
    <p class = "section__para"> <?php echo $lan["Name"]?></p>
    </div>
    <form class="form" action="index.php?page=plan&flow=name&edit=<?php echo $lan["Name"] ?>&id=<?php echo $_GET["id"] ?>" method = "POST">
    <input class="input__button" name = "edit" type="submit" value="Edit">
    </form>
    </section>

     <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Date:</h3>
    <p class = "section__para"> <?php echo $lan["Date"]?></p>
    </div>
    <form class="form" action="index.php?page=plan&flow=date&edit=<?php echo $lan["Date"] ?>&id=<?php echo $_GET["id"] ?>" method = "POST">
    <input class="input__button" name = "edit" type="submit" value="Edit">
    </form>
    </section>

     <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Location </h3>
    <p class = "section__para"> <?php echo $location["Street"]." ".$location["Streetnumber"]." ".$location["Postal number"]." ".$location["City"]?></p>
    </div>
    <form class="form" action="index.php?page=plan&flow=location&edit=<?php echo $lan["LocationID"] ?>&street=<?php echo $location["Street"] ?>&streetnumber=<?php echo $location["Streetnumber"] ?>&postalnumber=<?php echo $location["Postal number"] ?>&city=<?php echo $location["City"] ?>&id=<?php echo $_GET["id"] ?>" method = "POST">
    <input class="input__button" name = "edit" type="submit" value="Edit">
    </form>
    </section>
    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Snacks </h3>
    <?php
    foreach ($snacks as $snack){
      ?>
       <img src = "data:image/jpeg;base64,<?php
            $encoded_image = base64_encode($snack["Snackimage"]);
            echo $encoded_image?>">
      <?php
    }
    ?>

    </div>

    <form class="form" action="index.php?page=plan&flow=snacks&edit=<?php echo $lan["SnacksID"] ?>&id=<?php echo $_GET["id"];
    foreach ($snacks as $snack){
      echo "&".$snack["Snackid"]."=true";
    }?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>

  </div>
    </article>
    <section class = "section__button">
    <form class="form" action="index.php" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Return">
    </form>
    </section>



