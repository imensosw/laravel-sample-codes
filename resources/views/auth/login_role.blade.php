@extends('layouts.main')
@section('content')
    <div class="login_area">
        <div class="logo">
            <a href="#"> <img src="images/logo.png"  alt="logo"> </a>
        </div>
        {!! Form::open(['url' => 'setRole']) !!}
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label" style="margin-top:12px">Select Role</label>
                <div class="col-md-6">
                    <div class="dropdown"> 
                        <?php $items =  Auth::user()->roles->pluck('name', 'id'); ?>
                        {{ Form::select('role', $items , null , ['class'=>'form-control']) }}
                    </div>
                </div>
            </div>
             <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                     <button type="submit" name="setRole" class="btn btn-blue">Login in Role</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
  @endsection
