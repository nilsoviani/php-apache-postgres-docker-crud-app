const app = {
  form: document.querySelector('form'),
  submitHiddenInput: document.querySelector('form > input[type="submit"]'),
  submitButton: document.querySelector('button[type="submit"]'),

  setEvents: () => {
    if (app.submitButton) {
      app.submitButton.addEventListener('click', () => {
        app.submitHiddenInput.click();
      });
    }
  },

  initialize: () => {
    app.setEvents();
  }

}

document.addEventListener("DOMContentLoaded", () => {
  app.initialize();
});
