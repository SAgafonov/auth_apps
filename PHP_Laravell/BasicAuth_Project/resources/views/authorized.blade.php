@extends('layouts.app')

@section('title-block')
        <title>Authorized</title>
@endsection

@section('content')
	@if (Session::has('secret'))
		<h3>Your Secret: {{ Session::get('secret') }}</h3>
	@else
		<p>Your role is to weak</p>
	@endif
@endsection
