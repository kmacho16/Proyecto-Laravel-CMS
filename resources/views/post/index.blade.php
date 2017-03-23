@extends('layouts.admin')

@section('contenido')
<h1 class="text-center">Lista de entradas</h1>
<table class="table table-hover">
	<tr><th>Nombre</th><th>Slug</th><th>Recomendado</th><th>Categoria</th>@if(Auth::user()->id_rol < 2)<th>Opciones</th>@endif</tr>
	@foreach($posts as $post)
		<tr>
			<td>@if ($post->privado==true)
				<i class="fa fa-lock fa-2x"></i>
			@endif {{ $post->title }} </td>
			<td>{{ $post->slug }}</td>
			<td>@if ($post->recomendado)
				<i class="fa fa-check"></i>
				@else
				<i class="fa fa-times"></i>
			@endif</td>
			<td>{{ $post->name }}</td>
			@if(Auth::user()->id_rol < 2)
			<td>
			{!!Form::open(['route'=>['post.destroy',$post->id],'method'=>'DELETE'])!!}
				{!!link_to_route('post.edit',$title='Editar',$parameters = $post->id)!!} 
				{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
			{!!Form::close()!!}
			</td>
			@endif
		</tr>
	@endforeach	
</table>
{{$posts->links()}}
@endsection