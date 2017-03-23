@extends('layouts.admin')

@section('contenido')
@include('errors.alerts.errorUsers');
	<h1>Agregar nuevas entradas</h1>
	{!!Form::model($post,['route'=>['post.update',$post->id],'method'=>'PUT','files'=>true])!!}
		@include('post.form.post')	
	{!!Form::close()!!}
@endsection