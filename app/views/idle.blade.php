@extends('base.layout')

@section('body')
<div class="container top-brand">
  <div class="row">
    <div class="col-lg-4 text-left">
      <h3><span class="text-primary">Crazy</span>Query</h3>
    </div>
  </div>
</div>

<div class="container text-center score-main">
  <h4><span class="text-primary">Idle</span> Usernames</h4>
  <br/>
  <div class="table-responsive">
    <table class="table table-bordered table-hover table-score">
      <thead>
        <tr>
          <th>Username</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->username }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@stop