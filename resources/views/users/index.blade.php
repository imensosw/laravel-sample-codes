@extends('layouts.main')
@section('content')
<div id="app" class="m_main row"> 
  <div class="container"> 
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Users Management</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success small_btn" href="{{ route('users.create') }}"> Create New User</a>
	        </div>
	    </div>
	</div>
		
	<div class="success-message-div"></div> 
	@if ($message = Session::get('success'))
		<script type="text/javascript"> showSuccessMessage("{{ $message }}");</script>	
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info small_btn" href="{{ route('users.show',$user->id) }}">Show</a>
			<a class="btn btn-primary small_btn" href="{{ route('users.edit',$user->id) }}">Edit</a>
			
			<button class="btn btn-danger small_btn delte-person"
                  onClick="pleaseConfirm(this,{{ $user->id }},'deleteUser')"
                  userId="{{ $user->id }}"  > Delete </button> 
			<!-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger small_btn']) !!}
        	{!! Form::close() !!} -->
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
</div>
</div>
@endsection