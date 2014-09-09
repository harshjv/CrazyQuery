@extends('base.layout')

@section('js')
  <script src="/assets/js/helper.js"></script>
  <script src="/assets/js/score.js"></script>
@stop

@section('css')
  <style type="text/css">
    body {
      padding-top: 60px;
    }

    table.table-score tr td, table.table-score tr th {
      vertical-align: middle;
      text-align: center!important;
    }
  </style>
@stop

@section('body')
<div class="container top-brand">
  <div class="row">
    <div class="col-lg-4 text-left">
      <h3><span class="text-primary">Crazy</span>Query</h3>
    </div>
  </div>
</div>
<div class="container text-center">
  <h4><span class="text-primary">Score</span> Board</h4>
  <br/>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-score">
      <thead>
        <tr>
          <th>Rank</th>
          <th class="hidden-print">Username</th>
          <th>Name</th>
          <th>Enrolment Number</th>
          <th>Points</th>
          <th class="hidden-print">Status</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      @foreach ($users as $user)
      <tr>
        <td class="rank-num">{{ $i++ }}</td>
        <td class="hidden-print">{{ $user->username }}</td>
        <td>{{{ $user->first_name }}} {{{ $user->last_name }}}</td>
        <td>{{{ $user->enrolment_number }}}</td>
        <td>{{ $user->points }}</td>
        @if($user->done)
          <td class="hidden-print">Done</td>
        @else
          <td class="hidden-print">In-progress</td>
        @endif
      </tr>
      @endforeach
    </table>
  </div>
</div>
@stop