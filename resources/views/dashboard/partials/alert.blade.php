@php
    $successMessage = session()->pull('success');
    $dangerMessage = session()->pull('danger');
@endphp

@if($successMessage)
<div class="container">
	<div class="alert alert-success text-center" role="alert">
	    {{ $successMessage }}
	</div>
</div>
@endif
@if($dangerMessage)
<div class="container">
	<div class="alert alert-danger text-center" role="alert">
		{{ $dangerMessage }}
	</div>	
</div>
@endif





