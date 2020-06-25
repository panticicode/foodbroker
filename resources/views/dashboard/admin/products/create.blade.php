@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    @include('dashboard.partials.card-header')
    <div class="grid">
    <p class="lead">{{ __(strtoupper('Dodaj Proizvod')) }}</p>
    <div class="grid-body">
        <div class="item-wrapper">
            <div class="row mb-3">
                <div class="col-md-10 mx-auto">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
	                    <div class="form-group row">
	                        <div class="col-md-3">
	                            <label for="inputType1" class="col-form-label">
	                           		{{ __(strtoupper('Naziv')) }}
	                       		</label>
	                        </div>
	                        <div class="col-md-9">
	                            <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="inputType1" value="{{ old('title') }}">
	                            @if($errors->has('title'))
	                            <div class="invalid-feedback">
	                               {{ $errors->first('title') }}
	                            </div>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-md-3">
	                           <label for="inputType4">
									{{ __(strtoupper('Kategorija')) }}
	                           </label>
	                        </div>
	                        <div class="col-md-9">
	                        	<select name="category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" id="inputType4">
	                        		<option value="">
	                        			Izaberite kategoriju
	                        		</option>
	                        		@foreach($categories as $category)
	                        		<option value="{{ $category->id }}">
	                        			{{ $category->title }}
	                        		</option>
	                        		@endforeach
	                        	</select>
	                            @if($errors->has('category'))
	                            <div class="invalid-feedback">
	                               {{ $errors->first('category') }}
	                            </div>
	                         @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                    	<div class="col-md-3">
		                        <label for="inputType2" class=" col-form-label">
									{{ __(strtoupper('Cena')) }}
	                            </label>
	                        </div>
	                        <div class="col-md-9">
	                            <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="inputType2" value="{{ old('price') }}" >
	                            @if($errors->has('price'))
	                            <div class="invalid-feedback">
	                              {{ $errors->first('price') }}
	                            </div>
	                            @endif
	                        </div>
	                    </div>
						<div class="form-group row">
					        <div class="form-group col-md-3">
					         	<label for="image">
							   		{{ __(strtoupper('Slika')) }}
			                    </label>
					      	</div>
					      	
					      	<div class="input-group col-md-9">
							  	<div class="custom-file">
							    	<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
							    	<input type="file" name="image" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : '' }}" id="inputGroupFile01">
							    	@if($errors->has('image'))
					                <div class="invalid-feedback">
					                    {{ $errors->first('image') }}
					                </div>
					                @endif
							  	</div>
							</div>
					    </div>
						<div class="form-group row">
							<div class="col-md-3">
								{{ __(strtoupper('Vidljivost')) }}
							</div>	
							<div class="col-md-3">
								<div class="custom-control custom-checkbox custom-control-inline">
								    <input type="checkbox" name="visibility" class="custom-control-input {{ $errors->has('visibility') ? 'is-invalid' : '' }}" id="visibility" value="DA">
								    <label class="custom-control-label" for="visibility">
								    	<div id="visibility-value"></div>
								    </label>
								    @if($errors->has('visibility'))
					                <div class="invalid-feedback">
					                   {{ $errors->first('visibility') }}
					                </div>
					                @endif
								</div>
							</div>
							<div class="col-md-3">
								{{ __(strtoupper('KOLIČINA')) }}
							</div>
							<div class="col-md-3">
								<div class="custom-control custom-checkbox custom-control-inline">
								    <input type="checkbox" name="productType" class="custom-control-input {{ $errors->has('productType') ? 'is-invalid' : '' }}" id="productType" value="KG">
								    <label class="custom-control-label" for="productType">
								    	<div id="productType-value"></div>
								    </label>
								    @if($errors->has('productType'))
					                <div class="invalid-feedback">
					                    {{ $errors->first('productType') }}
					                </div>
					                @endif
								</div>
							</div>
						</div>
	                    <div class="form-group row">
	                        <div class="col-md-3">
	                           <label for="description">
							   		{{ __(strtoupper('Opis')) }}
	                           </label>
	                        </div>
	                        <div class="col-md-9">
	                           <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }} z-depth-1" rows="7">{{ old('description') }}</textarea>
	                           @if($errors->has('description'))
	                           <div class="invalid-feedback">
	                             {{ $errors->first('description') }}
	                           </div>
	                           @endif
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <div class="col-md-12">
	                            <button class="btn btn-success btn-block">
	                            	DODAJ NOVI PROIZVOD
	                            </button>
	                        </div>
	                    </div>
                    </form>
             	</div>
            </div>
        </div>
    </div>
 </div>
</main>
<!-- @include('dashboard.partials.tinyeditor') -->
@endsection
@section('script')
<script>
$('#visibility-value').text($('#visibility').val())
$('#productType-value').text($('#productType').val())
	$("#visibility").on('change', (evt) => {
	  	if($(evt.currentTarget).is(':checked')) 
	  	{
			$(evt.currentTarget).attr('value', 'NE')
		} 
		else
		{
	    	$(evt.currentTarget).attr('value', 'DA')
	  	}
	  	$('#visibility-value').text($('#visibility').val())
	})
	$("#productType").on('change', (evt) => {
	  	if($(evt.currentTarget).is(':checked')) 
	  	{
			$(evt.currentTarget).attr('value', 'KOM')
		} 
		else
		{
	    	$(evt.currentTarget).attr('value', 'KG')
	  	}
	  	$('#productType-value').text($('#productType').val())
	})	
</script>
@endsection
