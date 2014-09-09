$(document).ready(function() {
  var k = $('.rank-num');

  $('.rank-num').each(function( index ) {
    $(this).append('<sup>'+window.suffix(parseInt($(this).text()))+'</sup>');
  });
});