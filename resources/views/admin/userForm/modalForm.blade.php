<div class="row">
      <div class="col-xs-6 col-md-6">
          <a href="#" class="thumbnail" onclick="$('#miImagenInput').click()">
            @if(Auth::user()->path=='' || Auth::user()->path==null)
            <img class="img-responsive"  id="mi_img" src="/img/default-image.png">
            @else
            <img class="img-responsive"  id="mi_img" src="/uploads/{{Auth::user()->path}}"/>
            @endif
          </a>
        </div>
        <div class="col-xs-6 col-md-6">
              {!!Form::token()!!}
      {!!Form::label('name', 'Nombre: ')!!}
      {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese su nombre aqui'])!!}

      {!!Form::label('email', 'Email: ')!!}
      {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese su Email aqui'])!!}

      {!!Form::label('password', 'Password: ')!!}
      {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su Email aqui'])!!}
      {!!Form::file('image',array('id'=>'miImagenInput','style'=>'display:none'))!!}


        </div>
</div>