$(document).ready(function() {
  $.post('/api/track', function(data) {
    if(data.redirect) {
      window.location = data.redirect;
      return;
    }
    $(window).trigger('fill_answer', [ data ]);
  });
});