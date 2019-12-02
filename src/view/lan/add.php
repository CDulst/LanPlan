

       <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>
    <section class="label">
        <form class="form" action="index.php?page=add<?php if ($_GET["flow"] == "snacks"){
               echo "&flow=snacks";
             }
             if ($_GET["flow"] == "games"){
              echo "&flow=games";
            }
            if ($_GET["flow"] == "systems"){
              echo "&flow=systems";
            }?>" method = "POST" enctype="multipart/form-data">
             <label class="labelForm form__title" for="name"> <?php if ($_GET["flow"] == "snacks"){
               echo "add snack";
             }
             if ($_GET["flow"] == "games"){
              echo "add game";
            }
            if ($_GET["flow"] == "systems"){
              echo "add system";
            }?> </label>
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"> <?php if ($_GET["flow"] == "snacks"){
               echo "Snack name";
             }
             if ($_GET["flow"] == "games"){
              echo "Game name";
            }
            if ($_GET["flow"] == "systems"){
              echo "System name";
            }?></label>
            <p id = "name" class="error"></p>
            <input id = "name" class=" input input__name" type="text" name = "name" placeholder="<?php if ($_GET["flow"] == "snacks"){
               echo "chimichange";
             }
             if ($_GET["flow"] == "games"){
              echo "Fallout 76";
            }
            if ($_GET["flow"] == "systems"){
              echo "nintendo 64";
            }?>">
            </div>
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"> Upload PNG 120X120</label>
            <p id = "name" class="error"> <?php if (isset($error))
            {
              echo $error;
            }
            ?></p>
            <input class='input__image' id = "name" type="file" name = "image" accept = ".png">
            </div>

            <input class="input__button" type="submit" value="<?php if ($_GET["flow"] == "snacks"){
               echo "add snack";
             }
             if ($_GET["flow"] == "games"){
              echo "add game";
            }
            if ($_GET["flow"] == "systems"){
              echo "add system";
            }?>">
            <input class= "input__button" type="submit" value="return">
        </form>
    </section>
