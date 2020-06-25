@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  @include('dashboard.partials.card-header')
  <div class="form-group float-left">
    <a href="{{ route('users.create') }}" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
    </a>
  </div>
	 <h2 class="text-center">Korisnici</h2>
	 <div class="table-responsive">
   <table class="table table-striped table-sm">
      <thead>
        	<tr>
              <th>#</th>
              <th>IME I PREZIME</th>
              <th>EMAIL</th>
              <th>BROJ TELEFONA</th>
              <th>PRIVILEGIJE</th>
		          <th>АŽURIRANJE</th>
        	</tr>
      </thead>
      <tbody>
          @foreach($users as $user)
          <tr>
  					  <td>{{ $user->id }}</td>
  					  <td>{{ $user->name }}</td>
  					  <td>{{ $user->email }}</td>
  					  <td>{{ $user->phone }}</td>
  					  <td>
  						   {{$user->role ? $user->role->name : false}}
  					  </td>
  					  <td>
    						 <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-success btn-sm rounded-3"><i class="fas fa-edit"></i></a>
    						 <form action="{{ route('users.destroy', $user) }}" method="post" class="d-inline">
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
        {{ $users->appends($_GET)->links() }}
    </div>
  </div>
</main>
@endsection