var chart;

var imageHandler = function(question) {
  if(question.image_path) {
    $('#question_image').attr('href', question.image_path);
    $('#question_image img').attr('src', question.image_path);
    $('#question_image').show();
  } else {
    $('#question_image').hide();
  }
};

var skipHandler = function(e) {
  e.preventDefault();
  disableOptions();

  doPost(route.skip, {}, function(data) {
    enableOptions();
  });
};

var optionButtonHandler = function(e) {
  e.preventDefault();
  disableOptions();

  var ans = $(this).attr('data-opt-id');
  var qid = $(this).attr('data-qid');

  doPost(route.answer, { question_id: qid, answer: ans }, function(data) {
    enableOptions();
  });
};

var fillData = function(data) {
  $('#points').text(data.score);
  $('#question_th').text(data.question_number);
  $('#question_th_suffix').text(suffix(data.question_number));
  $('#correct').text(data.correct_score);
  $('#incorrect').text(data.incorrect_score);
};

var checkSkip = function(data) {
  if(data.last) {
    $('#skip').unbind('click', skipHandler);
    $('#skip').remove();
  } else {
    $('#skip').unbind('click', skipHandler);
    $('#skip').bind('click', skipHandler);
  }
};

var disableOptions = function() {
  $('.option_buttons').unbind('click', optionButtonHandler);
  $('.option_buttons').attr('disabled', "disabled");
};

var enableFinish = function() {
  $('#finish').click(function(e) {
    e.preventDefault();
    disableOptions();
    doPost(route.finish);
  });
};

var enableOptions = function() {
  $('.option_buttons').attr('disabled', false);
  $('.option_buttons').bind('click', optionButtonHandler);
};

var fillQuestion = function(question) {
  var opts = shuffle(question.options.slice(0));
  var t;

  $('#question_title').html(question.title);

  imageHandler(question);

  for (var i = 0; i < opts.length; i++) {
    t = $('#option_'+i);
    t.text(opts[i].title);
    t.attr('data-opt-id', opts[i].id);
    t.attr('data-qid', question.id);
  };
};

$(document).ready(function() {
  doPost(route.clock);
  doPost(route.init, {}, function(data) {
    enableOptions();
    enableFinish();
  });
});