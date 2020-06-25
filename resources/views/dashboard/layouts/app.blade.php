@include('dashboard.partials.header')
@include('dashboard.partials.navbar')
<main>
<section id="admin" class="admin">
	<div class="container-fluid">
		<div class="row">
			@include('dashboard.partials.alert')
			@yield('main')
		</div>
	</div>	
</section>
</main>
@include('dashboard.partials.footer')



