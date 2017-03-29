@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<a href="{{ Route::has('users.create') ? route('users.create') : '#' }}" class="btn btn-lg btn-success btn-block">
					<i class="fa fa-plus" aria-hidden="true"></i>
				</a>
			</div>
		</div>
	</div>

	@if($users->count())

		<table class="table table-striped table-hover">
			<thead>
				<th>
					ID
				</th>
				<th>
					Name
				</th>
				<th>
					Email
				</th>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>
						{{ $user->id }}
					</td>
					<td>
						{{ $user->name }}
					</td>
					<td>
						{{ $user->email }}
					</td>
					<td>
						<form action="{{ Route::has('users.destroy') ? route('users.destroy', ['id' => $user->id]) : '#' }}" method="POST" onsubmit="return confirm('Do you really want to delete the user?');" class="form-inline pull-right">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button type="submit" class="btn btn-lg btn-danger">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</button>
						</form>

						<a href="{{ Route::has('users.edit') ? route('users.edit', ['id' => $user->id]) : '#' }}" class="btn btn-lg btn-warning pull-right">
							<i class="fa fa-edit" aria-hidden="true"></i>
						</a>

						<a href="{{ Route::has('users.show') ? route('users.show', ['id' => $user->id]) : '#' }}" class="btn btn-lg btn-primary pull-right">
							<i class="fa fa-eye" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>

		@if( method_exists($users, 'links') )
			{{ $users->links() }}
		@endif

	@endif

@append

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-users/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

<style type="text/css">
	.table :last-child > a {
		margin-left: 8px;
	}
	.table :last-child > form {
		margin-left: 8px;
	}
</style>
@append