@extends('layouts.admin')

@section('contenido')
@include('errors.alerts.errorUsers')
	<h1>Formulario de edición</h1>
	{!!Form::model($usuario,['route'=>['admin.update',$usuario->id],'method'=>'PUT','files'=>true])!!}
		@include('admin.userForm.form')	
	{!!Form::close()!!}
@endsection