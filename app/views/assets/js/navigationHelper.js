const navigationHelper = {
  container: document.querySelector('.toggle'),
  items: document.querySelectorAll(".item"),

  barsHTML: "<i class='fa fa-bars'></i>",
  closeHTML: "<i class='fa fa-times'></i>",

  getIcon: () => navigationHelper.container.querySelector('a'),

  setEvents: () => {
    if (navigationHelper.container) {
      navigationHelper.container.addEventListener("click", (e) => {
        navigationHelper.items.forEach((elemet) => {
          if (elemet.classList.contains('active')) {
            elemet.classList.remove('active');
            navigationHelper.getIcon().innerHTML = navigationHelper.barsHTML;
          } else {
            elemet.classList.add("active");
            navigationHelper.getIcon().innerHTML = navigationHelper.closeHTML;
          }
        });
      });
    }
  },

  initialize: () => {
    navigationHelper.setEvents();
  }
}

document.addEventListener("DOMContentLoaded", () => {
  navigationHelper.initialize();
});
