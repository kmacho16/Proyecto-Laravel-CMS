@extends('layouts.admin')

@section('contenido')
	<table class="table table-hover">
		<tr><th>Nombre</th>@if(Auth::user()->id_rol < 2)<th>Opciones</th>@endif</tr>
		@foreach($cats as $category)
			<tr>
				<td>{{$category->name}}</td>
				@if(Auth::user()->id_rol < 2)
				<td>
				{!!link_to_route('categorias.edit',$title='Editar',$parameters=$category->id)!!}
				 
				 {!!Form::open(['route'=>['categorias.destroy',$category->id],'method'=>'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
				{!!Form::close()!!}
				
			 	</td>
			 	@endif
			</tr>
		@endforeach
	</table>
	{{$cats->links()}}
@endsection