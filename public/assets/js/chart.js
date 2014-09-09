$(window).on('first_answer', function(e, n, v) {
  var chartData = {
    labels: [ "Start", n ],
    datasets : [
      {
        fillColor: "rgba(220,220,220,0.2)",
        strokeColor: "#16a085",
        pointColor: "#16a085",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [0, v]
      }
    ]
  };
  var ctx = document.getElementById("canvas").getContext("2d");
  window.chart = new Chart(ctx).Line(chartData, {
    responsive : true,
    scaleShowGridLines : false,
    bezierCurve: true
  });
});

$(window).on('fill_answer', function(e, val) {
  var keys = [];
  keys[0] = "Start";

  var c = 0;
  var vals = JSON.parse(val);
  vals[0] = 0;

  $.each(vals, function(e) {
    c++;
  });

  for(var i = 1; i < c; i++) {
    keys[i] = i;
  };

  var chartData = {
    labels: keys,
    datasets : [
      {
        fillColor: "rgba(220,220,220,0.2)",
        strokeColor: "#16a085",
        pointColor: "#16a085",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: vals
      }
    ]
  };
  var ctx = document.getElementById("canvas").getContext("2d");
  window.chart = new Chart(ctx).Line(chartData, {
    responsive : true,
    scaleShowGridLines : false,
    bezierCurve: true
  });
});