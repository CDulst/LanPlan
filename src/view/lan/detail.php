
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
       <img class = "imagedata" src = "data:image/jpeg;base64,<?php
            echo $snack["Snackimage"]?>" alt="snack-image">

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

    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Games </h3>
    <?php
    foreach ($games as $game){
      ?>
       <img class = "imagedata" src = "data:image/jpeg;base64,<?php
            echo $game["GameImage"]?>" alt="game-image">

      <?php
    }
    ?>

    </div>

    <form class="form" action="index.php?page=plan&flow=games&edit=<?php echo $lan["GamesID"] ?>&id=<?php echo $_GET["id"];
    foreach ($games as $game){
      echo "&".$game["GameID"]."=true";
    }?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>

    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Systems </h3>
    <?php
    foreach ($systems as $system){
      ?>
       <img class = "imagedata" src = "data:image/jpeg;base64,<?php
            echo $system["SystemImage"]?>" alt="system-image">

      <?php
    }
    ?>

    </div>

    <form class="form" action="index.php?page=plan&flow=systems&edit=<?php echo $lan["SystemsID"] ?>&id=<?php echo $_GET["id"];
    foreach ($systems as $system){
      echo "&".$system["SystemID"]."=true";
    }?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>


  </div>
    </article>
    <section class = "section__button">
    <form onsubmit="return confirm('Do you really want to remove the lan?');" class="form" action="index.php?page=detail&id=<?php echo $_GET["id"] ?>&delete=true" method = "POST">
    <input class="input__button remove" name = "remove" type="submit" value="Remove">
    </form>
    <form  class="form" action="index.php" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Return">
    </form>
    </section>



