<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<!--<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>-->
	{!!Html::style('css/bootstrap.min.css') !!}
    {!!Html::style('css/font-awesome.min.css') !!}
	{!! Html::style('css/jquery.bxslider.css')  !!}
	{!! Html::style('css/magnific-popup.css')  !!}
	{!! Html::style('css/owl.carousel.css')  !!}
    {!! Html::style('css/owl.theme.css')  !!}
	{!! Html::style('css/ticker-style.css')  !!}
	{!! Html::style('css/style.css')  !!}
	{!! Html::script('js/jquery.min.js') !!}
</head>
<body>
	<header class="clearfix">
				<!-- Bootstrap navbar -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<!-- Logo & advertisement -->
			<div class="logo-advertisement">
				<div class="container">
					
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}" alt=""></a>
					</div>
				</div>
			</div>
			<!-- End Logo & advertisement -->

			<!-- navbar list container -->
			<div class="nav-list-container">
				<div class="container">
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					@include('front.menus.items',['items'=>$menu_miMenu->roots()])
				</ul>
				
					<form class="navbar-form navbar-right" role="search">
						<input type="text" id="search" name="search" placeholder="Search here">
						<button type="submit" id="search-submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			</div>
			<!-- End navbar list container -->

		</nav>
				<!-- End Bootstrap navbar -->
	</header>
	<!-- Container -->
	<div id="container">
		@yield('contenido')
        @include('flashy::message')
	</div>
	<!-- End Container -->
	
	
	{!! Html::script('js/jquery.migrate.js') !!}
	{!! Html::script('js/jquery.bxslider.min.js') !!}
	{!! Html::script('js/jquery.magnific-popup.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/jquery.ticker.js') !!}
	{!! Html::script('js/jquery.imagesloaded.min.js') !!}
  	{!! Html::script('js/jquery.isotope.min.js') !!}
	{!! Html::script('js/owl.carousel.min.js') !!}
	{!! Html::script('js/retina-1.1.0.min.js') !!}
	{!! Html::script('js/script.js') !!}

	@section('scriptAjax')
	@show
	


</body>
</html>