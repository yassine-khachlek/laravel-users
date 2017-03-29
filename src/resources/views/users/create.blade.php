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

<form action="{{ Route::has('users.store') ? route('users.store') : '#' }}" method="POST">
	{{ method_field('POST') }}
	{{ csrf_field() }}

	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      	<input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Name">
      	
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      	<input name="email" type="text" value="{{ old('email') }}" class="form-control" placeholder="Email">
      	
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
	</div>

	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      	<input name="password" type="password" value="" class="form-control" placeholder="Password">
      	
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
	</div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input name="password_confirmation" type="password" class="form-control" placeholder="Password confirmation">

        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<a href="{{ Route::has('users.index') ? route('users.index') : '#' }}" class="btn btn-lg btn-block btn-default">
					CANCEL
				</a>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<button type="submit" class="btn btn-danger btn-block btn-lg">
					SAVE
				</button>
			</div>
		</div>
	</div>
</form>
@append

@section('styles')
<link href="{{ asset('/vendor/yk/laravel-users/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
@append
