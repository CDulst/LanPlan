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
    }
    else
    {
      message = `Creative choice`;
      if ($field.id === 'date') {
        message = `Good date for a party`;
      }
      correct = true;
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
      $field.parentElement.querySelector(`.error`).textContent = ``;
      if ($field.form.checkValidity()) {
        $field.form.querySelector(`.error`).innerHTML = ``;
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
    $form.noValidate = true;
    $form.addEventListener(`submit`, handleSubmitForm);

    const fields = $form.querySelectorAll(`.input`);
    addValidationListeners(fields);
    console.log(document.querySelector(`.error`));
  };

  init();
}
