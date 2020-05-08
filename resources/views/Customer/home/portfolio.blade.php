@extends('Customer.webLayout.web')

@section('content')
<!-- hero slider area -->
<div class="page-header-section set-bg" data-setbg="{{ asset('webasset/img/protfolio.jpg')}}">
	<div class="container">
		<h1 class="header-title">{{ __('titles.portfolio ') }}<span>.</span></h1>
	</div>
</div>
</section>
<!-- Hero section end -->

<!-- Page section start -->
<section class="page-section spad pb-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				<div class="blog-content">
					<h2 style="font-size:25px">{{ __('titles.unique-touch ') }}</h2>
					<p>{{ __('titles.unique-touch-1 ') }}</p>
					<p>{{ __('titles.unique-touch-2 ') }}</p>
				</div>
			</div>
			<div class="col-lg-7 col-md-12">
				<!-- Blog post -->
				<div class="blog-post">
					<div class="thumb">
						<a href="#">
							<img class="proto-img" src="{{ asset('webasset/img/pro1.jpg')}}" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Page section end -->

<!-- Projects section start -->
<div class="projects-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="section-title">
					<h1>{{ __('titles.projects ') }}</h1>
				</div>
			</div>
			<div class="col-lg-9">
				<ul class="projects-filter-nav pt100">
					<li class="btn-filter" data-filter="*" onclick="allProject()">All</li>
					@foreach($types as $type)
					<li class="btn-filter" data-filter=".{{$type->id}}" onClick='ProjectType({{$type->id}})'>{{$type->project_en_type}}</li>

					@endforeach

				</ul>
			</div>
		</div>
	</div>
	<div id="projects-carousel" class="projects-slider">


		@include('Customer.home.portofolioProjects')
	</div>
</div>
<!-- Projects section end -->

<!-- Gallery section start -->
<div class="page-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="section-title">
					<h1>{{ __('titles.gallery ') }}</h1>
				</div>
			</div>
			<!-- portfolio filter menu -->
			<ul class="portfolio-filter col-lg-9 pt100">
				<li class="filter" data-filter="*" onclick="allPortoGallery()">All</li>
				@foreach($portoTypes as $type)
					<li class="filter" data-filter=".{{$type->id}}" onClick='ProjectType({{$type->id}})'>{{$type->en_type}}</li>

					@endforeach
				
			</ul>
		</div>
	</div>
	<!-- portfolio items -->
	<div class="portfolio-warp spad" style="padding:10px">
		<div id="portfolio">
			@include('Customer.home.portofolioGallery')

		</div>
	</div>
</div>
<!-- Gallery section end -->

<!-- Numbers section Start -->
<section class="milestones-section spad">
	<div class="container">
		<div class="row">
			@foreach($numbers as $number)
			<div class="col-lg-3 col-md-6">
				<div class="milestone">
					<h2>{{$number->value}}</h2>
					<p> @if(app()->getLocale()=='en')
						{{$number->en_name}}
						@else
						{{$number->ar_name}}
                        @endif </p>
				</div>
			</div>
			@endforeach
		
		</div>
	</div>
</section>
<!-- Numbers section end -->
@endsection
@section('scripts')
<script>
	function allProject() {


		$.ajax({

				type: 'GET',
				url: 'allProjects',



				success: function(data) {
						// alert("welcome")
						$('#portofolioProject').html(data);
					}

					,
				error: function(response) {

					alert('you must check data');
				}
			}

		);


	}


	function ProjectType(id) {

		var item_id = id;

		$.ajax({

			type: 'GET',
			url: 'ProjectType',
			data: {
				typeId: item_id,

			},
			success: function(data) {
					// alert("welcome")
					$('#portofolioProject').html(data);
				}

				,
			error: function(response) {

				alert('you must check data');
			}


		});



	}

	function allPortoGallery() {


		$.ajax({

				type: 'GET',
				url: 'allPortoGallery',



				success: function(data) {
						// alert("welcome")
						$('#portofolioProject').html(data);
					}

					,
				error: function(response) {

					alert('you must check data');
				}
			}

		);


	}


	function PortoGalleryType(id) {

		var item_id = id;

		$.ajax({

			type: 'GET',
			url: 'ProjectType',
			data: {
				galleryId: item_id,

			},
			success: function(data) {
					// alert("welcome")
					$('#portofolioProject').html(data);
				}

				,
			error: function(response) {

				alert('you must check data');
			}


		});



	}
</script>
@endsection