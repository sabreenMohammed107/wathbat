@extends('Customer.webLayout.web')

@section('content')
	<!-- hero slider area -->
    <div class="page-header-section set-bg" data-setbg="{{ asset('webasset/img/contact3.jpg')}}">
			<div class="container">
				<h1 class="header-title">{{ __('titles.contact') }}<span>.</span></h1>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Page section start -->
	<section class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<!-- Blog post -->
					<div class="blog-post">
						<div class="thumb">
							<a href="#">
								<img src="{{ asset('webasset/img/contact4.jpg')}}" alt="">
							</a>
						</div>
					</div>
				</div>
				<div  class="col-lg-4 col-md-12">
					<div class="blog-content">
						<h2>{{ __('titles.contact-here') }}</h2>
						<p>{{ __('titles.contact-here-details') }}</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page section end -->

	<!-- Page section start -->
	<section class="page-section">

		<div class="container pb100">
        @if ($message =Session::get('message'))
		<div id="alertDiv" class="alert alert-info alert-block">
	<button type="button" id="alertClose" class="close" data-dismiss="alert">×</button>	
        <strong style="color:black;font-weight:bold">{{ $message }}</strong>
</div>
	

@endif
			<div class="section-title">
				<h1>{{ __('titles.get-touch') }}</h1>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="col-md-12">
						<div class="footer-item">
							<ul>
								<li><h6 style="margin:0px"><i class="fas fa-home"style="font-size:25px;color:#4169E1"></i> {{ __('titles.wathbet') }}</h6><p style="margin:0px">here is a moment in the life of any aspiring a moment in the life., {{$branch->address}}</p></li>
								<li><h6 style="margin:0px"><i class="fas fa-envelope"style="font-size:25px;color:#4169E1"></i> {{ __('titles.email') }}</h6><p style="margin:0px">{{$branch->email}}</p></li>
								<li><h6 style="margin:0px"><i class="fas fa-phone-alt"style="font-size:25px;color:#4169E1"></i> {{ __('titles.phone) }}</h6><p style="margin:0px">{{$branch->phone}}</p></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-12">
						<form class="contact-form" action="{{url('/contactForm')}}" method="POST">
				@csrf
                            <input type="text" name="name" placeholder="Enter your name">
                            <input type="text" name="mobile" placeholder="Enter your mobile">
							<input type="text" name="email" placeholder="Enter your email address">
							<textarea name="messege" placeholder="Message ..." required=""></textarea>
							<button type="submit" class="site-btn sb-dark">{{ __('titles.send') }}</button>
						</form>
					</div>
					
				</div>
				<div class="col-lg-6">
					<form class="form-area contact-form text-right" id="myForm" action="mail.php" method="post">
						<div class="row">
							<div class="col-lg-12 form-group">
								<style>
									.mapouter {
										position: relative;
										text-align: right;
									}

									.gmap_canvas {
										overflow: hidden;
										background: none !important;
										height: 500px;
									}
								</style>
								<div id="map" class="bg-white">
									<div class="mapouter">
										<div class="gmap_canvas" style="width:100%"><iframe style="width:100%;height:100%" id="gmap_canvas" src="{{$branch->map_url}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net"></a></div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				</div>
		</div>
		
      
	</section>
	<!-- Page section end -->

	

@endsection
@section('scripts')
@endsection