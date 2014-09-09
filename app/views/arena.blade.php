@extends('base.layout')

@section('js')
  <script src="/assets/js/vendor/chart/chart.min.js"></script>
  <script src="/assets/js/vendor/tock/tock.min.js"></script>
  <script src="/assets/js/vendor/holder/holder.js"></script>
  
  <script src="/assets/js/arena.js"></script>
  <script src="/assets/js/chart.js"></script>
  <script src="/assets/js/helper.js"></script>

  <script src="/assets/js/clock.js"></script>
@stop

@section('body')
<div class="container top-brand">
  <div class="row">
    <div class="col-lg-4 text-left">
      <h3><span class="text-primary">Crazy</span>Query</h3>
    </div>
    <div class="col-lg-4 text-center">
      <h3><span class="text-primary"><i class="fa fa-clock-o fa-flip-horizontal"></i></span> <span id="clock"></span></h3>
    </div>
    <div class="col-lg-4 text-right">
      <h3><span class="text-primary">Points</span> <span id="points"></span></h3>
    </div>
  </div>
</div>
<div class="container text-center yo-main">
  <h4><span class="text-primary" id="question_th"></span><sup class="text-muted" id="question_th_suffix"></sup> Query</h4>
  <a href="" id="question_image" class="display:none" target="_blank"><img src="" class="img-thumbnail question-image"></a>
  <h3 class="no-margin" id="question_title"></h3>
  <h5>Correct answer +<span id="right"></span> / Incorrect answer -<span id="wrong"></span></h5>
  <br/>
  <br/>

  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <div class="col-lg-6">
        <button class="btn btn-block btn-lg btn-default option_buttons" id="option_0"></button>
        <br/>
        <button class="btn btn-block btn-lg btn-default option_buttons" id="option_2"></button>
      </div>
      <div class="col-lg-6">
        <button class="btn btn-block btn-lg btn-default option_buttons" id="option_1"></button>
        <br/>
        <button class="btn btn-block btn-lg btn-default option_buttons" id="option_3"></button>
      </div>
    </div>
    <div class="col-lg-2"></div>
  </div>
  <br/>
  <p><a href=""id="skip">Skip <i class="fa fa-angle-right"></i></a> <a href="/finish" id="finish">Finish <i class="fa fa-angle-right"></i></a></p>
</div>

<div class="mini-chart">
  <div class="container">
    <canvas id="canvas" height="10%" width="125"></canvas>
  </div>
</div>

@stop