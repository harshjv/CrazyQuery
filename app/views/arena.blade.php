@extends('base.layout')

@section('css')
  <link href="/assets/css/vendor/timeto/timeTo.css" rel="stylesheet">
@stop

@section('js')
  <script src="/assets/js/vendor/chart/chart.min.js"></script>
  <script src="/assets/js/vendor/tock/tock.min.js"></script>
  <script src="/assets/js/vendor/timeto/jquery.timeTo.min.js"></script>
  
  <script src="/assets/js/arena.min.js"></script>
  <script src="/assets/js/chart.min.js"></script>
  <script src="/assets/js/helper.min.js"></script>

  <script src="/assets/js/clock.js"></script>
@stop

@section('body')
<div class="container top-brand">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-left">
      <h3><span class="text-primary">Crazy</span>Query</h3>
      <h4 class="no-margin-bottom"><span class="text-primary">{{{ $user->first_name }}}</span> {{{ $user->last_name }}}</h4>
      <h4 class="no-margin"><small>{{ $user->enrolment_number }}</small></h4>
      <h5 class="no-margin"><small>{{ $user->username }}</small></h5>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center" style="padding-top:22px">
      <span id="clock"></span>
      <!-- <h3><span class="text-primary"><i class="fa fa-clock-o fa-flip-horizontal"></i></span> </h3> -->
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
      <h3><span class="text-primary">Points</span> <span id="points"></span></h3>
    </div>
  </div>
</div>
<div class="container text-center yo-main">
  <h4><span class="text-primary" id="question_th"></span><sup class="text-muted" id="question_th_suffix"></sup> Query</h4>
  <a href="" id="question_image" class="display:none" target="_blank"><img src="" class="img-thumbnail question-image"></a>
  <p class="no-margin" id="question_title"></p>
  <br/>
  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <button class="btn btn-block btn-default option_buttons" id="option_0"></button>
        <button class="btn btn-block btn-default option_buttons" id="option_2"></button>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <button class="btn btn-block btn-default option_buttons" id="option_1"></button>
        <button class="btn btn-block btn-default option_buttons" id="option_3"></button>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2"></div>
  </div>
  <h4><small>Correct answer +<span id="right"></span> / Incorrect answer -<span id="wrong"></span></small></h4>
  <p><a href=""id="skip">Skip <i class="fa fa-angle-right"></i></a> <a href="" id="finish">Finish <i class="fa fa-angle-right"></i></a></p>
</div>

<div class="mini-chart">
  <div class="container">
    <canvas id="canvas" height="10%" width="125"></canvas>
  </div>
</div>

@stop