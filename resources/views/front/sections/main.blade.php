@section('style')
<style type="text/css">
	footer {
			
	}
	footer p {
		bottom: -141px;
	}
	@media (max-width: 575px){
		footer {
			position: absolute;
		}
		footer p {
			left: -13px;
			bottom: 0;
		}
	}
</style>
@endsection
<section class="main">
	<div class="container">
		<a href="{{ route('product') }}">
		@foreach($categories as $category)
		<div class="row justify-content-md-center">
			<div class="col-lg-2 col-md-4 col-sm-4 col-4">
				<img class="img-fluid rounded-circle" src="{{ $category->getImage($category->image) }}">
			</div>
		    <div id="cat-border" class="col-lg-6 col-md-8 col-sm-8 col-8 mb-3 mt-3">
		      	<h3>{{ $category->title }}</h3>
		    </div>
		    <span>
		    	&nbsp;&nbsp;&nbsp;
		    </span>
		</div>
		@endforeach
		</a>
	</div>
</section>
