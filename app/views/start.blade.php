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
{{ Form::open(array('route' => 'start_session')) }}
  <h3 class="no-margin"><span class="text-primary">{{{ $user->first_name }}}</span> {{{ $user->last_name }}}</h3>
  <h3 class="no-margin"><small>{{{ $user->enrolment_number }}}</small></h3>
  <h4 class="no-margin"><small>{{ $user->username }}</small></h4>
  <br/>
  <button type="submit" class="btn btn-lg btn-primary"><strong>Let's begin <i class="fa fa-angle-right"></i></strong></button>
{{ Form::close() }}
</div>
@stop