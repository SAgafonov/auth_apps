@extends('layouts.app')

@section('title-block')
	<title>Registration</title>
@endsection

@section('content')
        <h1>Registration</h1>
	
	@if($errors->any())
		<div>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	
	<form action="{{ route('reg-check') }}" method="post">
		@csrf

		<label for="name">Username</label>
		<input type="text" name="name" placeholder="Username" id="name">
		<br>
		<br>
		<label for="passwd">Password</label>
                <input type="password" name="passwd" placeholder="Password" id="passwd">
		
                <input type="text" name="role" id="role" value="user" hidden>
		<br>
		<button type="submit">Ok</button>
	</form>
	<br>
        <a href="{{ route('auth-form') }}">Log In</a>
@endsection
