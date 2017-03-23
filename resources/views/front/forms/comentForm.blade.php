<h3 class="text-center" id="mensaje-enviado">Tu Comentario ya fue enviado</h3>

<form id="comment-form">
	<input type="hidden" id="post_id" value="{{ $post->id }}">
	{!! Form::token() !!}
	<div class="row">
		@if (Auth::check())
			<h3 class="text-center">Vas ha hacer tu comentario como <strong>{{ Auth::user()->name }}</strong></h3 class="text-center">
		<input type="hidden" id="name" value="{{ Auth::user()->name }}">
		<input type="hidden" id="email" value="{{ Auth::user()->email }}">
		<input type="hidden" id="website" value="{{ Auth::user()->email }}">
		<input type="hidden" id="path" value="{{ Auth::user()->path }}">
		<input type="hidden" id="id_rol" value="{{ Auth::user()->id_rol }}">
		@else 

		<div class="col-md-4">
			<label for="name">Name*</label>
			<input id="name" name="name" type="text">
		</div>
		<div class="col-md-4">
			<label for="mail">E-mail*</label>
			<input id="email" name="email" type="text">
		</div>
		<div class="col-md-4">
			<label for="website">Website</label>
			<input id="website" name="website" type="text">
		</div>

		<input type="hidden" id="path" value="NULL">
		<input type="hidden" id="id_rol" value="3">
		
		@endif
		
	</div>
	<label for="comment">Comment*</label>
	<textarea id="comment" name="comment"></textarea>
	<button type="submit" id="submit-contact">
		Post Comment
	</button>
</form>