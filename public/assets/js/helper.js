window.shuffle = function(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  while (0 !== currentIndex) {

    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
};

window.suffix = function(n) {
  var s = n % 100;

  if(s>3 && s<21) return 'th';
  switch(s%10) {
    case 1: return 'st';
    case 2: return 'nd';
    case 3: return 'rd';

    default: return 'th';
  }
};

window.checkSkip = function(data) {
  if(data.last) {
    $('#skip').unbind('click', skipHandler);
    $('#skip').remove();
    //$("#skip").attr('id', "result");
    //$("#result").html('Finish <i class="fa fa-fw fa-angle-right"></i>');
    //$('#result').attr('href', '/finish');
  } else {
    $('#skip').unbind('click', skipHandler);
    $('#skip').bind('click', skipHandler);
  }
};

window.disableOptions = function() {
  $('.option_buttons').attr('disabled', "disabled");
};

window.enableOptions = function() {
  $('.option_buttons').attr('disabled', false);
};

window.fillPoints = function(i) {
  $('#points').text(i);
};

window.fillQuestionNumber = function(i) {
  $('#question_th').text(i);
  $('#question_th_suffix').text(suffix(i));
};

window.fillUpsAndDown = function(i) {
  $('#right').text(i.correct_score);
  $('#wrong').text(i.incorrect_score);
};

window.fillQuestion = function(question) {
  var opts = window.shuffle(question.options.slice(0));
  var t;

  $('#question_title').text(question.title);

  if(question.image_path) {
    $('#question_image').attr('href', question.image_path);
    $('#question_image img').attr('src', question.image_path);
    $('#question_image').show();
  } else {
    $('#question_image').hide();
  }

  for (var i = 0; i < opts.length; i++) {
    t = $('#option_'+i);
    t.text(opts[i].title);
    t.attr('data-opt-id', opts[i].id)
  };
};