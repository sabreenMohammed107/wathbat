<!-- Newsletter section Start -->
<section class="promo-section pt-0 pb-0">
	<div class="promo-box set-bg" data-setbg="{{ asset('webasset/img/sub0.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 promo-text">
					<h1>{{ __('titles.fabulouse') }}</h1>
					<p>{{ __('titles.fabulouse-details') }}.</p>
				</div>
				<div class="col-lg-3 text-lg-right">
					<a href="{{url('/contact')}}" class="site-btn sb-light mt-4">{{ __('titles.get-touch') }}</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Newsletter section Start -->
<!-- Footer section start -->
<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<hr />
					<div class="row">
						<div class="col-md-3"><img src="{{ asset('webasset/img/logo.jpeg')}}" /></div>
						<div class="col-md-3 offset-lg-1">
							<div class="footer-item">
								<ul>
									<li><h6 style="margin:0px"><i class="fas fa-home"></i> {{ __('titles.wathbet') }}</h6><p style="margin:0px">{{$branch->address}}</p></li>
									<li><h6 style="margin:0px"><i class="fas fa-envelope"></i> {{ __('titles.email') }}</h6><p style="margin:0px">{{$branch->email}}</p></li>
									<li><h6 style="margin:0px"><i class="fas fa-phone-alt"></i> {{ __('titles.phone') }}</h6><p style="margin:0px">{{$branch->phone}}</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="footer-item">
								<ul>
									<li><a href="{{url('/')}}"><i class="fas fa-dot-circle"></i> {{ __('titles.home') }}</a></li>
									<li><a href="{{url('/about')}}"><i class="fas fa-dot-circle"></i> {{ __('titles.about') }}</a></li>
									<li><a href="{{url('/services')}}"><i class="fas fa-dot-circle"></i> {{ __('titles.services') }}</a></li>
									<li><a href="{{url('/portfolio')}}"><i class="fas fa-dot-circle"></i> {{ __('titles.portfolio') }}</a></li>
									<li><a href="{{url('/contact')}}"><i class="fas fa-dot-circle"></i> {{ __('titles.contact') }}</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget-area">
								<div class="instagram-widget" style="padding:0px">
									<a href="#"><img src="{{ asset('webasset/img/f1.jpg')}}" alt="#"></a>
									<a href="#"><img src="{{ asset('webasset/img/f2.jpg')}}" alt="#"></a>
									<a href="#"><img src="{{ asset('webasset/img/f3.jpg')}}" alt="#"></a>
									<a href="#"><img src="{{ asset('webasset/img/f4.jpg')}}" alt="#"></a>
									<a href="#"><img src="{{ asset('webasset/img/f5.jpg')}}" alt="#"></a>
									<a href="#"><img src="{{ asset('webasset/img/f6.jpg')}}" alt="#"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer section end -->
