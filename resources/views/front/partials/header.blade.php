<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ env('APP_NAME') }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.modal.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('awesome/css/all.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css?v=1.4') }}">
	@yield('style')
</head>
<body>
	<main>