

{
  const $ul = '';
  const $months = '';
  const $days = '';
  const $hours = '';
  const $minutes = '';

  const $todosList = document.getElementById(`todosList`),
    $insertTodoForm = document.getElementById(`insertTodoForm`),
    $inputText = document.getElementById(`inputText`);

  const init = () => {
    /*
    if ($todosList) {
      loadTodos();
      //test
      console.log('hey');
    }
    if ($insertTodoForm) {
      $insertTodoForm.addEventListener(`submit`, handleSubmitInsertTodoForm);
    }
    */
    setInterval(function() {
      timer();
    }, 1000);
  };

  const timer = () => {
    console.log('h');
    const $months = document.querySelectorAll('.month');
    const $days = document.querySelectorAll('.day');
    const $hours = document.querySelectorAll('.hour');
    const $minutes = document.querySelectorAll('.minute');

    let i = 0;
    const $seconds = document.querySelectorAll('.second');
    $seconds.forEach($second => {
      let seconds = $second.textContent;
      let minutes = $minutes[i].textContent;
      let hours = $hours[i].textContent;
      let days = $days[i].textContent;
      let months = $months[i].textContent;


      seconds = parseInt(seconds) - 1;
      if (seconds < 0) {
        seconds = 60;
        minutes = parseInt(minutes) - 1;
      }
      if (minutes < 0) {
        minutes = 60;
        hours = parseInt(hours) - 1;
      }
      if (hours < 0) {
        hours = 24;
        days = parseInt(days) - 1;
      }
      if (days < 0) {
        days = 31;
        months = parseInt(months) - 1;
      }

      $second.textContent = seconds.toString();
      $minutes[i].textContent = minutes.toString();
      $hours[i].textContent = hours.toString();
      $days[i].textContent = days.toString();
      $months[i].textContent = months.toString();
      i = i + 1;

    });






  };
  const loadTodos = () => {
    fetch(`index.php`, {
      headers: new Headers({
        Accept: `application/json`
      })
    })
      .then(r => r.json())
      .then(data => handleLoadTodos(data));
  };

  const handleLoadTodos = data => {
    $todosList.innerHTML = data.map(todo => createTodoListItem(todo)).join(``);
  };

  const createTodoListItem = todo => {
    return `<li>${todo.text}</li>`;
  };

  const handleSubmitInsertTodoForm = e => {
    e.preventDefault();
    fetch($insertTodoForm.getAttribute('action'), {
      headers: new Headers({
        Accept: `application/json`
      }),
      method: 'post',
      body: new FormData($insertTodoForm)
    })
      .then(r => r.json())
      .then(data => handleLoadSubmit(data));
  };

  const handleLoadSubmit = data => {
    const $errorText = document.querySelector(`.error--text`);
    $errorText.textContent = '';
    if (data.result === 'ok') {
      $inputText.value = '';
      loadTodos();
    } else {
      if (data.errors.text) {
        $errorText.textContent = data.errors.text;
      }
    }
  };

  init();

}
