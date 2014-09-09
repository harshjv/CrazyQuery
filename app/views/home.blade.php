@extends('base.layout')

@section('body')
<div class="container top-brand">
  <div class="row">
    <div class="col-lg-6 text-left">
      <h3><span class="text-primary">Crazy</span>Query</h3>
    </div>
  </div>
</div>
<div class="container text-center yo-main">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4">
      {{ Form::open(array('route' => 'login_check')) }}
        <form role="form">
          <div class="form-group text-left">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required autocomplete="off">
          </div>
          <div class="form-group text-left">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required autocomplete="off">
          </div>
          <hr/>
          <div class="form-group text-left">
            <label for="enrolment_number">Enrolment Number</label>
            <input type="number" class="form-control" id="enrolment_number" name="enrolment_number" required autocomplete="off">
          </div>
          <hr/>
          <div class="form-group text-left">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
          </div>
          <div class="form-group text-left">
            <label for="pasword">Password</label>
            <input type="password" class="form-control" id="pasword" name="password" required autocomplete="off">
          </div>
          <button type="submit" class="btn btn-lg btn-primary"><strong>Login <i class="fa fa-angle-right"></i></strong></button>
        </form>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop