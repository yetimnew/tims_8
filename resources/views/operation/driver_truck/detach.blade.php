@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Truck Edit ' )

@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Driver And Truck Edit</li>
        </ol>
    </div>
  </header>

	{{-- @include('master.error') --}}
	{{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">

		</div>


		<div class="card-header">

			<div class="d-flex align-items-center">
				<h2>Driver Truck Dettach</h2>
				<div class="ml-auto">
					<a href="{{route('driver_truck.index')}}" class="btn btn-outline-primary">
						<i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>


				</div>
			</div>
		</div>

		<div class="card-body">
			<form method="post" action="{{route('driver_truck.update_dt',$dts->id)}}" class="form-horizontal"
				id="driver_truck_create">
				@csrf
					<div class="form-group ">
							<label class="control-label" for="truck_id">Plate Number</label>
							<select name="truck_id" class="form-control select" id="truck_id" readonly>
								<option class="dropup" value="{{$dts->truck_id}}" selected>
									{{$dts->plate}} </option>
                            </select>

                            @if ($errors->has('truck_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('truck_id') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group ">
							<label class="control-label" for="driver_id">Driver Name</label>

							<select name="driver_id" class="form-control select" id="dname" readonly>
								<option class="dropup" value="{{$dts->driver_id}}" selected>
									{{$dts->NAME}} </option>
							</select>
                            @if ($errors->has('driver_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('driver_id') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group ">
							<label class="control-label" for="recieve_date">Recived Date</label>

							<div class="input-group"> <span class="input-group-addon"></span>
								<input name="recieve_date" type="date" class="form-control" id="recieve_date"
									value="{{$dts->date_received }}" readonly>
							</div>

						</div>


						<div class="form-group required">
							<label class="control-label" for="date_detach">Dettach Date</label>
							<div class="input-group">
								<input name="date_detach" type="text"
									class="form-control {{ $errors->has('date_detach') ? ' is-invalid' : '' }}" id="date_detach"
									value="{{ old('date_detach' ) }}" onfocusout="validatedate_detach()" required>
								<div class="input-group-append">
									<button type="button" id="toggle" class="input-group-text">
										<i class="fa fa-calendar" aria-hidden="true"></i>
									</button>
								</div>
								@if($errors->has('date_detach'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('date_detach') }}</strong>
								</span>
								@endif
								<span class="invalid-feedback" role="alert"></span>
							</div>
						</div>

						<div class="form-group required">
							<label class="control-label">Reson for Detach</label>
							<div class="">
								<textarea name="comment" rows="5" class="form-control" id="comment"
									onfocusout="validateComment()" required> {{ old('comment')}}</textarea>

							</div>
						</div>

						<div class="form-group required">
							<button type="submit" class="btn btn-primary" name="save">Save</button>

						</div>

                    </form>
					</div>
				</div>

@endsection

@section( 'javascript' )
<script type="text/javascript">
	jQuery.datetimepicker.setDateFormatter('moment');
		  $("#date_detach").datetimepicker({
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
		$("#ddate").datetimepicker('toggle');
	})

</script>


@endsection
