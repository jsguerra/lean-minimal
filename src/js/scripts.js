(function (window, document, undefined) {
  'use strict';
  
  const burger = document.querySelector('.hamburger');

  burger.addEventListener('click', function(e) {
    e.preventDefault();

    this.classList.toggle('is-active');
  });
})(window, document);