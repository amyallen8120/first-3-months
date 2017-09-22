var $j=jQuery.noConflict();

window.addEventListener('scroll', function(e){
  var distanceY = window.pageYOffset || document.documentElement.scrollTop,
      shrinkOn = 75,
      header = $j("header");
  if (distanceY > shrinkOn) {
      header.addClass('header--small');
      header.addClass('header--charcoal');
  } else {
      if ( header.hasClass('header--small') ) {
          header.removeClass('header--small');
      }
      if ( header.hasClass('header--charcoal') ) {
          header.removeClass('header--charcoal');
      }
  }
});
