@extends('base.layout')

@section('js')
  <script src="/assets/js/vendor/chart/chart.min.js"></script>
  <script src="/assets/js/chart.min.js"></script>
  <script src="/assets/js/result.min.js"></script>
@stop

@section('body')
<div class="container top-brand">
  <div class="row">
    <div class="col-lg-4 text-left">
      <h3><span class="text-primary">Crazy</span>Query</h3>
      <h4 class="no-margin-bottom"><span class="text-primary">{{{ $user->first_name }}}</span> {{{ $user->last_name }}}</h4>
      <h4 class="no-margin"><small>{{ $user->enrolment_number }}</small></h4>
      <h5 class="no-margin"><small>{{ $user->username }}</small></h5>
      <a href="{{ route('logout') }}"><small>Logout</small></a>
    </div>
    <div class="col-lg-4 text-center"></div>
    <div class="col-lg-4 text-right">
      <h3><span class="text-primary"><i class="fa fa-clock-o fa-flip-horizontal"></i></span> 00:{{ $time['m'] }}:{{ $time['s'] }}</h3>
    </div>
  </div>
</div>
<div class="container text-center result-main">
  <h3 class="no-margin"><small>Points</small></h3>
  <h1 class="no-margin">{{ $user->score }}</h1>
</div>

<div class="mini-chart">
  <div class="container">
    <canvas id="canvas" height="36%" width="125"></canvas>
  </div>
</div>
@stop