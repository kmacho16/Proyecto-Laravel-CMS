@extends('front.principal')
@section('contenido')
<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="block-content">
					<div class="contact-info-box">
						<div class="title-section">
							<h1><span>Contactanos</span></h1>
						</div>

						<div id="map">{!! Mapper::render() !!}</div>

						<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nisl.</p>

					</div>
					<!-- End contact info box -->

					<!-- contact form box -->
					<div class="contact-form-box">
						<div class="title-section">
							<h1><span>Escribenos tu Opinion	</span></h1>
						</div>
						@include('front.forms.contactForm');
					</div>
				</div>
			</div>

			<div class="col-sm-4">
				<!-- sidebar -->
				<div class="sidebar">
					@include('front.sidebar')
				</div>
				<!-- End sidebar -->
			</div>

		</div>
	</div>
</section>

@endsection

