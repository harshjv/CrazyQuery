var skipHandler = function(e) {
  e.preventDefault();
  disableOptions();

  $.post('/api/skip', function(data) {

    if(data.done) {
      // Redirect now
      window.location = "/result";
      // alert("Yor're done");
    } else {
      fillQuestion(data.question);
      fillQuestionNumber(data.questions_served_count);
      fillPoints(data.points);
      fillUpsAndDown(data.stats);
      checkSkip(data);

      if(parseInt(data.questions_served_count) == 2) {
        $(window).trigger('first_answer', [ data.questions_served_count - 1, parseInt(data.points) ]);
      } else {
        window.chart.addData([parseInt(data.points)], ""+(data.questions_served_count - 1)+"");
      }
      enableOptions();
    }
  });
};

var optionButtonHandler = function(e) {
  e.preventDefault();
  disableOptions();

  var ans = $(this).attr('data-opt-id');

  $.post('/api/answer', { answer: ans }, function(data) {

    if(data.done) {
      // Redirect now
      window.location = "/result";
      // alert("Yor're done");
    } else {
      fillQuestion(data.question);
      fillQuestionNumber(data.questions_served_count);
      fillPoints(data.points);
      fillUpsAndDown(data.stats);
      checkSkip(data);

      if(parseInt(data.questions_served_count) == 2) {
        $(window).trigger('first_answer', [ data.questions_served_count - 1, parseInt(data.points) ]);
      } else {
        window.chart.addData([parseInt(data.points)], ""+(data.questions_served_count - 1)+"");
        // window.chart.update();
        // window.chart.resize();
        // window.chart.render();
      }
      enableOptions();
    }
  });
};

$(document).ready(function() {
  $.post('/api/init', function(data) {
    initFill(data);
    checkSkip(data);

    if(data.questions_served_count != 1) {
      $(window).trigger('fill_answer', [ data.questions_track ]);
    }

    $('.option_buttons').bind('click', optionButtonHandler);
  });
  
});

function initFill(data) {
  window.fillQuestion(data.question);
  window.fillPoints(data.points);
  window.fillQuestionNumber(data.questions_served_count);
  window.fillUpsAndDown(data.stats);
};