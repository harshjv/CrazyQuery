$(document).ready(function() {
  $.post('/api/track', function(data) {
    console.log(data);
    $(window).trigger('fill_answer', [ data ]);
  });
});