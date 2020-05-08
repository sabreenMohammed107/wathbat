<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Wathbat Altamayoz</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{ asset('webasset/img/favicon.ico')}}" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('webasset/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{ asset('webasset/css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{ asset('webasset/fonts/fontawesome-free-5.10.1-web/css/all.css')}}" />
	<link rel="stylesheet" href="{{ asset('webasset/css/font-awesome.min.css')}}" />
	<link rel="stylesheet" href="{{ asset('webasset/css/animate.css')}}" />
	<link rel="stylesheet" href="{{ asset('webasset/css/magnific-popup.css')}}" />
	<link rel="stylesheet" href="{{ asset('webasset/css/owl.carousel.css')}}" />
	<link href="{{ asset('webasset/css/style.css')}}" rel="stylesheet" />



  @yield('style')
</head>

