@extends('Customer.webLayout.web')

@section('content')
<!-- hero slider area -->
<div class="page-header-section set-bg" data-setbg="{{ asset('webasset/img/contact3.jpg')}}">
			<div class="container">
				<h1 class="header-title">{{ __('titles.about') }}<span>.</span></h1>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Intro section start -->
	<section class="intro-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 intro-text">
					<h1>{{ __('titles.who-we') }}</h1>
					<div class="row">
						<div class="col-md-12">
							<p>{{ __('titles.who-we-1') }} </p>
							<p>{{ __('titles.who-we-2') }} </p>
						</div>
					</div>
				</div>
				<div class="col-lg-5 pt-4">
					<img class="about-img" src="{{ asset('webasset/img/team.jpg')}}" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- Intro section end -->

	<!-- Service box section start -->
	<div class="service-box-section spad set-bg" data-setbg="{{ asset('webasset/img/contact3.jpg')}}"style="margin-bottom:200px">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="solid-service-box">
						<h2>01.</h2>
						<h3>{{ __('titles.idea') }}</h3>
						<p>{{ __('titles.idea-details') }}</p>
						<a href="{{url('/contact')}}" class="readmore">{{ __('titles.get-touch') }}</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="solid-service-box">
						<h2>02.</h2>
						<h3>{{ __('titles.behind-work') }}</h3>
						<p>{{ __('titles.behind-work-details') }}</p>
						<a href="{{url('/contact')}}" class="readmore">{{ __('titles.get-touch') }}</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-12">
					<div class="solid-service-box">
						<h2>03.</h2>
						<h3>{{ __('titles.success') }}</h3>
						<p>{{ __('titles.success-details') }}</p>
						<a href="{{url('/contact')}}" class="readmore">{{ __('titles.get-touch') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Service box section end -->

	<!-- Testimonials section start -->
	<section class="testimonials-section spad" style="margin-bottom:160px !important">
		<div class="testimonials-image-box"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-7 pl-lg-0 offset-lg-5 cta-content">
					<h1>{{ __('titles.clients-reviews') }}</h1>
					<div class="qut">“</div>
					<div class="testimonials-slider" id="test-slider">
						
						@foreach($reviews as $review)
						<div class="ts-item">
							<p>
                            @if(app()->getLocale()=='en')
                            {{ Str::limit($review->client_en_review, 350,'...') }}
						
                        @else
                        {{ Str::limit($review->client_ar_review, 350,'...') }}
						
                        @endif 
                                                 </p>
							<h4>@if(app()->getLocale()=='en')
						{{$review->en_name}}
						@else
						{{$review->ar_name}}
						@endif </h4>
							<span>@if(app()->getLocale()=='en')
						{{$review->en_position}}
						@else
						{{$review->ar_position}}
						@endif </span>
                        </div>
                        @endforeach
					</div>
					<div class="slide-num-holder test-slider" id="snh-2"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonials section end -->

@endsection
@section('scripts')
@endsection