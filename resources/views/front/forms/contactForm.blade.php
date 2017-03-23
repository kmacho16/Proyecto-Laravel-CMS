{!! Form::open(['url'=>'contacto/send','method'=>'POST']) !!}
<div id="contact-form">
	<div class="row">
		<div class="col-md-4">
			{!! Form::label('name','Nombre:*') !!}
			{!! Form::text('name',null,['id'=>'name']) !!}
		</div>
		<div class="col-md-4">
			{!! Form::label('email','Email:*') !!}
			{!! Form::text('email',null,['id'=>'email']) !!}
		</div>
		<div class="col-md-4">
			{!! Form::label('website','Website:') !!}
			{!! Form::text('website',null,['id'=>'website']) !!}
		</div>
	</div>
	{!! Form::label('name','Tu mensaje:*') !!}
	{!! Form::textArea('comment',null,['id'=>'comment']) !!}
	 {!! Form::token() !!}
	<button type="submit" id="submit-contact">
		<i class="fa fa-paper-plane"></i> Send Message
	</button>

</div>
{!! Form::close() !!}