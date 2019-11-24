     <?php
     if ($_GET["flow"] == "name"){
     ?>
    <section class="label">
        <form class="form" action=<?php if (isset($_POST["edit"])){
              echo "index.php?page=detail&id=".$_GET["id"];
            }
            else{
              echo "index.php?page=plan&flow=date";
            }
            ?> method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"> <?php if (isset($_POST["edit"])){
              echo "Change the name of";
            }
            else{
              echo "Choose a name for";
            }
            ?> the party</label>
            <input class=" input input__name" type="text" name = "name" placeholder=
            "<?php if (isset($_POST["edit"])){
              echo $_GET["edit"];
            }
            else{
              echo "A wicked lan party";
            }
            ?>">
            </div>
            <p class="info">Creative choice</p>
            <input class="input__button" type="submit" value=
            <?php if (isset($_POST["edit"])){
              echo "Change";
            }
            else{
              echo "Next";
            }
            ?>>
        </form>
    </section>
    <?php
         }
    if ($_GET["flow"] == "date"){
      $_SESSION["name"] = $_POST["name"];
  ?>

    <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>

    <section class="label">
        <form class="form" action="index.php?page=plan&flow=location" method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name">Choose a Date for the party</label>
            <input class=" input input__name" name = "date" type="date">
            </div>
            <p class="info">The perfect date for a perfect party</p>
            <input class="input__button" type="submit" value="Next">
        </form>
    </section>
    <?php
    }
    if ($_GET["flow"] == "location"){
      $_SESSION["date"] = $_POST["date"];
    ?>

<section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>


    <section class="label">
        <form class="form" action="index.php?page=plan&flow=overview" method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name">Choose a Location for the party</label>
            <br>
            <br>
            <label class="labelForm" for="name">Street</label>
            <input class=" input input__name" type="text" name = "street">
            <label class="labelForm" for="name">Number</label>
            <input class=" input input__name" type="text" name = "number">
            <label class="labelForm" for="name">City</label>
            <input class=" input input__name" type="text" name = "city">
            <label class="labelForm" for="name">Postal Number</label>
            <input class=" input input__name" type="text" name = "postalnumber">
            </div>
            <p class="info">The perfect date for a perfect party</p>
            <input class="input__button" type="submit" value="Next">
        </form>
    </section>
    <?php
    }
    if ($_GET["flow"] == "overview")
    {
      $_SESSION["street"] = $_POST["street"];
      $_SESSION["number"] = $_POST["number"];
      $_SESSION["postalnumber"] = $_POST["postalnumber"];
      $_SESSION["city"] = $_POST["city"];

    ?>
    <article class = "detail">
    <h2 class = "dashboard__title detail__title"> Lan party overview</h2>
    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Name: </h3>
    <p class = "section__para"> <?php echo $_SESSION["name"] ?> </p>
    </div>
    <a class = "section__link" href="">edit</a>
    </section>
    <img class = "section__seperator" src="./assets/images/Seperation.svg" alt="">
     <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Date:</h3>
    <p class = "section__para"> <?php echo $_SESSION["date"] ?>  </p>
    </div>
    <a class = "section__link" href="">edit</a>
    </section>
    <img class = "section__seperator" src="./assets/images/Seperation.svg" alt="">
     <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Location </h3>
    <p class = "section__para"> <?php echo $_POST["street"]. " ".$_POST["number"]." ".$_POST["postalnumber"]." ".$_POST["city"] ?> </p>
    </div>
    <a class = "section__link" href="">edit</a>
    </section>
    <img class = "section__seperator" src="./assets/images/Seperation.svg" alt="">
    <form class="form" action="index.php?page=plan&flow=finished" method = "POST">
            <input class="input__button" type="submit" value="Create Lan">
        </form>

    </article>
    <?php
    }
    if ($_GET["flow"] == "finished"){
    ?>
    <section class="label">
        <form class="form" action="index.php" method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name">Lanparty has been added!</label>
            <img class="section__right__image" src="assets/images/victoryRoyale.svg" alt="">
            <input class="input__button" type="submit" value="Next">
        </form>
    </section>
    <?php
    }
    ?>





