<!-- Page Preloder -->
<div id="preloder">
	<div class="loader"></div>
</div>

<!-- Header section start -->
<header class="header-area">
	<a href="index.html" class="logo-area" style="color:#ffffff !important"><img src="{{ asset('webasset/img/logo1.png')}}" alt=""> Wathbat Al-Tamyoz</a>
	<div class="nav-switch">
		<i class="fa fa-bars"></i>
	</div>
	<!--<div class="phone-number">+675 334 567 223</div>-->
	<nav class="nav-menu" style="background-color:#000000;">
		<ul>
			<li class="active"><a href="{{url('/')}}">{{ __('titles.home') }}</a></li>
			<li><a href="{{url('/about')}}">{{ __('titles.about') }}</a></li>
			<li><a href="{{url('/services')}}">{{ __('titles.services') }}</a></li>
			<li><a href="{{url('/portfolio')}}">{{ __('titles.portfolio') }}</a></li>
			<li><a href="{{url('/contact')}}">{{ __('titles.contact') }}</a></li>
		
		
				<li>
					@if(str_replace('_', '-', app()->getLocale())=='ar')
					<a href="{{ URL::to('changeLang/en') }}" class=" text-white"><span>English</span></a><i class="fas fa-globe-africa" style="color:#ffffff"></i>
				@else
				<i class="fas fa-globe-africa" style="color:#ffffff"></i><a href="{{ URL::to('changeLang/ar') }}" class=" text-white"><span>عربي</span></a></li>
				@endif
				

		</ul>
	</nav>
</header>
<!-- Header section end -->

<!-- Hero section start -->
<section class="hero-section">
	<!-- left social link ber -->
	<div class="left-bar">
		<div class="left-bar-content">
			<div class="social-links">
				<a href="{{$social->facebook_url}}" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="{{$social->twitter_url}}" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="{{$social->linkedin_url}}" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="{{$social->instgram_url}}" target="_blank"><i class="fa fa-instagram"></i></a>
			</div>
		</div>
	</div>