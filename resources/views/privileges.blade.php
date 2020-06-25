@extends('front.layouts.app')
@section('main')
<section id="privileges" class="privileges">
	<img src="{{ asset('images/privileges.jpg') }}" class="img-fluid" alt="privileges">
	<h1>
		NEMATE PRISTUP OVOJ STRANICI
	</h1>
</section>
@endsection
@section('script')
<script>
	$(() => {
		if($(window).innerWidth() < 576)
		{
			$("#privileges img").css("width", '53vh')
		}
	})
</script>
@endsection


