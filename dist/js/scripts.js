/*!
 * gco-gulp-boilerplate
 * Fiercely quick and opinionated front-ends
 * 
 * @author Jose Guerra
 * @version 2.0.0
 * Copyright 2018. MIT licensed.
 */
(function (window, document, undefined) {
  'use strict';
  
  const burger = document.querySelector('.hamburger'),
        mobileMenu = document.querySelector('.mobile-nav'),
        closeButton = document.querySelector('.close');

  // Burger menu and side menu toggle
  burger.addEventListener('click', function(e) {
    e.preventDefault();

    this.classList.toggle('is-open');
    mobileMenu.classList.toggle('is-open');
  }, false);

  // Close button
  closeButton.addEventListener('click', function(e){
    e.preventDefault();

    mobileMenu.classList.remove('is-open');
    burger.classList.remove('is-open');

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