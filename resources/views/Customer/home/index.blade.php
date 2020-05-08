@extends('Customer.webLayout.web')

@section('content')

<!-- hero slider area -->
<div class="hero-slider">
	@foreach($sliders as $slider)
	<div class="hero-slide-item set-bg" data-setbg="{{ asset('uploads/'.$slider->image) }}">
		<div class="slide-inner">
			<div class="slide-content">

				<h2> @if(app()->getLocale()=='en')
					{{$slider->master_en_text}}
					@else
					{{$slider->master_ar_text}}
					@endif </h2>
				<a href="#" class="site-btn sb-light">{{ __('titles.our-services') }}</a>
			</div>
		</div>
	</div>
	@endforeach

</div>
<div class="slide-num-holder" id="snh-1"></div>
<!--<div class="hero-right-text">architecture</div>-->
</section>
<!-- Hero section end -->

<!-- Intro section start -->
<section class="intro-section pt100 pb50">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 intro-text mb-5 mb-lg-0">
				<h2 class="sp-title">{{ __('titles.we-architecture') }}</h2>
				<p>{{ __('titles.we-architecture-details') }}.</p>
				<a href="#" class="site-btn sb-dark">{{ __('titles.about') }}</a>
			</div>
			<div class="col-lg-5 pt-4">
				<img src="{{ asset('webasset/img/pic1.jpeg')}}" alt="">
			</div>
		</div>
	</div>
</section>
<!-- Intro section end -->

<!-- Get a Quotation section start -->
<section class="spad set-bg qoute" data-setbg="{{ asset('webasset/img/contact4.jpg')}}" style="padding:0px;">
		<div class="section-title col-lg-12"style="padding-top:50px">
			<h1 class="txt-white">{{ __('titles.quote') }}</h1>
			<p class="txt-white">{{ __('titles.slogan') }}</p>
		</div>
		<div class="container"style="padding-bottom:35px">
			<div class="row">
				<div class="col-lg-8 col-md-12 offset-lg-2">
				<form action="{{url('/quoteForm')}}" method="GET">
				
					<input type="hidden" name="langu" id="langu" value="{{app()->getLocale()}}" >
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.height') }} </label>
								<input class="form-control" name="height" required type="text" placeholder="{{ __('titles.height') }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.width') }} </label>
								<input class="form-control" name="width" required type="text" placeholder="{{ __('titles.width') }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.type') }} </label>
								<select name="type_id" class="form-control  dynamic" required data-show-subtext="true" data-live-search="true" id="country" data-dependent="sub">
									<option value="">{{ __('titles.type') }}....</option>
									@foreach ($types as $type)
									<option value='{{$type->id}}'>
										@if(app()->getLocale()=='en')
										{{$type->en_type}}
										@else
										{{$type->ar_type}}
										@endif</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.type-style') }} </label>
								<select name="type_style" class="form-control dynamix" data-dependent="city" data-show-subtext="true" data-live-search="true" id="sub">
									<option value="">{{ __('titles.type-style') }}....</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.sector-type') }} </label>
								<select name="sector_type" class="form-control lastes" data-show-subtext="true" data-live-search="true" id="city">
									<option value="">{{ __('titles.sector-type') }}....</option>
								</select>
							</div>
						</div>
						<div class="col-md-6"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.aluminium-thickness') }} </label>
								<input class="form-control" name="aluminium_thickness" id="aluminium_thickness" type="text" placeholder="{{ __('titles.aluminium-thickness') }} " disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.glass') }} </label>
								<input class="form-control" name="glass" id="glass" type="text" placeholder="{{ __('titles.glass') }}" disabled>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.color') }} </label>
								<input type="color" name="color" value="#0000">
							</div>
						</div>
						<div class="col-lg-10">
							<form class="contact-form">
							<button type="submit" class="site-btn sb-light get-quote">{{ __('titles.get-quote') }} </button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Get a Quotation section end -->

<!-- Categories section start -->
<div class="">
	<div class="section-title col-lg-12">
		<h1><i class="fas fa-building"></i> {{ __('titles.our-projects') }}</h1>
		<p>{{ __('titles.slogan') }}</p>
	</div>
</div>
<section class="team-section spad">
	<div class="container">
		<div class="section-title mb100">
		</div>
		<div class="row">
			@foreach($projects as $project)
			<div class="col-lg-4 col-md-6">
				<div class="team-member">
					<img class="project-img" src="{{ asset('uploads/'.$project->master_poster) }}" alt="">
					<div class="member-info">
						<a href="{{ url('projectDetails/'.$project->id) }}">
							<h2>{{$project->alumital->project_en_type}}</h2>
						</a>
					</div>
				</div>
			</div>
			@endforeach


		</div>
	</div>
</section>
<!-- Categories section end -->

<!-- Clients section start -->
<div class="">
	<div class="section-title col-lg-12">
		<h1><i class="fas fa-users"></i> {{ __('titles.our-clients') }}</h1>
		<p>{{ __('titles.slogan') }}

		</p>
	</div>
</div>

<div class="client-section spad">
	<div class="">
		<div id="client-carousel" class="client-slider">
			@foreach($clients as $client)
			
			<div class="single-brand">
				<a href="#">
					<img src="{{ asset('uploads/'.$client->logo) }}" alt="">
				</a>
			</div>
			@endforeach
		
		</div>
	</div>
</div>
<!-- Clients section end -->



@endsection
@section('scripts')

<script>
	$(document).ready(function() {

		$('.dynamic').change(function() {

			if ($(this).val() != '') {
				var select = $(this).attr("id");
				var value = $(this).val();
				var lang=$('#langu').val();
			
				$.ajax({
					url: "{{route('dynamicdependentCat.fetch')}}",
					method: "get",
					data: {
						select: select,
						value: value,
						lang:lang,
					},
					success: function(result) {

						$('#sub').html(result);
					}

				})
			}
		});
		$('.dynamix').change(function() {

			if ($(this).val() != '') {
				var select = $(this).attr("id");
				var value = $(this).val();
				var lang=$('#langu').val();


				$.ajax({
					url: "{{route('dynamicdependentCity.fetch')}}",
					method: "get",
					data: {
						select: select,
						value: value,
						lang:lang,
					},
					success: function(result) {

						$('#city').html(result);
					}

				})
			}
		});

		$('.lastes').change(function() {

			if ($(this).val() != '') {
				var select = $(this).attr("id");
				var value = $(this).val();



				$.ajax({
					url: "{{route('dynamicdependentLastes.fetch')}}",
					method: "get",
					data: {
						select: select,
						value: value
					},
					success: function(result) {
					
						$('#aluminium_thickness').val(result[0]);
						$('#glass').val(result[1]);
					}

				})
			}
		});




	});
</script>
@endsection