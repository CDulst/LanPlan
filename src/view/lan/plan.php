     <?php
     if ($_GET["flow"] == "name"){
     ?>
       <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>
    <section class="label">
        <form class="form" action=<?php if (isset($_POST["edit"])){
              echo "index.php?page=detail&id=".$_GET["id"];
            }
            else if (isset($_POST["return"])){
              echo "index.php?page=plan&flow=overview";
            }
            else{
              echo "index.php?page=plan&flow=date";
            }
            ?> method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"> <?php if (isset($_POST["edit"]) || isset($_POST["return"]) ){
              echo "Change the name of";
            }
            else{
              echo "Choose a name for";
            }
            ?> the party</label>
            <p id = "name" class="error"></p>
            <input id = "name" class=" input input__name" type="text" name = "name" placeholder=
            "a wicked lan party" <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo "value = '".$_GET["edit"]."'";
            }

            ?>required>
            </div>
            <p class="info feedback">Creative choice</p>

            <input class="input__button" type="submit" value=
            <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
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
      if (empty($_GET["edit"]) && !isset($_POST["return"])){
        if (!empty($_POST["name"])){
          $_SESSION["name"] = $_POST["name"];
        }


      }
  ?>

    <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>

    <section class="label">
        <form class="form" action=<?php if (isset($_POST["edit"])){
              echo "index.php?page=detail&id=".$_GET["id"];
            }
            else if (isset($_POST["return"])){
              echo "index.php?page=plan&flow=overview";
            }
            else{
              echo "index.php?page=plan&flow=location";
            }
            ?> method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"><?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo "Change the date of the party";
            }
            else{
              echo "Choose the date of the party";
            }
            ?> </label>
            <p id = "date" class="error"></p>
            <input id = "date" required  class=" input input__name" name = "date" type="date" value=<?php
            if (isset($_GET["edit"]) || isset($_POST["return"])){
              echo $_GET["edit"];
            }
            if (isset($_GET["error"])){
              echo $_GET["error"];
            }
            ?>
            >
            </div>
            <?php
            if (!empty($_GET["error"])){
              ?>
              <p class="info infoerror">Date has already passed</p>
              <?php
            }
            ?>

            <p class="info feedback">The perfect date for a perfect party <img src="/assets/images/aprove.svg"alt=""></p>
            <input class="input input__button" type="submit" value= <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
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
    if ($_GET["flow"] == "location"){
      if (empty($_GET["edit"]) && !isset($_POST["return"])
      ){
        $_SESSION["date"] = $_POST["date"];
        }
    ?>

<section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>


    <section class="label">
        <form class="form" action=<?php if (isset($_POST["edit"])){
              echo "index.php?page=detail&id=".$_GET["id"];
            }
            else if (isset($_GET["street"])){
              echo "index.php?page=plan&flow=overview";
            }
            else{
              echo "index.php?page=plan&flow=snacks";
            }
            ?> method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"><?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo "Change the location of the party";
            }
            else{
              echo "Choose the location of the party";
            }
            ?></label>
            <br>
            <br>
            <label class="labelForm" for="name">Street</label>
            <p id = "errorstreet" class="error"></p>
            <input id = "errorstreet" required class=" input input__name" type="text" name = "street" placeholder= "Helheim" value = <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo $_GET["street"];
            }
            ?>>
            <label class="labelForm" for="name">Streetnumber</label>
            <p id = "errorstreetnumber" class="error"></p>
            <input id = "errorstreetnumber" required class=" input input__name" type="text" name = "number" placeholder= "69" value = <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo $_GET["streetnumber"];
            }
            ?>>
            <label class="labelForm" for="name">City</label>
            <p id = "errorcity" class="error"></p>
            <input  id = "errorcity" required class=" input input__name" type="text" name = "city" placeholder= "Skyrim" value = <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo $_GET["city"];
            }
            ?>>
            <label class="labelForm" for="name">Postal Number</label>
            <p id = "errorpostalnumber" class="error"></p>
            <input required id = "errorpostalnumber" class=" input input__name" type="text" name = "postalnumber" placeholder="3000" value = <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo $_GET["postalnumber"];
            }
            ?>>
            </div>
            <p class="info feedback">The perfect date for a perfect party</p>
            <input required class="input__button" type="submit" value="<?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo "Change";
            }
            else{
              echo "Next";
            }
            ?>">
        </form>
    </section>
    <?php
         }
    if ($_GET["flow"] == "snacks"){
      if (empty($_GET["edit"]) && !isset($_POST["return"])){
        if (!empty($_POST["street"])){
          $_SESSION["street"] = $_POST["street"];
          $_SESSION["number"] = $_POST["number"];
          $_SESSION["postalnumber"] = $_POST["postalnumber"];
          $_SESSION["city"] = $_POST["city"];
        }
      }
  ?>

    <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>
    <section class="label">
        <form class="form" action=<?php if (isset($_GET["edit"])){
              echo "index.php?page=detail&id=".$_GET["id"]."&edit=".$_GET["edit"];
            }
            else if (isset($_POST["return"])){
              echo "index.php?page=plan&flow=overview";
            }
            else{
              echo "index.php?page=plan&flow=games";
            }
            ?> method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"><?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo "Select snacks for the lan-party";
            }
            else{
              echo "Select snacks for the lan-party ";
            }
            ?> </label>
          <div class = "snacks__wrappers">
            <?php
            foreach($snacks as $snack){
              ?>
            <div class = "snacks__wrapper">
            <input id = "<?php echo $snack["Snackname"]?>"  class=" input__check " name = "snack[]" value = "<?php echo $snack["Snackid"] ?>" type="checkbox" <?php
            if (isset($_GET[$snack["Snackid"]])){
              echo "checked";
            }?>>
            <label class = "labelcheckbox" id = "<?php echo $snack["Snackname"]?>" for = "<?php echo $snack["Snackname"]?>">
            <label class="smallerlabel" for="name"><?php echo $snack["Snackname"]?></label>
            <img class = "datasnacks imagedata"  src = "data:image/png;base64,<?php
            echo $snack["Snackimage"]?>
            ">
            </label>



          </div>


          <?php
            }
            ?>
            </div>

          </div>
          <p class = "addpara"><a class = "addpara__link" href = "index.php?page=add&flow=snacks"> Can't find the snack your looking for ? </a></p>


            <?php
            if (!empty($_GET["error"])){
              ?>
              <p class="info infoerror">please select atleast 1 item </p>
              <?php
            }
            ?>

            <p class="info feedback">Delicious snacks <img src="/assets/images/aprove.svg"alt=""></p>
            <input class="input input__button" type="submit" value= <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
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
    if ($_GET["flow"] == "games"){
      if (empty($_GET["edit"]) && !isset($_POST["return"])){
        if (!empty($_POST["snack"])){
          $_SESSION["snack"] = $snacks;
        }
        else
        {
          $_SESSION["snack"] = "";
        }
      }
  ?>

    <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>

    <section class="label">
        <form class="form" action=<?php if (isset($_GET["edit"])){
              echo "index.php?page=detail&id=".$_GET["id"]."&edit=".$_GET["edit"];
            }
            else if (isset($_POST["return"])){
              echo "index.php?page=plan&flow=overview";
            }
            else{
              echo "index.php?page=plan&flow=systems";
            }
            ?> method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"><?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo "Select games for the lan-party";
            }
            else{
              echo "Select games for the lan-party ";
            }
            ?> </label>
            <div class = "snacks__wrappers">
            <?php
            foreach($games as $game){
              ?>
            <div class = "snacks__wrapper">
            <input id = "<?php echo $game["GameName"]?>"  class=" input__check " name = "game[]" value = "<?php echo $game["GameID"] ?>" type="checkbox" <?php
            if (isset($_GET[$game["GameID"]])){
              echo "checked";
            }?>>
            <label class = "labelcheckbox" id = "<?php echo $game["GameName"]?>" for = "<?php echo $game["GameName"]?>">
            <label class="smallerlabel" for="name"><?php echo $game["GameName"]?></label>
            <img class = "gameimage imagedata" src = "data:image/jpeg;base64,<?php
             echo $game["GameImage"]?>">

            </label>
          </div>

          <?php
            }
            ?>

            </div>
            <p class = "addpara"><a class = "addpara__link" href = "index.php?page=add&flow=games"> Can't find the game your looking for ? </a></p>
          </div>

            <?php
            if (!empty($_GET["error"])){
              ?>
              <p class="info infoerror">........</p>
              <?php
            }
            ?>

            <p class="info feedback">nice games <img src="/assets/images/aprove.svg"alt=""></p>
            <input class="input input__button" type="submit" value= <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
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
    if ($_GET["flow"] == "systems"){
      if (empty($_GET["edit"]) && !isset($_POST["return"])){
        if (!empty($_POST["game"])){
          $_SESSION["game"] = $games;
        }
        else
        {
          $_SESSION["game"] = "";
        }
      }
  ?>

    <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>

    <section class="label">
        <form class="form" action=<?php if (isset($_GET["edit"])){
              echo "index.php?page=detail&id=".$_GET["id"]."&edit=".$_GET["edit"];
            }
            else if (isset($_POST["return"])){
              echo "index.php?page=plan&flow=overview";
            }
            else{
              echo "index.php?page=plan&flow=overview";
            }
            ?> method = "POST">
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"><?php if (isset($_POST["edit"]) || isset($_POST["return"])){
              echo "select systems for the lan-party";
            }
            else{
              echo "select Systems for the lan-party ";
            }
            ?> </label>
            <div class = "snacks__wrappers">
            <?php
            foreach($systems as $system){
              ?>
            <div class = "snacks__wrapper">


            <input id = "<?php echo $system["SystemName"]?>"  class=" input__check " name = "system[]" value = "<?php echo $system["SystemID"] ?>" type="checkbox" <?php
            if (isset($_GET[$system["SystemID"]])){
              echo "checked";
            }?>>
             <label class = "labelcheckbox" id = "<?php echo $system["SystemName"]?>" for = "<?php echo $system["SystemName"]?>">
            <label class="smallerlabel" for="name"><?php echo $system["SystemName"]?></label>
            <img class = "gameimage imagedata" src = "data:image/jpeg;base64,<?php
           echo $system["SystemImage"];
            ?>">
            </label>
          </div>

          <?php
            }
            ?>
            </div>

          </div>
          <p class = "addpara"><a class = "addpara__link" href = "index.php?page=add&flow=systems"> Can't find the system your looking for ? </a></p>
            <?php
            if (!empty($_GET["error"])){
              ?>
              <p class="info infoerror">........</p>
              <?php
            }
            ?>

            <p class="info feedback">nice games <img src="/assets/images/aprove.svg"alt=""></p>
            <input class="input input__button" type="submit" value= <?php if (isset($_POST["edit"]) || isset($_POST["return"])){
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
    if ($_GET["flow"] == "overview")
    {
      if (!empty($_POST["street"])){

        $_SESSION["street"] = $_POST["street"];
        $_SESSION["number"] = $_POST["number"];
        $_SESSION["postalnumber"] = $_POST["postalnumber"];
        $_SESSION["city"] = $_POST["city"];
      }

      if (!empty($_POST["name"])){
        $_SESSION["name"] = $_POST["name"];
      }

      if (!empty($_POST["date"])){
        $_SESSION["date"] = $_POST["date"];
      }
      if (!empty($_POST["snack"])){
        $_SESSION["snack"] = $snacks;
      }
      if (!empty($_POST["game"])){
        $_SESSION["game"] = $games;
      }
      if (!empty($_POST["system"])){
        $_SESSION["system"] = $systems;
      }
      else
      {
        $_SESSION["system"] = "";
      }


    ?>
      <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>
 <article class = "detail">
    <h2 class = "dashboard__title detail__title"> Create lanparty </h2>
    <form class="form createlan" action="index.php?page=plan&flow=finished" method = "POST">
            <input class="input__button" type="submit" value="Confirm">
        </form>
        <p class = "section__title"> Want to make changes first? </p>
    <div class = "detail__wrapper">
    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Name: </h3>
    <p class = "section__para"> <?php echo $_SESSION["name"]?></p>
    </div>
    <form class="form" action="index.php?page=plan&flow=name&edit=<?php echo $_SESSION["name"]?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>

     <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Date:</h3>
    <p class = "section__para"> <?php echo $_SESSION["date"]?></p>
    </div>
    <form class="form" action="index.php?page=plan&flow=date&edit=<?php echo $_SESSION["date"]?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>

    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Location </h3>
    <p class = "section__para"> <?php echo $_SESSION["street"]." ".$_SESSION["number"]." ".$_SESSION["postalnumber"]." ".$_SESSION["city"]?></p>
    </div>
    <form class="form" action="index.php?page=plan&flow=location&street=<?php echo $_SESSION["street"] ?>&streetnumber=<?php echo $_SESSION["number"] ?>&postalnumber=<?php echo $_SESSION["postalnumber"] ?>&city=<?php echo $_SESSION["city"] ?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>
    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Snacks </h3>
    <?php
    if (!empty($_SESSION["snack"])){
    foreach ($_SESSION["snack"] as $snack){
      ?>
       <img class = "imagedata" src = "data:image/jpeg;base64,<?php
           echo $snack["Snackimage"];
           ?>">
      <?php
    }
    }
    else
    {
      ?>
        <p class = "section__para"> <?php echo "no snacks" ?></p>
        <?php
    }
    ?>

    </div>

    <form class="form" action="index.php?page=plan&flow=snacks<?php
      if (!empty($_SESSION["snack"])){
    foreach ($_SESSION["snack"] as $snack){
      echo "&".$snack["Snackid"]."=true";
    }}?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>
    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Games </h3>
    <?php
    if (!empty($_SESSION["game"])){
      foreach ($_SESSION["game"] as $game){
        ?>
         <img class = "imagedata" src = "data:image/jpeg;base64,<?php
            echo $game["GameImage"]?>">

        <?php
    }
  }
  else
  {
  ?>
      <p class = "section__para"> <?php echo "no games" ?></p>
      <?php
  }
  ?>


    </div>

    <form class="form" action="index.php?page=plan&flow=games<?php
    if (!empty($_SESSION["game"])){
    foreach ( $_SESSION["game"] as $game){
      echo "&".$game["GameID"]."=true";
    }}?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>

    <section class = "detail__section">
    <div class = "detail__section--wrapper">
    <h3 class = "section__title"> Systems </h3>
    <?php
     if (!empty($_SESSION["system"])){
    foreach ($_SESSION["system"] as $system){
      ?>
       <img class = "imagedata" src = "data:image/jpeg;base64,<?php
             echo $system["SystemImage"]?>">

      <?php
        }
    }
    else
    {
    ?>
        <p class = "section__para"> <?php echo "no systems" ?></p>
        <?php
    }
    ?>


    </div>

    <form class="form" action="index.php?page=plan&flow=systems<?php
    if (!empty($_SESSION["system"])){
    foreach ( $_SESSION["system"] as $system){
      echo "&".$system["SystemID"]."=true";
    }}?>" method = "POST">
    <input class="input__button" name = "return" type="submit" value="Edit">
    </form>
    </section>

  </div>



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





