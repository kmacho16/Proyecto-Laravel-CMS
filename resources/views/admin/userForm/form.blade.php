<div class="form-group">
           
      {!!Form::token()!!}
      {!!Form::label('name', 'Nombre: ')!!}
      {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre aqui'])!!}

      {!!Form::label('email', 'Email: ')!!}
      {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese su Email aqui'])!!}

      {!!Form::label('password', 'Password: ')!!}
      {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su Email aqui'])!!}

      {!!Form::select('id_rol',$roles,null,['class'=>'form-control','placeholder'=>'Seleccione rol de su usuario'])!!}
      
      {!!Form::file('image')!!}

      <br>

      {!!Form::submit('Enviar',['class'=>'btn btn-primary'])!!}

</div>