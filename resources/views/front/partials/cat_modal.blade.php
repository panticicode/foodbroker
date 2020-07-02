<div id="categoryModal" class="modal">
	@foreach($categories as $category)
	<div class="row">
		<div class="col-lg-2 col-md-4 col-sm-4 col-4">
			<div id="block-thumbnail">
				<a href="#" rel="modal:close">
					<img class="img-fluid rounded-circle" src="{{ $category->getImage($category->image) }}"  data-id="{{ $category->id }}">
				</a>
			</div>
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
