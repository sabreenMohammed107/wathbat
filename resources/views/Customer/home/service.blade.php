@extends('Customer.webLayout.web')

@section('content')

<!-- hero slider area -->
<div class="page-header-section set-bg" data-setbg="{{ asset('webasset/img/service.jpg')}}">
			<div class="container">
				<h1 class="header-title">{{ __('titles.services') }}<span>.</span></h1>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Intro section start -->
	<section class="intro-section spad mt-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="service-slider">
						<div class="ss-single">
							<img class="slider-img" src="{{ asset('webasset/img/review.jpg')}}" alt="">
						</div>
						<div class="ss-single">
							<img class="slider-img" src="{{ asset('webasset/img/review2.jpg')}}" alt="">
						</div>
						<div class="ss-single">
							<img class="slider-img" src="{{ asset('webasset/img/review3.jpg')}}" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-7 service-text">
					<h1>{{ __('titles.services-offer') }}</h1>
					<h2>{{ __('titles.services-offer-1') }}</h2>
					<p>{{ __('titles.services-offer-2') }} </p>
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->

	<!-- Service section start -->
	<section class="service-section spad">
		<div class="container">
			<div class="section-title">
				<h1>{{ __('titles.services') }}</h1>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="sb-icon">
							<div class="sb-img-icon">
								<i class="fas fa-dice-d20"></i>
							</div>
						</div>
						<h3>{{ __('titles.alumetal-interfaces') }}</h3>
						<p>{{ __('titles.alumetal-interfaces-details') }}</p>
						<!-- <a href="#" class="readmore">READ MORE</a> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="sb-icon">
							<div class="sb-img-icon">
								<i class="fas fa-sort-amount-up-alt"></i>
							</div>
						</div>
						<h3>{{ __('titles.alumetal-stairs') }}</h3>
						<p>{{ __('titles.alumetal-stairs-details') }}</p>
						<!-- <a href="#" class="readmore">READ MORE</a> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="sb-icon">
							<div class="sb-img-icon">
								<i class="fas fa-map"></i>
							</div>
						</div>
						<h3>{{ __('titles.alumetal-windows') }}</h3>
						<p>{{ __('titles.alumetal-windows-details') }}</p>
						<!-- <a href="#" class="readmore">READ MORE</a> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="sb-icon">
							<div class="sb-img-icon">
								<i class="fas fa-door-open"></i>
							</div>
						</div>
						<h3>{{ __('titles.sliding-doors') }}</h3>
						<p>{{ __('titles.sliding-doors') }}</p>
						<!-- <a href="#" class="readmore">READ MORE</a> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="sb-icon">
							<div class="sb-img-icon">
								<i class="fas fa-building"></i>
							</div>
						</div>
						<h3>{{ __('titles.aluminum-balconies') }}</h3>
						<p>{{ __('titles.aluminum-balconies-details') }}</p>
						<!-- <a href="#" class="readmore">READ MORE</a> -->
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="service-box">
						<div class="sb-icon">
							<div class="sb-img-icon">
								<i class="fas fa-city"></i>
							</div>
						</div>
						<h3>{{ __('titles.alumetal-interfaces') }}</h3>
						<p>{{ __('titles.alumetal-interfaces-details') }}</p>
						<!-- <a href="#" class="readmore">READ MORE</a> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Service section end -->

@endsection
@section('scripts')
@endsection