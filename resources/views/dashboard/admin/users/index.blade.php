@extends('dashboard.layouts.app')
@section('main')
@include('dashboard.partials.sidebar')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  @include('dashboard.partials.card-header')
  <div class="form-group float-left">
    <a id="create" href="javascript:void(0)" class="btn btn-outline-primary"><i class="fas fa-plus-square"></i>
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
      <tbody class="content-table">
          @foreach($users as $user)
			<tr id="row_{{ $user->id }}">
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phone }}</td>
				<td>
					{{$user->role ? $user->role->name : false}}
				</td>
				<!--ONLY FOR JQUERY-->
				<td style="display:none">{{ $user->role_id }}</td>
				<td>
				  <a id="edit" href="javascript:void(0)" class="btn btn-outline-success btn-sm rounded-3">
				  <i class="fas fa-edit"></i>
				  </a>
				  <a id="delete" href="javascript:void(0)" class="btn btn-outline-danger btn-sm">
				  <i class="fas fa-trash-alt"></i>
				  </a>
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
@include('dashboard.modals.users.ajax')
@endsection