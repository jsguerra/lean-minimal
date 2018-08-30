(function (window, document, undefined) {
  'use strict';
  
  const burger = document.querySelector('.hamburger'),
        mobileMenu = document.querySelector('.mobile-nav');

  // Burger menu and side menu toggle
  burger.addEventListener('click', function(e) {
    e.preventDefault();

    this.classList.toggle('is-open');
    mobileMenu.classList.toggle('is-open');
  }, false);

  // Listen for all clicks on the document
  document.addEventListener('click', function (event) {

    // If the click happened inside the the container, bail
    if (event.target.closest('.mobile-nav, .hamburger')) {
      return;
    } else {
      // Otherwise, run our code...
      burger.classList.remove('is-open');
      mobileMenu.classList.remove('is-open');
    }
  }, false);
})(window, document);