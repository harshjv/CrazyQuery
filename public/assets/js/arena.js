var skipHandler = function(e) {
  e.preventDefault();
  disableOptions();

  $.post('/api/skip', function(data) {

    if(data.redirect) {
      window.location = data.redirect;
      return;
    } else if(data.done) {
      // Redirect now
      window.location = "/result";
      return;
    } else {
      fillQuestion(data.question);
      fillQuestionNumber(data.question_number);
      fillPoints(data.score);
      fillUpsAndDown(data);
      checkSkip(data);

      if(parseInt(data.question_number) == 2) {
        $(window).trigger('first_answer', [ data.question_number - 1, parseInt(data.score) ]);
      } else {
        window.chart.addData([parseInt(data.score)], ""+(data.question_number - 1)+"");
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

    if(data.redirect) {
      window.location = data.redirect;
      return;
    } else if(data.done) {
      // Redirect now
      window.location = "/result";
      // alert("Yor're done");
    } else {
      fillQuestion(data.question);
      fillQuestionNumber(data.question_number);
      fillPoints(data.score);
      fillUpsAndDown(data);
      checkSkip(data);

      if(parseInt(data.question_number) == 2) {
        $(window).trigger('first_answer', [ data.question_number - 1, parseInt(data.score) ]);
      } else {
        window.chart.addData([parseInt(data.score)], ""+(data.question_number - 1)+"");
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

    if(data.redirect) {
      window.location = data.redirect;
      return;
    }

    initFill(data);
    checkSkip(data);

    if(data.question_number != 1) {
      $(window).trigger('fill_answer', [ data.question_track ]);
    }

    $('.option_buttons').bind('click', optionButtonHandler);
  });
  
});

function initFill(data) {
  window.fillQuestion(data.question);
  window.fillPoints(data.score);
  window.fillQuestionNumber(data.question_number);
  window.fillUpsAndDown(data);
};