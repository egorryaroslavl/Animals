@extends('layouts.epetcare.private.users.index')
@section('content')
	<h3>Раздел {{ $data->category }}</h3>
@include('user.private.form')
@endsection