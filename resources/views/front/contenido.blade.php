<div class="block-content">

							<!-- grid box -->
	<div class="grid-box">

		<div class="title-section">
			<h1><span>Ultima historia</span></h1>
		</div>

		<ul class="category-filter-posts">
			<li><a class="active" href="#">All</a></li>
			@foreach ($categorias as $cats)
				<li><a href="{{ route('categorias.show',$cats->slug) }}">{{ $cats->name }}</a></li>
			@endforeach
		</ul>

@foreach ($posts as $post)
	@if ($loop->first)
		<div class="news-post standard-post2">
			<div class="post-gallery">
			@if (empty($post->path))
				<img src="/upload/news-posts/1.jpg" alt="">
			@else
				<img src="/uploads/{{ $post->path }}" alt="" style="width: 750px; height: 195px;">
			@endif
		</div>
		<div class="post-title">
			<h2><a href="{{ route('post.show',$post->slug) }}">@if ($post->privado==true)
				<i class="fa fa-lock"></i>
			@endif{{ $post->title }}</a></h2>
		<ul class="post-tags">
			<li><i class="fa fa-clock-o"></i>@php
											$date = new DateTime($post->created_at);
											echo $date->format('d F Y');
										@endphp</li>
		</ul>
		</div>
	</div>
</div>
	<!-- End grid box -->
	<!-- article box -->
<div class="article-box">
	<div class="title-section">
		<h1><span>Ultimos Posts</span></h1>
	</div>
@else
<div class="news-post article-post">
	<div class="row">
		<div class="col-sm-4">
			<div class="post-gallery">
				@if (empty($post->path))
					<img alt="" src="/upload/news-posts/art1.jpg">
				@else
					<img src="/uploads/{{ $post->path }}" alt="" style="width: 229px; height: 127px;">
				@endif
			</div>
		</div>
		<div class="col-sm-8">
			<div class="post-content">
				<h2><a href="{{ route('post.show',$post->slug) }}">
				@if ($post->privado==true)
				<i class="fa fa-lock"></i>
				@endif
			{{ $post->title }}</a></h2>
				<ul class="post-tags">
					<li><i class="fa fa-clock-o"></i>@php
										$date = new DateTime($post->created_at);
										echo $date->format('d F Y');
									@endphp</li>
				</ul>
				<p>
					{!!substr($post->content, 0,100)!!}
				</p>
			</div>
		</div>
	</div>
</div>
@endif
@endforeach
</div>
<div class="center-button">
		{{ $posts->links() }}
	</div>
</div>
								


							