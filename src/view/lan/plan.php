     <?php
     if ($_GET["flow"] == "name"){
     ?>
    <section class="label">
        <form class="form" action="index.php?page=plan&flow=date" method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name">Choose a name for the party</label>
            <input class=" input input__name" type="text" name = "name" placeholder="A wicked lan party">
            </div>
            <p class="info">Creative choice</p>
            <input class="input__button" type="submit" value="Next">
        </form>
    </section>
    <?php
         }
    if ($_GET["flow"] == "date"){

  ?>

    <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>


    <section class="label">
        <form class="form" action="index.php?page=plan&flow=location" method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name">Choose a Date for the party</label>
            <input class=" input input__name" type="date">
            </div>
            <p class="info">The perfect date for a perfect party</p>
            <input class="input__button" name = "date" type="submit" value="Next">
        </form>
    </section>
    <?php
    }
    if ($_GET["flow"] == "location"){

    ?>

<section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>


    <section class="label">
        <form class="form" action="index.php" method = "POST">
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





