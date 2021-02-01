@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Update ' . $driver->name)
@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Driver</li>
            <li class="breadcrumb-item active">Driver Registration</li>
        </ol>
    </div>
  </header>
  <div class="container">
	<div class="card text-left">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>Driver Update <strong class="text-violet">{{$driver->name}}</strong></h2>
				@can('driver edit')
				<div class="ml-auto">
					<a href="{{route('driver')}}" class="btn btn-outline-primary">
						<i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
				</div>
				@endcan
			</div>

		</div>
		<div class="card-body">
			<form method="post" action="{{route('driver.update' ,$driver->id)}}" class="form-horizontal"
				id="driver_reg" novalidate>
                @csrf
                @method('PATCH')
				@include('operation.driver.form')

				<div class="form-group d-flex  required">

					<div class="ml-auto">
						<button type="submit" class="btn btn-el btn-outline-primary ml-auto" name="save">
							Save update</button>
					</div>

				</div>
		</div>

		<div class="card-footer">

		</div>
		</form>
	</div>
</div>
</div>

@endsection
