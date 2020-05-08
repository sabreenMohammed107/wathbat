@extends('Customer.webLayout.web')

@section('content')
<!-- hero slider area -->
<div class="page-header-section set-bg" data-setbg="{{ asset('uploads/'.$project->master_poster) }}">
    <div class="container">
        <h1 class="header-title">@if(app()->getLocale()=='en')
            {{$project->project_en_name}}
            @else
            {{$project->project_ar_name}}
            @endif<span>.</span></h1>
    </div>
</div>
</section>
<!-- Hero section end -->

<!-- Intro section start -->
<section class="intro-section spad mt-4">
    <div class="container">
        <div class="row">
            <!-- Accordions -->
            <div class="col-md-5">
                <h1>{{ __('titles.top-quality-services') }}</h1>
                <div id="accordion" class="accordion-area">
                    <div class="panel">
                        <div class="panel-header" id="headingOne">
                        {{ __('titles.project-details') }}
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1"></button>
                        </div>
                        <div id="collapse1" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="panel-body">
                                <p>
                                    @if(app()->getLocale()=='en')
                                    {{$project->project_en_details}}
                                    @else
                                    {{$project->project_ar_details}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header" id="headingTwo">
                        {{ __('titles.about-project') }}
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2"></button>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="panel-body">
                                <p>
                                    @if(app()->getLocale()=='en')
                                    {{$project->about_en_project}}
                                    @else
                                    {{$project->about_ar_project}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-header active" id="headingThree">
                        {{ __('titles.about-customer') }}
                            <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3"></button>
                        </div>
                        <div id="collapse3" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="panel-body">
                                <p>
                                    @if(app()->getLocale()=='en')
                                    {{$project->about_en_customer}}
                                    @else
                                    {{$project->about_ar_customer}}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6  offset-lg-1">
                <div class="service-slider">
                    @foreach($sliders as $slider)
                    <div class="ss-single">
                        <img class="proj-img" src="{{ asset('uploads/'.$slider->image) }}" alt="">
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Intro section end -->

<!-- Gallery section start -->
<section class="container">
    <div class="page-section spad">
        <!-- portfolio items -->
        <div class="portfolio-warp spad" style="padding:10px">
        <div id="portfolio">
					<div class="grid-sizer"></div>
                    <!-- portfolio item -->
                    @isset($galleries['0'])
					<div class="grid-item set-bg design corp" data-setbg="{{ asset('uploads')}}/{{ $galleries['0']['image']}}"><a class="img-popup" href="{{ asset('uploads')}}/{{ $galleries['0']['image']}}"></a></div>
                    @endisset
                    <!-- portfolio item -->
                    @isset($galleries['1'])
					<div class="grid-item set-bg iden photo uxui" data-setbg="{{ asset('uploads')}}/{{ $galleries['1']['image']}}"><a class="img-popup" href="{{ asset('uploads')}}/{{ $galleries['1']['image']}}"></a></div>
                    @endisset
                    <!-- portfolio item -->
                    @isset($galleries['2'])
					<div class="grid-item set-bg corp design" data-setbg="{{ asset('uploads')}}/{{ $galleries['2']['image']}}"><a class="img-popup" href="{{ asset('uploads')}}/{{ $galleries['2']['image']}}"></a></div>
                    @endisset
                    <!-- portfolio item -->
                    @isset($galleries['3'])
					<div class="grid-item set-bg grid-long uxui iden" data-setbg="{{ asset('uploads')}}/{{ $galleries['3']['image']}}"><a class="img-popup" href="{{ asset('uploads')}}/{{ $galleries['3']['image']}}"></a></div>
                    @endisset
                    <!-- portfolio item -->
                    @isset($galleries['4'])
					<div class="grid-item set-bg grid-long design corp" data-setbg="{{ asset('uploads')}}/{{ $galleries['4']['image']}}"><a class="img-popup" href="{{ asset('uploads')}}/{{ $galleries['4']['image']}}"></a></div>
                    @endisset
                    <!-- portfolio item -->
                    @isset($galleries['5'])
					<div class="grid-item set-bg corp design" data-setbg="{{ asset('uploads')}}/{{ $galleries['5']['image']}}"><a class="img-popup" href="{{ asset('uploads')}}/{{ $galleries['5']['image']}}"></a></div>
                    @endisset
                    <!-- portfolio item -->
                    @isset($galleries['6'])
					<div class="grid-item set-bg uxui iden" data-setbg="{{ asset('uploads')}}/{{ $galleries['6']['image']}}"><a class="img-popup" href="{{ asset('uploads')}}/{{ $galleries['6']['image']}}"></a></div>
                    @endisset
                    <!-- portfolio item -->
                    @isset($galleries['7'])
					<div class="grid-item set-bg design corp" data-setbg="{{ asset('uploads')}}/{{ $galleries['7']['image']}}"><a class="img-popup" href="{{ asset('uploads')}}/{{ $galleries['7']['image']}}"></a></div>
                    @endisset
                </div>
        </div>
    </div>
</section>
<!-- Gallery section end -->

@endsection
@section('scripts')
@endsection