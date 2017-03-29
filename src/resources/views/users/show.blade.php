@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<a href="{{ Route::has('users.index') ? route('users.index') : '#' }}" class="btn btn-lg btn-primary btn-block">
				<i class="fa fa-list" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</div>

<table class="table table-striped table-hover">
	<body>
		<tr>
			<th>Name</th>
			<td>{{ $user->name }}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<th>Created at</th>
			<td>{{ $user->created_at }}</td>
		</tr>
		<tr>
			<th>Updated at</th>
			<td>{{ $user->updated_at }}</td>
		</tr>
	</body>
</table>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<form action="{{ Route::has('users.destroy') ? route('users.destroy', ['id' => $user->id]) : '#' }}" method="POST" onsubmit="return confirm('Do you really want to delete the user?');">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<button type="submit" class="btn btn-lg btn-danger btn-block">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</button>
			</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<a href="{{ Route::has('users.edit') ? route('users.edit', ['id' => $user->id]) : '#' }}" class="btn btn-lg btn-warning btn-block">
				<i class="fa fa-edit" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</div>

@append

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-users/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
@append
