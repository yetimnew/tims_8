<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6 ">
                <div class="form-group required">
                    <label class="control-label">Is that A trip?</label>
                    <select name="trip" class="form-control select  {{ $errors->has('trip') ? ' is-invalid' : '' }}"
                        id="trip" onfocusout="validateTrip()">
                        <option class="dropup" value="0"> Select One </option>
                        @if ($performance->is_trip)
                        <option class="dropup" value="1" selected>Yes, Trip </option>
                        <option class="dropup" value="0"> No, I is not</option>
                        @else
                        <option class="dropup" value="1">Yes, Trip </option>
                        <option class="dropup" value="0" selected> No, I is not </option>
                        @endif
                    </select>
                    @if ($errors->has('trip'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('trip') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group required">
                    <label class="control-label">Load Type</label>
                    <select name="load_type"
                        class="form-control select  {{ $errors->has('load_type') ? ' is-invalid' : '' }}" id="load_type"
                        onfocusout="validateload_type()">
                        @if ($performance->load_type == 0)
                        <option class="dropup" value="0" selected> Return Load </option>
                        <option class="dropup" value="1"> Main Load</option>
                        @endif
                        @if ($performance->load_type == 1)
                        <option class="dropup" value="1" selected> Main Load</option>
                        <option class="dropup" value="0">Return Load</option>
                        @endif
                    </select>
                    @if ($errors->has('load_type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('load_type') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label">FO Number</label>
            <div class="input-group">
                <input name="fo_number" type="text" required
                    class="form-control {{ $errors->has('fo_number') ? ' is-invalid' : '' }}" id="fo_number"
                    placeholder="Fright order number" value="{{ old('fo_number') ?? $performance->fo_number }}"
                    onfocusout="validateFo()">
                @if ($errors->has('fo_number'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fo_number') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label">Operation ID</label>
            <select name="operation_id"
                class="form-control {{ $errors->has('operation_id') ? ' is-invalid' : '' }} select" id="operation_id"
                value="" onfocusout="validateOperation()">
                <option class="dropup" value=""> Select One</option>
                @foreach ($operations as $operation)
                <option class="dropup" value="{{$operation->id}}"
                    {{$operation->id == old('operation_id',$performance->operation_id) ? 'selected' : ''}}>
                    {{$operation->operationid}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('operation_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('operation_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group required">
            <label class="control-label">Driver and Truck</label>
            <select name="driver_truck_id"
                class="form-control {{ $errors->has('driver_truck_id') ? ' is-invalid' : '' }} select"
                id="driver_truck_id" onfocusout="validateTruck()">
                <option class="dropup" value=""> Select One</option>
                @foreach ($driver_truck as $dt)
                <option class="dropup" value="{{$dt->id}}"
                    {{$dt->id == old('driver_truck_id',$performance->driver_truck_id) ? 'selected' : ''}}>
                    {{$dt->Name}} - {{$dt->Plate}}</option>
                @endforeach
            </select>
            @if ($errors->has('driver_truck_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('driver_truck_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group required">
            <label class="control-label">Date Dispach</label>
            <div class="input-group">
                <input name="date_dispatch" type="text"
                    class="form-control {{ $errors->has('date_dispatch') ? ' is-invalid' : '' }}" id="date_dispatch"
                    value="{{ old('date_dispatch' ) ?? $performance->date_dispatch}}"
                    onfocusout="validatedate_dispatch()">
                <div class="input-group-append">
                    <button type="button" id="toggle" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>
                @if($errors->has('date_dispatch'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('date_dispatch') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label" for="origin_id">Origion Place</label>
            <select name="origin_id"
                class="form-control{{ $errors->has('origin_id') ? ' is-invalid' : '' }} select origin_place"
                id="origin_id" onfocusout="validateorigin_id()">
                <option class="dropup"> </option>
                @foreach ($place as $pl)
                <option class="dropup" value="{{$pl->id}}"
                    {{$pl->id==old('origin_id', $performance->origin_id) ? 'selected' : ''}}>
                    {{$pl->name}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('origin_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('origin_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group required">
            <label class="control-label" for="destination_id">Destination Place</label>
            <select name="destination_id"
                class="form-control {{ $errors->has('destination_id') ? ' is-invalid' : '' }} select destination_id_place"
                id="destination_id" onfocusout="validateDestination()">
                <option class="dropup"> </option>
                @foreach ($place as $pl)
                <option class="dropup" value="{{$pl->id}}"
                    {{ $pl->id==old('destination_id',$performance->destination_id) ? 'selected' : ''}}>
                    {{$pl->name}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('destination_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('destination_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group float-right mb-4">
            <button type="button" id="viewDistance">Calculate Distance</button> <span class="badge badge-dark"
                id="something"></span>
        </div>

        <div class="form-group required mt-3">
            <label class="control-label">Distance without cargo</label>
            <div class="input-group">
                <input name="distance_without_cargo" type="number"
                    class="form-control {{ $errors->has('distance_without_cargo') ? ' is-invalid' : '' }}"
                    id="distance_without_cargo"
                    value="{{ old('distance_without_cargo') ?? $performance->distance_without_cargo}}" min="1"
                    onfocusout="validatedistance_without_cargo()">
                @if($errors->has('distance_without_cargo'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('distance_without_cargo') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label" for="distance_with_cargo">Distance with cargo</label>
            <div class="input-group">
                <input name="distance_with_cargo" type="number"
                    class="form-control {{ $errors->has('distance_with_cargo') ? ' is-invalid' : '' }}"
                    id="distance_with_cargo"
                    value="{{ old('distance_with_cargo') ?? $performance->distance_with_cargo}}" min="1"
                    onfocusout="validateDisw()">
                @if ($errors->has('distance_with_cargo'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('distance_with_cargo') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label" for="tone">Cargo Volume In Tone</label>
            <div class="input-group">
                <input name="tone" type="number" class="form-control {{ $errors->has('tone') ? ' is-invalid' : '' }}"
                    id="tone" value="{{ old('tone') ?? $performance->tone}}" min="1" onfocusout="validatetone()">
                @if($errors->has('tone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tone') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label">Tone KM </label>
            <div class="input-group">
                <input name="ton_km" type="number"
                    class="form-control {{ $errors->has('ton_km') ? ' is-invalid' : '' }}" id="ton_km"
                    value="{{ old('ton_km') ?? $performance->ton_km}}" min="1" onfocusout="calculatedton_km()">
                @if($errors->has('ton_km'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('ton_km') }}</strong>
                </span>
                @endif'
            </div>
        </div>
        <button type="button" id="calculateTonkm" class="btn btn-outline-dark btn-sm">Calculate</button>
    </div>

    <div class="col-md-6">
        <legend> Expenses</legend>
        <div class="form-group">
            <label class="control-label" for="fuelIn_litter"> Fuel In Litter</label>
            <div class="input-group">
                <input name="fuelIn_litter" type="number"
                    class="form-control {{ $errors->has('fuelIn_litter') ? ' is-invalid' : '' }}" id="fuelIn_litter"
                    value="{{ old('fuelIn_litter') ?? $performance->fuelIn_litter}}" min="1"
                    onfocusout="validatefuelIn_litter()">
                @if($errors->has('fuelIn_litter'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fuelIn_litter') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label" for="fuelIn_birr"> Fuel In Birr</label>
            <div class="input-group">
                <input name="fuelIn_birr" type="number"
                    class="form-control{{ $errors->has('fuelIn_birr') ? ' is-invalid' : '' }}" id="fuelIn_birr"
                    value="{{ old('fuelIn_birr') ?? $performance->fuelIn_birr}}" min="1"
                    onfocusout="validatefuelIn_birr()">
                @if($errors->has('fuelIn_birr'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fuelIn_birr') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label"> Perdiem</label>
            <div class="input-group">
                <input name="perdiem" type="number"
                    class="form-control {{ $errors->has('perdiem') ? ' is-invalid' : '' }}" id="perdiem"
                    value="{{ old('perdiem') ?? $performance->perdiem}}" min="1" onfocusout="validatePerdiem()">
                @if($errors->has('perdiem'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('perdiem') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label" for="operational_expense">Operational Expense</label>
            <div class="input-group">
                <input name="operational_expense" type="number"
                    class="form-control {{ $errors->has('operational_expense') ? ' is-invalid' : '' }}"
                    id="operational_expense"
                    value="{{ old('operational_expense') ?? $performance->operational_expense}}" min="1"
                    onfocusout="validateoperational_expense()">
                @if($errors->has('operational_expense'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('operational_expense') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label" for="other_expense"> Other Expense Expences</label>
            <div class="input-group">
                <input name="other_expense" type="number"
                    class="form-control {{ $errors->has('other_expense') ? ' is-invalid' : '' }}" id="other_expense"
                    value="{{ old('other_expense') ?? $performance->other_expense}}" min="1"
                    onfocusout="validatother_expense()">
                @if($errors->has('other_expense'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('other_expense') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <fieldset>
            <div class="form-group">
                <label class="control-label">Comment</label>
                <textarea name="comment" rows="5"
                    class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                    id="comment">{{$performance->comment}}</textarea>
                @if ($errors->has('comment'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('comment') }}</strong>
                </span>
                @endif
            </div>
        </fieldset>

        @section( 'javascript' )
        <script>
            // In your Javascript (external .js resource or <script> tag)
                $(document).ready(function() {
                    $('.origin_place').select2({
                        placeholder: "Select Origin Place",
                        allowClear: true
                         });
                    $('#destination_id').select2({
                        placeholder: "Select Destination Place",
                        allowClear: true
                         });
                    $('#driver_truck_id').select2({
                        placeholder: "Select Driver and Truck",
                        allowClear: true
                         });
                });

            jQuery.datetimepicker.setDateFormatter('moment');
                 $("#date_dispatch").datetimepicker({
                timepicker:true,
                datepicker:true,
                // format: "Y-M-d"
                format: "YYYY-MM-DD H:mm:ss"
                // autoclose: true,
                // todayBtn: true,
                // startDate: "2013-02-14 10:00",
                // minuteStep: 10
                // step: 30,
            });
            $('#toggle').on('click', function(){
                $("#date_dispatch").datetimepicker('toggle');
            })
            jQuery.datetimepicker.setDateFormatter('moment');
		 $("#returned_date").datetimepicker({
		timepicker:true,
		datepicker:true,
		// format: "Y-M-d"
		format: "YYYY-MM-DD H:mm:ss"
		// autoclose: true,
		// todayBtn: true,
		// startDate: "2013-02-14 10:00",
		// minuteStep: 10
		// step: 30,
	});
            $('#toggle2').on('click', function(){
                $("#returned_date").datetimepicker('toggle');
            })
        </script>

        <script>
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $("#viewDistance").click(function(e){
                const destinationval = document.getElementById( 'destination_id').value;
                const origionval = document.getElementById('origin_id').value;

                var urlPath = '{{ route("performace.distance") }}';
                e.preventDefault();
                $.ajax({
                   type:'POST',
                   url: urlPath,
                   data:{
                    origion: origionval,
                    destination: destinationval
                    },
                   success:function(data){
                    $('#distance_with_cargo').val(data);
                    $('#distance_without_cargo').val(data);
                   },
                   error: function() {
            alert('Error occured');
        },
        dataType:'text'
                });
            });
            $("#calculateTonkm").click(function(e){
                const diswccal = document.getElementById( 'distance_with_cargo' ).value;
                const toncal = document.getElementById( 'tone' ).value;
                const tonkmcal = diswccal * toncal;
                $('#ton_km').val(tonkmcal);

            });

        </script>

        @endsection
