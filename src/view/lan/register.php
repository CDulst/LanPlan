

       <section class="section__right">
        <img class="section__right__image" src="assets/images/illustration__right.svg" alt="">
    </section>
    <section class="label">
        <form class="form" action="" method = "POST" enctype="multipart/form-data">
             <label class="labelForm" for="name"> Register </label>
            <div class="FormName__wrapper">

            <label class="labelForm" for="name"> Insert Username </label>
            <p id = "name" class="error">
            <?php
            if (!empty($errorname)){
              echo $errorname;
            }
            ?>
            </p>
            <input required id = "name" class=" input input__name" type="text" name = "name" placeholder="Jan Knol" value="<?php if (isset($_POST["name"])){
              echo $_POST["name"];}?>">
            </div>

            <div class="FormName__wrapper">
            <label class="labelForm" for="name"> Insert Password </label>
            <p id = "ww" class="error"></p>
            <input required id = "ww" class=" input input__name" type="password" name = "password" placeholder="WW" value ="<?php if (isset($_POST["password"])){
              echo $_POST["password"];}?>" >
            </div>

            <div class="FormName__wrapper">
            <label class="labelForm" for="name"> Repeat Password </label>
            <p id = "repeat-ww" class="error">
            <?php
            if (!empty($errorpass)){
              echo $errorpass;
            }
            ?>
            </p>
            <input required id = "repeat-ww" class=" input input__name" type="password" name = "passwordrepeat" placeholder="WW" value = "<?php if (isset($_POST["password"])){
              echo $_POST["password"];}?>">
            </div>
            <div class="FormName__wrapper">
            <label class="labelForm" for="name"> Upload Profile Pic 120X120</label>
            <p id = "repeat-ww" class="error">
            <?php
            if (!empty($errorimg)){
              echo $errorimg;
            }
            ?>
            </p>
            <input  required id = "pic" type="file" name = "image" accept = ".png">
            </div>
            <input class="input__button" type="submit" value="Register">
            <p style = "display:none" class="info feedback"></p>
        </form>
    </section>
