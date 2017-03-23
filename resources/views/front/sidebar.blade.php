<div class="sidebar">
	<div class="widget tab-posts-widget">

		<ul class="nav nav-tabs" id="myTab">
			<li class="active">
				<a>{{ $nomCat[0]->name }}</a>
			</li>
		</ul>
		@if (empty($postByCat[0]))
			<p class="text-center">NO hay entradas para esta categoria</p>
		@else
		<div class="tab-content">
			<div class="tab-pane active" id="option1">
				<ul class="list-posts">
				@foreach ($postByCat as $PBC)
					<li>
					@if($PBC->path=='' || $PBC->path==null)
					<img src="/upload/news-posts/listw1.jpg" alt="">
					@else
					<img src="/uploads/{{$PBC->path}}" style="width: 75px; height: 66px" />
					@endif



						
						<div class="post-content">
							<h2><a href="{{ route('post.show',$PBC->slug) }}">{{ $PBC->title }} </a></h2>
							<ul class="post-tags">
								<li>
								<i class="fa fa-clock-o"></i>
								@php
								$date = new DateTime($PBC->created_at);
								echo $date->format('d F Y');
								@endphp
								</li>
							</ul>
						</div>
					</li>
				@endforeach
				</ul>
			</div>
		</div>

		@endif
	</div>
</div>
