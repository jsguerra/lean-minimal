/*!
 * gco-gulp-boilerplate
 * Fiercely quick and opinionated front-ends
 * 
 * @author Jose Guerra
 * @version 2.0.0
 * Copyright 2018. MIT licensed.
 */
(function($) {
  //comment
  $(function() {
    $('nav ul li > a:not(:only-child)').click(function(e) {
      $(this).siblings('.nav-dropdown').slideToggle();
      $('.nav-dropdown').not($(this).siblings()).hide();
      e.stopPropagation();
    });
    $('html').click(function() {
      $('.nav-dropdown').hide();
    });
  });
  document.querySelector('#nav-toggle').addEventListener('click', function() {
    this.classList.toggle('active');
  });
  $('#nav-toggle').click(function() {
    $('nav ul').slideToggle();
  });
})(jQuery);