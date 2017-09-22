var $j=jQuery.noConflict();

// $j(window).load(function() {
//   $j('.course-card').hover(function() {

//     $j(this).find('.course-card__description').stop().animate({
//       height: "toggle",
//       opacity: "toggle"
//     }, 300);

//   });
// });


$j(function () {
    var sidebar = $j('.course-post__sidebar');
    var top = sidebar.offset().top - parseFloat(sidebar.css('margin-top'));

    $j(window).scroll(function (event) {
      var y = $j(this).scrollTop();
      if (y >= top) {
        sidebar.addClass('fixed');
      } else {
        sidebar.removeClass('fixed');
      }
    });
});