@extends('layouts.admin')

@section('contenido')
		
		
		<h1 class="text-center text-uppercase">Estos son los usuarios registrados</h1>
		<div class="form-inline">
		{!! Form::model(Request::only(['search','type']),['route'=>'admin.index','method'=>'get']) !!}
			<div class="form-group">
				<input type="text" name="search" class="form-control" placeholder="Buscar...">
				{!!Form::select('type',$roles,null,['class'=>'form-control','placeholder'=>'Seleccione rol de su usuario'])!!}
				{!! Form::submit('Buscar',['class'=>'btn btn-info']) !!}
			</div>
		{!! Form::close() !!}
		</div>
		<hr>
		<table class="table table-hover">
			<th>Imagen</th><th>nombre</th><th>Rol</th><th>Email</th><th>Opciones</th>
			@foreach($usuarios as $usuario)
				<tr>
					<td>
					@if($usuario->path=='' || $usuario->path==null)
					<img class="img-responsive" style="width: 60px;" src="/img/default-image.png">
					@else
					<img class="img-responsive" style="width: 60px;" src="uploads/{{$usuario->path}}"/>
					@endif
					</td>
					<td>{{$usuario->name}}</td>
					<td>{{$usuario->id_rol}}</td>
					<td>{{$usuario->email}}</td>
					<td>
						{!!link_to_route('admin.edit',$title='Editar',$parameters = $usuario->id, $attributes=['class'=>'btn btn-warning'])!!}
					</td>
					<td>
						{!!Form::open(['route'=>['admin.destroy',$usuario->id],'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
						{!!Form::close()!!}
					</td>
				</tr>
			@endforeach
		</table>

		{{$usuarios->links()}}

@endsection
