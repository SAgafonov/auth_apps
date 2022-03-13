@extends('layouts.app')

@section('title-block')
	<title>Authorization</title>
@endsection

@section('content')
	<div class="alert alert-success">
                {{ session('status') }}
        </div>
	<h1>Authorization</h1>
	@if($errors->any())
                <div>
                        <ul>
                                @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach
                        </ul>
                </div>
        @endif
	<form method="POST" action="{{route('auth-check') }}">
		@csrf
		
		<label for="name">Username</label>
                <input type="text" name="name" placeholder="Username" id="name">
                <br>
                <br>
                <label for="passwd">Password</label>
                <input type="password" name="passwd" placeholder="Password" id="passwd">
		<br>
                <button type="submit">Ok</button>
	</form>
	<br>
	<a href="{{ route('reg-form') }}">Registration</a>
@endsection
