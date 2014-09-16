var route = { 
  init: '/api/init',
  skip: '/api/skip',
  answer: '/api/answer',
  finish: '/api/finish',
  clock: '/api/clock',
  track: '/api/track'
};

var createGraph = function(scores) {
  var keys = [];
  keys[0] = "Start";
  scores.unshift(0);
  scores[0] = 0;

  for(var i = 1; i < scores.length; i++) {
    keys[i] = i;
  };

  var chartData = {
    labels: keys,
    datasets : [
      {
        fillColor: "#eee",
        strokeColor: "#16a085",
        pointColor: "#fff",
        pointStrokeColor: "#16a085",
        pointHighlightFill: "#555",
        pointHighlightStroke: "#16a085",
        data: scores
      }
    ]
  };

  var ctx = document.getElementById("canvas").getContext("2d");
  chart = new Chart(ctx).Line(chartData, {
    responsive : true,
    scaleShowGridLines : false,
    bezierCurve: true,
    pointDotStrokeWidth : 2
  });
};

var shuffle = function(array) {
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

var suffix = function(n) {
  var s = n % 100;

  if(s>3 && s<21) return 'th';
  switch(s%10) {
    case 1: return 'st';
    case 2: return 'nd';
    case 3: return 'rd';

    default: return 'th';
  }
};

var doPost = function(url, values, callback) {
  $.post(url, values, function(data) {
    if(data.redirect) {
      window.location.assign(data.redirect);
    } else {
      if(url == route.init) {
        if(data.question_number != 1) {
          createGraph(data.question_track);
        }
      }

      if(url != route.finish && url != route.clock && url != route.track) {
        checkSkip(data);
        fillQuestion(data.question);
        fillData(data);
      }

      if(url == route.skip || url == route.answer) {
        if(data.question_number == 2) {
          createGraph([data.score]);
        } else {
          chart.addData([data.score], data.question_number - 1);
        }
      }

      if(url == route.track) {
        createGraph(data);
      }

      if(url == route.clock) {
        $('#clock').timeTo({
          seconds: data,
          fontFamily: 'inherit',
          callback: function() {
            disableOptions();
            doPost(route.finish);
          }
        });
      }
      if($.isFunction(callback)) {
        callback(data);
      }
    }
  });
};