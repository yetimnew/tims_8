@extends( 'master.app' )
@section( 'title', 'TIMS | Performance Edit' )
@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Performance</li>
        </ol>
    </div>
</header>
<div class="container">
	<div class="card text-left">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>Performance Update of FO <span class="text blue"> {{$performance->FOnumber}} </span></h2>
				@can('performance create')
				<div class="ml-auto">
					<a href="{{route('performance.index')}}" class="btn btn-outline-primary">
						<i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>

				</div>
				@endcan
			</div>
		</div>
		<div class="card-body">
			<form method="POST" action="{{route('performance.update',$performance->id)}}" class="form-horizontal"
				id="performance_edit_form" novalidate>
				@csrf
                @method('PATCH')
				@include('operation.performance.form')

				<h3 class="font-weight-bold"> Is The Driver Retrned fill the form </h3>
				<div class="form-group ">
					<label class="control-label" for="is_returned">Returned</label>
					<select name="is_returned" class="form-control select" id="is_returned">
						@if ($performance->is_returned)
						<option value="0" > Not Returnded</option>
						<option value="1" selected> Returned</option>
						@else
						<option value="1" > Returned</option>
						<option value="0" selected> Not Returnded</option>
						@endif
					</select>
					<span class="invalid-feedback" role="alert"></span>
				</div>
				<div class="form-group">
					<label class="control-label" for="returned_date"> Returnded Date</label>
					<div class="input-group">
						<input name="returned_date" type="text"
							class="form-control {{ $errors->has('returned_date') ? ' is-invalid' : '' }}" id="returned_date"
							value="{{ old('returned_date') ?? $performance->returned_date}}">
						<div class="input-group-append">
							<button type="button" id="toggle2" class="input-group-text">
								<i class="fa fa-calendar" aria-hidden="true"></i>
							</button>
						</div>
						@if($errors->has('returned_date'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('returned_date') }}</strong>
						</span>
						@endif

					</div>
					<span class="invalid-feedback" role="alert"></span>
				</div>

				<div class="form-group float-right ">
					<button type="submit" class="btn btn-outline-primary btn-lg" name="save">
						<i class="fafa-save    "></i>
						Save</button>

				</div>


		</div>

	</div>
</div>
<div class="card-footer">
</div>

</form>
</div>
</div>

@endsection
@section( 'javascript' )
<script>

</script>

@endsection
