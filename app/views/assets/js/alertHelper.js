const alertHelper = {
  container: document.querySelector('.alert'),
  message: document.querySelector('.alert > .alert-message'),
  
  getContent: () => alertHelper.message.childNodes[0].textContent.trim(),
  toggle: () => alertHelper.container ? (alertHelper.container.style.display = alertHelper.getContent() ? '' : 'none') : null,
  check: () => alertHelper.toggle(),

  initialize: () => {
    alertHelper.check();
  }
}

document.addEventListener("DOMContentLoaded", () => {
  alertHelper.initialize();
});
