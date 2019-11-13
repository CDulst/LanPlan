

<?php
echo "hello world <br><br>";
foreach ($lans as $lan){
echo "".$lan["Name"]."<br>";
echo "".$lan["Date"]."<br>";
foreach ($locations as $location){
  if ($location["LocationID"] == $lan["LocationID"]){
    echo "".$location["Street"]."<br>";
    echo "".$location["Streetnumber"]."<br>";
    echo "".$location["City"]."<br>";
    echo "".$location["Postal number"]."<br><br>";
  }
}
}



/*
if (!empty($insertTodoResult)) {
?>
  <p>De todo werd toegevoegd!</p>
<?php
} else {
  if (!empty($errors)) {
    echo '<div class="error">Gelieve de verplichte velden in te vullen</div>';
  }
?>
<form id="insertTodoForm" method="post" action="index.php">
  <input type="hidden" name="action" value="insertTodo" />
  <div>
    <label for="inputText">text:</label>
    <input type="text" id="inputText" name="text" value="<?php
    if (!empty($_POST['text'])) {
      echo $_POST['text'];
    }
    ?>" />
    <span class="error error--text"><?php if (!empty($errors['text'])) echo $errors['text'];?></span>
  </div>
  <div>
    <button type="submit">Add Todo</button>
  </div>
</form>
<?php
}
*/
?>
<section class="dashboard">
        <h2 class="dashboard__title">Your Lan partys</h2>

        <div class="dashboard__items__wrapper">
            <ul class="dashboard__items">
                <li class="dashboard__item">
                    <p class="dashboard__date">11 march 2020</p>
                    <a class="dashboard__item__link" href="">
                    <div class="dashboardNameLocation__wrapper">
                    <p class="dashboard__name">Name</p>
                    <p class="dashboard__location">location:</p>
                    <p class="dashboard__location">sint-andriessteenweg 169</p>
                    </div>
                    <div class="dashboard__countdown">
                    <div class="dashboard__dashboard days">
                        <p class="number">03</p>
                        <p class="date">Days</p>
                    </div>
                    <div class="dashboard__dashboard hours">
                        <p class="number">24</p>
                        <p class="date">Hours</p>
                    </div>
                    <div class="dashboard__dashboard minutes">
                        <p class="number">30</p>
                        <p class="date">Minutes</p>
                    </div>
                    <div class="dashboard__dashboard seconds">
                        <p class="number">45</p>
                        <p class="date">Seconds</p>
                    </div>
                </div>
                </a></li>
            </ul>
        </div>
    </section>
<script type="text/javascript">
{
  const init = () => {
    const confirmationLinks = Array.from(document.getElementsByClassName(`confirmation`));
    confirmationLinks.forEach($confirmationLink => {
      $confirmationLink.addEventListener(`click`, e => {
        if (!confirm('Are you sure?')) e.preventDefault();
      });
    });
  };
  init();
}
</script>
