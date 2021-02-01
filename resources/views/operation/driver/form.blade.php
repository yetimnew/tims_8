<div class="row">
    <div class="col-md-6">
        <div class="form-group 	required">
            <label class="control-label" for="driverid">ID Number</label>
            <div class="input-group">
                <input name="driverid" type="text" id="driverid"
                    class="form-control select {{ $errors->has('driverid') ? ' is-invalid' : '' }}"
                    value="{{old('driverid') ?? $driver->driverid}}" onfocusout="validatedriverid()">
                @if ($errors->has('driverid'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('driverid') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label">Full Name</label>

            <div class="input-group">
                <input name="name" type="text" id="name"
                    class="form-control select {{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{old('name') ?? $driver->name}}" onfocusout="validateName()">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label">Sex</label>

            <select name="sex" class="form-control select" id="sex" required>
                {{-- <option class="dropup" value="">Select </option> --}}
                <option class="dropup" value="1" selected> Male </option>
                <option class="dropup" value="0"> Female </option>
            </select>

            <small class="form-text text-danger" id="error_sex"></small>

        </div>

        <div class="form-group required">
            <label class="control-label">Birth Date</label>

            <div class="input-group">
                <input name="birth_date" type="text" id="birth_date"
                    class="form-control select {{ $errors->has('birth_date') ? ' is-invalid' : '' }}"
                    value="{{old('birth_date') ?? $driver->birth_date}}" onfocusout="validatebirth_date()">
                <div class="input-group-append">
                    <button type="button" id="toggle1" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>
                @if ($errors->has('birth_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('birth_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group">
            <label class="control-label">Zone</label>

            <div class="input-group">
                <input name="zone" type="text" id="zone"
                    class="form-control select {{ $errors->has('zone') ? ' is-invalid' : '' }}"
                    value="{{old('zone') ?? $driver->zone}}" onfocusout="validateZone()">
                @if ($errors->has('zone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('zone') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Worda</label>

            <div class="input-group">
                <input name="woreda" type="text" id="woreda"
                    class="form-control select {{ $errors->has('woreda') ? ' is-invalid' : '' }}"
                    value="{{old('woreda') ?? $driver->woreda}}" onfocusout="validateWoreda()">
                @if ($errors->has('woreda'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('woreda') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <!--                                          the right side begins here-->
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label"> Kebele</label>

            <div class="input-group">
                <input name="kebele" type="text" id="kebele"
                    class="form-control select {{ $errors->has('kebele') ? ' is-invalid' : '' }}"
                    value="{{old('kebele') ?? $driver->kebele}}" onfocusout="validateKebele()">
                @if ($errors->has('kebele'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('kebele') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label"> House Number</label>

            <div class="input-group">
                <input name="house_number" type="text" id="house_number"
                    class="form-control select {{ $errors->has('house_number') ? ' is-invalid' : '' }}"
                    value="{{old('house_number') ?? $driver->house_number}}" onfocusout="validatehouse_number()">
                @if ($errors->has('house_number'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('house_number') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>

        </div>
        <div class="form-group required">
            <label class="control-label" for="mobile"> Mobile Number</label>

            <div class="input-group">
                <input name="mobile" type="text" id="mobile"
                    class="form-control  {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                    value="{{old('mobile') ?? $driver->mobile}}" onfocusout="validatemobile()">
                @if ($errors->has('mobile'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mobile') }}</strong>
                </span>
                @endif
            </div>
            {{-- <small class="form-text text-danger" id="error_mobile"></small> --}}

        </div>
        <div class="form-group required">
            <label class="control-label" for="hired_date"> Hired Date</label>
            <div class="input-group ">
                <input type="text" class="form-control  {{ $errors->has('hired_date') ? ' is-invalid' : '' }}" name="hired_date" id="hired_date"
                    value="{{old('hired_date') ?? $driver->hired_date}}" onfocusout="validatehired_date()">
                <div class="input-group-append">
                    <button type="button" id="toggle" class="input-group-text">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </button>
                </div>


            @if ($errors->has('hired_date'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('hired_date') }}</strong>
            </span>
            @endif
        </div>
        </div>


        @section( 'javascript' )
        <script type="text/javascript">
            jQuery.datetimepicker.setDateFormatter('moment');
                  $("#birth_date").datetimepicker({
                timepicker:false,
                datepicker:true,
                format: "Y-M-d"
                // format: "YYYY-MM-DD H:mm a"
                // autoclose: true,
                // todayBtn: true,
                // startDate: "2013-02-14 10:00",
                // minuteStep: 10
                // Step: 30,
            });
            $('#toggle1').on('click', function(){
                $("#birth_date").datetimepicker('toggle');
            })
    $("#hired_date").datetimepicker({
                timepicker:false,
                datepicker:true,
                format: "Y-M-d"
                // format: "YYYY-MM-DD H:mm a"

            });
            $('#toggle').on('click', function(){
                $("#hired_date").datetimepicker('toggle');
            })
        </script>

        @endsection
