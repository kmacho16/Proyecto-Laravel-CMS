@extends('front.principal')

@section('contenido')
		<section class="block-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						@include('front.contenido')
					</div>

					<div class="col-sm-4">	
						@include('front.sidebar')
					</div>

				</div>
			</div>
		</section>
		<footer>
			@include('front.footer')
		</footer>

@endsection