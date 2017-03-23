@extends('front.principal')

@section('contenido')
		
		<!-- End Header -->

		<!-- ticker-news-section
			================================================== -->
		<section class="heading-news3">
			@include('front.recomendados')
		</section>

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
		<!-- End block-wrapper-section -->
		<!-- footer================================================== -->
		<footer>
			@include('front.footer')
		</footer>
@endsection