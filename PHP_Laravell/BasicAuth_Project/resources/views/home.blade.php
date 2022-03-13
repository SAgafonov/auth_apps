@extends('layouts.app')

@section('title-block')
        <title>Home</title>
@endsection

@section('content')
	<div class="alert alert-success">
		{{ session('status') }}
	</div>
        <h1>Home</h1>
	<a href="{{ route('reg-form') }}">Registration</a> | <a href="{{ route('auth-form') }}">Log in</a>
@endsection
