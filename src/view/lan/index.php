

<?php
$arraymonth = array(
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
  );










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
        <h2 class="dashboard__title">Your Lan parties</h2>

        <div class="dashboard__items__wrapper">
            <ul class="dashboard__items">
              <?php
              foreach ($lans as $lan){
                $start = new DateTime();
                $start->setTimezone(new DateTimeZone('Europe/Brussels'));
                $end = new \DateTime($lan["Date"]);
                $interval = $start->diff($end);
                $months = $interval->m;
                $days = $interval->d;
                $hours = $interval->h;
                $minutes = $interval->i;
                $seconds = $interval->s;
                if ($interval->y > 0){
                  $months = $months + ($interval->y*12);
                }

              $j = substr($lan["Date"],0,4);
              $m = substr($lan["Date"],5,2);
              $d = substr($lan["Date"],8,2);
              $date = $arraymonth[$m - 1] . " ". $d . "," . $j;
              foreach ($locations as $location){
                if ($location["LocationID"] == $lan["LocationID"])
                {
              echo '<li class="dashboard__item">
              <p class="dashboard__date">'. $date. '</p>
              <a class="dashboard__item__link" href="">
              <div class="dashboardNameLocation__wrapper">
              <p class="dashboard__name">'. $lan["Name"].'</p>
              <p class="dashboard__location">'. $location["Street"]. ' ' . $location["Streetnumber"].'</p>
              </div>
              <div class="dashboard__countdown">
              <div class="dashboard__dashboard months">
              <p class="number month">'. $months .'</p>
              <p class="date">Months</p>
          </div>
              <div class="dashboard__dashboard days">
                  <p class="number day">'.  $days .'</p>
                  <p class="date">Days</p>
              </div>
              <div class="dashboard__dashboard hours">
                  <p class="number hour">'. $hours .'</p>
                  <p class="date">Hours</p>
              </div>
              <div class="dashboard__dashboard minutes">
                  <p class="number minute">'. $minutes .'</p>
                  <p class="date">Minutes</p>
              </div>
              <div class="dashboard__dashboard seconds">
                  <p class="number second">'. $seconds .'</p>
                  <p class="date">Seconds</p>
              </div>
          </div>
          </a></li>';
        }
      }
      }
              ?>

            </ul>
        </div>
        <div class="add__lanparty">
        <a href="index.php?page=plan">
        <img src="../assets/images/button.svg" alt="button">
        </a>
    </div>
    </section>
    <section class="emptystate">
        <img class="emptyStateImage" src="../assets/images/imageEmpty.svg" alt="emptystate">
    </section>
      <section class="section__right">
        <img class="section__right__image" src="../assets/images/illustration__right.svg" alt="">
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
