{
  const handleSubmitForm = e => {
    const $form = e.currentTarget;
    if (!$form.checkValidity()) {
      e.preventDefault();

      const fields = $form.querySelectorAll(`.input`);
      fields.forEach(showValidationInfo);
      document.querySelector(`.feedback`).style.display = 'flex';
      document.querySelector(`.feedback`).style.color = 'red';
      document.querySelector(`.feedback`).textContent = `fields aren't filled in correctly`;
    } else {
      console.log(`Form is valid => submit form`);
    }
  };

  const showValidationInfo = $field => {
    let message;
    let correct = false;

    console.log('infoMessage', $field.dataset.infoMessage);

    if ($field.validity.valueMissing) {
      message = `The field is empty`;
      correct = false;
    }
    else
    {
      if ($field.id === 'date' || $field.id === 'name') {
        message = `Creative choice`;
        correct = true;
      }


    }
    if ($field.id === 'date') {
      console.log($field.value);
      const date = new Date();
      date.setHours(0, 0, 0, 0);
      const fielddate = new Date($field.value);
      console.log(date);
      console.log(fielddate);

      if (fielddate < date)
      {
        console.log($field.value);
        message = `Date has already passed`;
        correct = false;
      }
      else if ($field.validity.valueMissing)
      {
        message = `The field is empty`;
        correct = false;
      }
      else
      {
        message = `Good date for a party`;
        correct = true;
      }

    }
    if ($field.validity.typeMismatch) {
      message = `Type not right`;
    }
    if ($field.validity.rangeOverflow) {
      const max = $field.getAttribute(`max`);
      message = `Too big, max ${max}`;
    }
    if ($field.validity.rangeUnderflow) {
      const min = $field.getAttribute(`min`);
      message = `Too small, min ${min}`;
    }
    if ($field.validity.tooShort) {
      message = `Too short`;
    }
    if ($field.validity.tooLong) {
      message = `Too long`;
    }
    if (message && !correct) {
      console.log($field.parentElement.querySelector(`.error`));
      const $errors = document.querySelectorAll(`.error`);
      console.log($errors);
      $errors.forEach(error => {
        if (error.id === $field.id)
          error.textContent = message;

      });

    }
    else
    {
      document.querySelector('.feedback').style.display = 'flex';
      document.querySelector(`.feedback`).style.color = 'green';
      document.querySelector(`.feedback`).textContent = message;
    }
  };

  const handeInputField = e => {
    document.querySelector('.feedback').style.display = 'none';
    const $field = e.currentTarget;
    if ($field.checkValidity()) {
      const $errors = document.querySelectorAll(`.error`);
      $errors.forEach($error => {
        $error.textContent = '';
      });

      if ($field.form.checkValidity()) {
        document.querySelector(`.infoerror`).textContent = ``;
      }
    }
  };

  const handeBlurField = e => {
    const $field = e.currentTarget;
    showValidationInfo($field);
  };

  const addValidationListeners = fields => {
    fields.forEach($field => {
      $field.addEventListener(`input`, handeInputField);
      $field.addEventListener(`blur`, handeBlurField);
    });
  };

  const init = () => {
    const $form = document.querySelector(`form`);
    if ($form != null) {
      $form.noValidate = true;
      $form.addEventListener(`submit`, handleSubmitForm);
      const fields = $form.querySelectorAll(`.input`);
      addValidationListeners(fields);
      console.log(document.querySelector(`.error`));
    }

  };

  init();
}
