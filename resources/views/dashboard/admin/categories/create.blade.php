@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    @include('dashboard.partials.card-header')
    <div class="grid">
    <p class="lead">{{ __(strtoupper('Kreiraj Kategoriju')) }}</p>
    <div class="grid-body">
        <div class="item-wrapper">
            <div class="row mb-3">
                <div class="col-md-8 mx-auto">
                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
	                    <div class="form-group row">
	                        <div class="col-md-3">
	                            <label for="inputType1" class="col-form-label">
	                           		{{ __(strtoupper('Naziv')) }}
	                       		</label>
	                        </div>
	                        <div class="col-md-9">
	                            <input type="text" name="category" class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" id="inputType1" value="{{ old('category') }}">
	                            @if($errors->has('category'))
	                            <div class="invalid-feedback">
	                               {{ $errors->first('category') }}
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
	                        <div class="col-md-12">
	                            <button class="btn btn-success btn-block">
	                            	Kreiraj
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
@endsection