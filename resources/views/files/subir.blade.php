@extends('layouts.admin')

@section('contenido')
<h1>Formulario Subir Archivos</h1>
{!!Form::open(['url'=>'subir/storage','files'=>true])!!}
	{!!Form::token()!!}
	{!!form::file('image')!!}
	<br>
	{!!form::submit('Enviar',['class'=>'btn btn-primary'])!!}
{!!form::close()!!}
@endsection()