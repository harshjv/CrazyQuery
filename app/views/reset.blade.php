@extends('layout')

@section('body')
<div class="container top-brand">
  <div class="row">
    <div class="col-lg-6 text-left">
      {{ Config::get('crazyquery.logo') }}
    </div>
  </div>
</div>
<div class="container text-center yo-main">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      {{ Form::open(array('route' => 'do_reset')) }}
        <form role="form">
          <div class="form-group text-left">
            <label for="user_id">Username</label>
            <select class="form-control" id="user_id" name="user_id" required autocomplete="off">
              @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->username }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-lg btn-primary"><strong>Reset <i class="fa fa-angle-right"></i></strong></button>
        </form>
      {{ Form::close() }}
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      {{ Form::open(array('route' => 'do_reset_all')) }}
        <form role="form">
          <button type="submit" class="btn btn-lg btn-primary"><strong>Reset all <i class="fa fa-angle-right"></i></strong></button>
        </form>
      {{ Form::close() }}
    </div>
  </div>
  <hr/>
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      {{ Form::open(array('route' => 'do_end')) }}
        <form role="form">
          <button type="submit" class="btn btn-lg btn-primary"><strong>The End <i class="fa fa-angle-right"></i></strong></button>
        </form>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop