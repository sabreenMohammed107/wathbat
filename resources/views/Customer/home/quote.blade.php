@extends('Customer.webLayout.web')

@section('content')
<!-- hero slider area -->
<div class="page-header-section set-bg" data-setbg="{{ asset('webasset/img/project.jpg')}}">
    <div class="container">
        <h1 class="header-title">{{ __('titles.quote') }}<span>.</span></h1>
    </div>
</div>
</section>
<!-- Hero section end -->

<!-- Get a Quotation section start -->
<section class="spad " style="padding:0px;margin-bottom: 70px;">
    <div class="section-title col-lg-12" style="padding-top:50px">
        <h1>{{ __('titles.quote') }}</h1>
        <p>{{ __('titles.slogan') }}</p>
    </div>
    <style>
			body.rtl .vw-quote input 
		 {
				direction: rtl;
			}
		</style>
    <div class="container set-bg">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2 vw-quote">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.height') }} </label>
                            <input class="form-control" type="text" value="{{$data['height']}}" placeholder="{{ __('titles.height') }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.width') }} </label>
                            <input class="form-control" type="text"  value="{{$data['width']}}" placeholder="{{ __('titles.width') }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.type') }}  </label>
                            <input class="form-control" type="text"  value="@if(app()->getLocale()=='en'){{$type->en_type}}@else{{$type->ar_type}}@endif" placeholder="{{ __('titles.type') }} " disabled>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.type-style') }} </label>
                            <input class="form-control" type="text"  value="@if(app()->getLocale()=='en'){{$style->en_style}}@else{{$style->ar_style}}@endif" placeholder="{{ __('titles.type-style') }}" disabled>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.sector-type') }} </label>
                            <input class="form-control" type="text"  value="@if(app()->getLocale()=='en'){{$sector->en_sector}}@else{{$sector->ar_sector}}@endif" placeholder="{{ __('titles.sector-type') }}" disabled>

                        </div>
                    </div>
                    <div class="col-md-6">
							<div class="form-group">
								<label class="txt-white">{{ __('titles.quoteprice') }} </label>
								<input class="form-control" name="width" id="pricePerMeter" type="text" value="{{$sector->price_per_meter}} {{ __('titles.rs') }} " disabled>
							</div>
						</div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.aluminium-thickness') }}  </label>
                            <input class="form-control" type="text"  value="{{$sector->aluminium_thickness}}" placeholder="{{ __('titles.aluminium-thickness') }} " disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.glass') }}</label>
                            <input class="form-control" type="text"  value="{{$sector->glass}}" placeholder="{{ __('titles.glass') }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.color') }}</label>
                            <input type="color" value="{{$data['color']}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-8 offset-lg-2">
                        <div class="form-group">
                            <label class="txt-white">{{ __('titles.price') }}</label>
                            <input class="form-control" type="text" value="{{$data['total']}} {{ __('titles.rs') }} "  disabled>
                        </div>
                    </div>
                    <div class="col-md-8 offset-lg-2">
                        <form class="contact-form">
                            <button id="print_button"  class="site-btn sb-light">{{ __('titles.print') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Get a Quotation section end -->

@endsection
@section('scripts')
<script>
$(document).ready(function() {

$('#print_button').click(function() {
    window.print();
    return false;
});

});
</script>
@endsection