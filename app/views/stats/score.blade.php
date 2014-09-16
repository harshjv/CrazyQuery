@extends('layout')

@section('js')
  <script src="{{ asset('assets/js/helper.min.js') }}"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    var k = $('.rank-num');

    $('.rank-num').each(function( index ) {
      $(this).append('<sup>'+suffix(parseInt($(this).text()))+'</sup>');
    });
  });
  </script>
@stop

@section('body')
<div class="container top-brand">
  <div class="row">
    <div class="col-lg-4 text-left">
      {{ Config::get('crazyquery.logo') }}
    </div>
  </div>
</div>
<div class="container text-center score-main">
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
          <th>Score</th>
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
        <td>{{ $user->score }}</td>
        @if($user->ended_on)
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