@extends('layouts.main')
@section('content')
<div id="app" class="m_main row"> 
  <div class="container"> 
   <div class="row">
       <div class="col-lg-12 margin-tb">
           <div class="pull-left">
               <h2>Edit New User</h2>
           </div>
           <div class="pull-right">
               <a class="btn btn-primary small_btn" href="{{ route('users.index') }}"> Back</a>
           </div>
       </div>
   </div>
	<!-- @if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
       @endif -->
       {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                <span class="text-danger">{{ $errors->first('roles') }}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection