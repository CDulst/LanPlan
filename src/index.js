require('./css/reset.css');
require('./style.css');
require('./js/validate.js');
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
    new Headers({
      Accept: 'application/json'
    });

    console.log('test');
    checkflow();
    setInterval(function() {
      timer();
    }, 1000);

    /*$(function() {
    // Just one method to add a date picker!
    $("#myDatePicker").datepicker();
});
    if ($todosList) {
      loadTodos();
      //test
      console.log('hey');
    }
    if ($insertTodoForm) {
      $insertTodoForm.addEventListener(`submit`, handleSubmitInsertTodoForm);
    }
    */
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

  const submitWithJS = async () => {
    const $form = document.querySelector('.Agenda__form');
    console.log($form);
    const data = new FormData($form);
    console.log(data);
    const entries = [...data.entries()];
    console.log(entries);
    console.log('entries:', entries);
    const qs = new URLSearchParams(entries).toString();
    console.log(qs);
    console.log('querystring', qs);
    const url = `${$form.getAttribute('action')}&${qs}`;
    console.log(url);
    console.log('url', url);

    const response = await fetch(url, {
      headers: new Headers({
        Accept: 'application/json'
      })
    });
    const activiteiten = await response.json();
    console.log(activiteiten);
  };
  const handlechange = e => {
    submitWithJS();
  };

  const checkflow = () => {
    const url = window.location.search.slice(1).split(`&`);
    if (url[1] != null)
    {
      const page = (url[1].split('=')[1]);
      if (page != null) {
        const $form = document.querySelector('.filteronName');
        $form.addEventListener('change', handlechange);

      }
    }


  };
  init();

}
