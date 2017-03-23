@extends('layouts.admin')

@section('contenido')
@include('errors.alerts.errorUsers')
	<h1 class="text-center">Formulario para agregar categorias</h1>
		{!!Form::open(['route'=>'categorias.store','method'=>'POST'])!!}
			@include('categorias.forms.formCategories')
		{!!Form::close()!!}

@endsection