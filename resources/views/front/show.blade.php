@extends('front.principal')
@section('contenido')
<section class="block-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="block-content">
					<div class="single-post-box">
						<div class="title-post">
							<h1>{{ $post->title }}</h1>
							<ul class="post-tags">
								<li>
								<i class="fa fa-clock-o"></i>
								{{ $post->created_at }}
								</li>
								<li>
									<i class="fa fa-file"></i>
									<a href="{{ route('categorias.show',$post->catSlug) }}">{{ $post->categoria }}</a>
								</li>
							</ul>
						</div>
						<div class="post-gallery">
						@if(empty($post->path))
							<img src="{{ url('upload/news-posts/single1.jpg') }}">
						@else
							<img src="/uploads/{{ $post->path }}">
						@endif
						</div>

						<div class="post-content">
							{!! $post->content !!}
						</div>

						<div class="post-tags-box">
							<ul class="tags-box">
								<li><i class="fa fa-tags"></i><span>Tags:</span></li>
								@php
									$tags = explode(',', $post->tags );
								@endphp
								@foreach ($tags as $tag)
									<li><a href="{{ url('tags',$tag) }}">{{$tag  }}</a></li>
								@endforeach
							</ul>
						</div>

						<div class="share-post-box">
							<ul class="share-box">
								<li><i class="fa fa-share-alt"></i><span>Share Post</span></li>
								<li><a class="facebook" href="#"><i class="fa fa-facebook"></i>Share on Facebook</a></li>
							</ul>
						</div>

	<!-- carousel box -->
	<div class="carousel-box owl-wrapper">
		<div class="title-section">
			<h1><span>Te podria interesar</span></h1>
		</div>
		<div class="owl-carousel" data-num="3">
		@foreach ($random as $ran)

			<div class="item news-post image-post3">
				@if(empty($ran->path))
					<img src="/upload/news-posts/2.jpg" alt="">
				@else
					<img src="/uploads/{{ $ran->path }}" style="width: 243px;height: 194px">
				@endif
				<div class="hover-box">
					<h2><a href="{{ route('post.show',$ran->slug) }}">{{ $ran->title }}</a></h2>
					<ul class="post-tags">
						<li><i class="fa fa-clock-o"></i>{{ $ran->created_at }}</li>
					</ul>
				</div>
			</div>
		@endforeach
		</div>
	</div>
	<!-- End carousel box -->

						<!-- contact form box -->
						<div class="contact-form-box">
							@include('front.comentarios')
						</div>
						<!-- End contact form box -->
					</div>
					<!-- End single-post box -->
				</div>
				<!-- End block content -->
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

@section('scriptAjax')
	{!! Html::script('js/scriptAjax.js') !!}
@endsection

