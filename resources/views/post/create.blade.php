@extends('layouts.admin')

@section('contenido')
@include('errors.alerts.errorUsers');
	<h1>Agregar nuevas entradas</h1>
	{!!Form::open(['route'=>'post.store','method'=>'POST','files'=>true])!!}
		@include('post.form.post')
	{!!Form::close()!!}
@endsection