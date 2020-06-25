@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
@include('dashboard.partials.card-header')
    <div class="form-group float-left">
      <a href="{{ route('categories.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
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
		    <tbody>
		    @foreach($categories as $category)
		    <tr>
			    <td>{{ $category->id }}</td>
			    <td>{{ $category->title }}</td>
			    <td>
					<img class="img-fluid" src="{{ $category->getImage($category->image) }}" style="max-width:50px">
			    </td>
			    <td>
				   <a href="{{ route('categories.edit', $category) }}" class="btn btn-outline-success btn-sm rounded-3">
				   <i class="fas fa-edit"></i>
				   </a>
				   <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
						<button class="btn btn-outline-danger btn-sm">
							<i class="fas fa-trash-alt"></i>
						</button>
				    </form>
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
@endsection