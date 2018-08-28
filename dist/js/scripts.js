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
        mobileMenu = document.querySelector('.mobile-nav');

  burger.addEventListener('click', function(e) {
    e.preventDefault();

    this.classList.toggle('is-open');
    mobileMenu.classList.toggle('is-open');
  });
})(window, document);