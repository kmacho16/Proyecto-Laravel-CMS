<div class="form-group">
{!!Form::token()!!}
{!!Form::label('name','Ingrese el nombre de la categoria')!!}
{!!Form::text('name',null,['class'=>'form-control'])!!}
{!!Form::label('slug','Ingrese el slug de la categoria')!!}
{!!Form::text('slug',null,['class'=>'form-control'])!!}
<br>
{!!Form::submit('Enviar',['class'=>'btn btn-info'])!!}
</div>