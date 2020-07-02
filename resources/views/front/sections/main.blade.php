<section class="main">
	<div class="container">
		@foreach($categories as $category)
		<div class="row justify-content-md-center">
			<div class="col-lg-2 col-md-4 col-sm-4 col-4">
				<a href="{{ route('product') }}">
					<img class="img-fluid rounded-circle" src="{{ $category->getImage($category->image) }}">
				</a>
			</div>
		    <div id="cat-border" class="col-lg-6 col-md-8 col-sm-8 col-8 mb-3 mt-3">
		      	<h3>{{ $category->title }}</h3>
		    </div>
		    <span>
		    	&nbsp;&nbsp;&nbsp;
		    </span>
		</div>
		@endforeach
	</div>
</section>
