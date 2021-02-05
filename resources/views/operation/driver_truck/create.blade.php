@extends( 'master.app' )
@section( 'title', 'TIMS |Driver Truck' )
@section( 'content' )

<div class="col-md-12">
    <header class="page-header mb-4">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Driver And Truck </li>
            </ol>
        </div>
      </header>

	@include('master.error') {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">

			<div class="d-flex align-items-center">
				<h2>Truck And Driver Registration</h2>
				<div class="ml-auto">
					<a href="{{route('driver_truck.index')}}" class="btn btn-outline-primary">
						<i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>


				</div>
			</div>
		</div>

{{-- {{dd($drivers)}} --}}
		<div class="card-body">
			<form method="post" action="{{route('driver_truck.store')}}" class="form-horizontal"
				id="driver_truck_create">
				@csrf
						<div class="form-group required">
							<label class="control-label">truck_id Number</label>

							<select name="truck_id" id="truck_id"
								class="form-control {{ $errors->has('truck_id') ? ' is-invalid' : '' }}"
								onfocusout="validatetruck_id()">
								<option class="dropup" value=""> Select One</option>
								@foreach ($trucks as $truck)
								<option class="dropup" value="{{$truck->id}}"> {{$truck->plate}} </option>
								@endforeach
							</select>

                            @if ($errors->has('truck_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('truck_id') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group required">
							<label class="control-label">Driver Name</label>
							<select name="driver_id" class="form-control {{ $errors->has('driver_id') ? ' is-invalid' : '' }}"
								id="driver_id" onfocusout="validatedriver_id()">
								<option class="dropup" value=""> Select One</option>
								@foreach ($drivers as $dr)
					            		<option class="dropup" value="{{$dr->id}}"> {{$dr->name}} </option>
								@endforeach

							</select>
							@if ($errors->has('driver_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('driver_id') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group required">
							<label class="control-label">Date Recived</label>
							<div class="input-group">
								<input name="recieve_date" type="text"
									class="form-control {{ $errors->has('recieve_date') ? ' is-invalid' : '' }}" id="recieve_date"
									value="{{ old('recieve_date' ) }}" onfocusout="validaterecieve_date()">
								<div class="input-group-append">
									<button type="button" id="toggle" class="input-group-text">
										<i class="fa fa-calendar" aria-hidden="true"></i>
									</button>
								</div>
								@if($errors->has('recieve_date'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('recieve_date') }}</strong>
								</span>
								@endif
								<span class="invalid-feedback" role="alert"></span>
							</div>
						</div>


						<div class="form-group ">
							<button type="submit" class="btn btn-primary" name="save">Save</button>

						</div>

					</div>

			</form>

		</div>
	</div>


@endsection

@section( 'javascript' )
<script type="text/javascript">
	jQuery.datetimepicker.setDateFormatter('moment');
		  $("#recieve_date").datetimepicker({
		timepicker:false,
		datepicker:true,
		format: "Y-M-D"
		// format: "YYYY-MM-DD H:mm a"
		// autoclose: true,
		// todayBtn: true,
		// startDate: "2013-02-14 10:00",
		// minuteStep: 10
		// Step: 30,
	});
	$('#toggle').on('click', function(){
		$("#recieve_date").datetimepicker('toggle');
	})

</script>
<script>
const truck_id = document.getElementById( 'truck_id' );
const driver_id = document.getElementById( 'driver_id' );
const recieve-date = document.getElementById( 'recieve_date' );

// const recieve_date = document.getElementById( 'recieve_date' );

const driver_truck_create = document.getElementById( 'driver_truck_create' );

driver_truck_create.addEventListener( 'submit', function ( event ) {
event.preventDefault();
if (
validatetruck_id() &&
validatedriver_id() &&
validaterecieve_date()
) {
driver_truck_create.submit();
} else {
return false;
}
} );


function validatetruck_id() {
if ( checkIfEmpty( truck_id ) ) {
return false;
} else {
return true;
}
}
function validateDname() {
if ( checkIfEmpty( dname ) ) {
return false;
} else {
return true;
}
}

function validaterecieve_date() {
if ( checkIfEmpty( recieve_date ) ) {
return false;
} else {
return true;
}
}

</script>

@endsection
