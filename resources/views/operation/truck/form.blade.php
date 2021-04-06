<div class="row">
    <div class="col-md-6">

        <div class="form-group required pb-0">
            <label class="control-label" for="plate">Plate Number</label>
            <div class="input-group">
                <input type="text" name="plate" id="plate"
                    class="form-control {{ $errors->has('plate') ? ' is-invalid' : '' }} "
                    value="{{old('plate') ?? $truck->plate}}" onfocusout="validatePlate()">
                @if ($errors->has('plate'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('plate') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group required pb-0 ">
            <label class="control-label" for="truck_model_id">Truck Model</label>
            <select name="truck_model_id" id="truck_model_id"
                class="form-control {{ $errors->has('truck_model_id') ? ' is-invalid' : '' }}"
                onfocusout="validateVehecle()">
                <option class="dropup" value="" disabled> Select One</option>
                @foreach ($truck_models as $truck_model)
                <option class="dropup" value="{{$truck_model->id}}"
                    {{$truck_model->id == old('truck_model_id', $truck->truck_model_id)  ? 'selected' : '' }}>
                    {{$truck_model->name}}
                </option>
                @endforeach
            </select>
            @if ($errors->has('truck_model_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('truck_model_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group pb-0">
            <label class="control-label" for="chassis_number">Chassis Number</label>
            <div class="input-group">
                <input name="chassis_number" type="text" id="chassis_number"
                    class="form-control {{ $errors->has('chassis_number') ? ' is-invalid' : '' }}"
                    value="{{old('chassis_number') ?? $truck->chassis_number}}" onfocusout="validatechassis_number()">

                @if ($errors->has('chassis_number'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('chassis_number') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group pb-0">
            <label class="control-label" for="engine_number">Engine Number</label>
            <div class="input-group">
                <input name="engine_number" type="text" class="form-control" id="engine_number"
                    class="form-control {{ $errors->has('engine_number') ? ' is-invalid' : '' }}"
                    value="{{old('engine_number') ?? $truck->engine_number}}" onfocusout="validateengine_number()">

                @if ($errors->has('engine_number'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('engine_number') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group pb-0">
            <label class="control-label" for="tyre_size">Tyre Size</label>
            <div class="input-group">
                <input name="tyre_size" type="number"
                    class="form-control {{ $errors->has('tyre_size') ? ' is-invalid' : '' }}" id="tyre_size"
                    value="{{ old('tyre_size') ?? $truck->tyre_size}}" onfocusout="validatetyre_size()">

                @if ($errors->has('tyre_size'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tyre_size') }}</strong>
                </span>
                @endif
            </div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group pb-0">
            <label class="control-label" for="service_Interval_km"> Service In KM</label>
            <div class="input-group">
                <input name="service_Interval_km" type="number" step="any"
                    class="form-control {{ $errors->has('service_Interval_km') ? ' is-invalid' : '' }}"
                    id="service_Interval_km" value="{{old('service_Interval_km') ?? $truck->service_Interval_km}}"
                    onfocusout="validateservice_Interval_km()">
                @if ($errors->has('service_Interval_km'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('service_Interval_km') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group pb-0">
            <label class="control-label" for="purchase_price"> Purchase Price</label>
            <div class="input-group">
                <input name="purchase_price" type="text"
                    class="form-control {{ $errors->has('purchase_price') ? ' is-invalid' : '' }}" id="purchase_price"
                    value="{{old('purchase_price') ?? $truck->purchase_price}}" onfocusout="validatepurchase_price()">
                @if ($errors->has('purchase_price'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('purchase_price') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label" for="production_date">Poduction Date</label>
            <div class="input-group">
                <input name="production_date" type="text"
                    class="form-control {{ $errors->has('production_date') ? ' is-invalid' : '' }}" id="production_date"
                    value="{{old('production_date') ?? $truck->production_date}}"
                    onfocusout="validateproduction_date()">

                <div class="input-group-append">
                    <button type="button" id="toggle" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>
                @if ($errors->has('production_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('production_date') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label" for="service_start_date"> Servie Start Date</label>
            <div class="input-group">
                <input name="service_start_date" type="text"
                    class="form-control {{ $errors->has('production_date') ? ' is-invalid' : '' }}"
                    id="service_start_date" value="{{old('service_start_date') ?? $truck->service_start_date}}"
                    onfocusout="validateservice_start_date()">

                <div class="input-group-append">
                    <button type="button" id="toggle1" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>
                @if ($errors->has('service_start_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('service_start_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        @section( 'javascript' )
        <script>
            jQuery.datetimepicker.setDateFormatter('moment');
                 $("#production_date").datetimepicker({
                timepicker:false,
                datepicker:true,
                format: "Y-M-d"
                // format: "YYYY-MM-DD"
                // autoclose: true,
                // todayBtn: true,
                // startDate: "2013-02-14 10:00",
                // minuteStep: 10
                // step: 30,
            });
            $('#toggle').on('click', function(){
                $("#production_date").datetimepicker('toggle');
            })

            jQuery.datetimepicker.setDateFormatter('moment');
                 $("#service_start_date").datetimepicker({
                timepicker:false,
                datepicker:true,
                // format: "Y-M-d"
                format: "YYYY-MM-DD"
                // autoclose: true,
                // todayBtn: true,
                // startDate: "2013-02-14 10:00",
                // minuteStep: 10
                // step: 30,
            });
            $('#toggle1').on('click', function(){
                $("#service_start_date").datetimepicker('toggle1');
            })
        </script>

        @endsection
