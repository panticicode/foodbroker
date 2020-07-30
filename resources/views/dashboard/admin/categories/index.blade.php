@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
@include('dashboard.partials.card-header')
    <div class="form-group float-left">
      <a id="create" href="javascript:void(0)" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
      </a>
    </div>
	<h2 class="text-center">Kategorije</h2>
	<div class="table-responsive">
	    <table class="table table-striped table-sm">
		    <thead>
		    	<tr>
		            <th>#</th>
		            <th>NAZIV</th>
		            <th>SLIKA</th>
			        <th>АŽURIRANJE</th>
		    	</tr>
		    </thead>
		    <tbody class="content-table">
		    @foreach($categories as $category)
		    <tr id="row_{{ $category->id }}">
			    <td>{{ $category->id }}</td>
			    <td>{{ $category->title }}</td>
			    <td>
					<img class="img-fluid" src="{{ $category->getImage($category->image) }}" style="max-width:50px;">
			    </td>
			    <td>
				   <a id="edit" href="javascript:void(0)" class="btn btn-outline-success btn-sm rounded-3">
				   <i class="fas fa-edit"></i>
				   </a>
					<a id="delete" href="javascript:void(0)" class="btn btn-outline-danger btn-sm rounded-3">
				   <i class="fas fa-trash-alt"></i>
				   </a>
			    </td>
			</tr>	
		    @endforeach
		    </tbody>
	    </table>
	    <div class="float-right">
	        {{ $categories->appends($_GET)->links() }}
	    </div>
  	</div>
</main>
@include('dashboard.modals.categories.ajax')
@endsection