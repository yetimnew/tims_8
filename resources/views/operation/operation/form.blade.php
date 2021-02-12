<div class="row">
    {{-- {{dd($operation2->all())}} --}}

    <div class="col-md-6">
        <div class="form-group mb-0 required">
            <label class="control-label" for="operationid">Requisition No/Operation Id</label>

            <div class="input-group">
                <input name="operationid" type="text" id="operationid" autofocus
                    class="form-control select {{ $errors->has('operationid') ? ' is-invalid' : '' }}"
                    value="{{old('operationid') ?? $operation->operationid}}" onfocusout="validateoperationid()">
                @if ($errors->has('operationid'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('operationid') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group mb-0 required">
            <label class="control-label" for="customer_id">customer_id Name</label>
            <div class="input-group">
                <select name="customer_id" id="customer_id"
                    class="form-control {{ $errors->has('customer_id') ? ' is-invalid' : '' }}"
                    onfocusout="validatecustomer_id()">
                    <option class="dropup" value="" selected> Select One</option>

                    @foreach ($customers as $customer)
                        @if (old('customer_id') )
                          <option class="dropup"  value="{{$customer->id}}" {{old('customer_id') == $customer->id ? 'selected' : ''}}> {{$customer->name}} </option>
                        @else
                          <option value={{$customer->id}}  {{$customer->id == $operation->customer_id ? 'selected' : ''}}>{{ $customer->name }}</option>
                        @endif
                    @endforeach

                </select>
                @if ($errors->has('customer_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('customer_id') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>

        <div class="form-group required">
            <label class="control-label" for="start_date">Starting Date</label>

            <div class="input-group">
                <input type="datetime" id="start_date" name="start_date"
                    class="form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }}"
                    value="{{ old('start_date') ??  $operation->start_date}}" onfocusout="validatestart_date()">
                @if ($errors->has('start_date'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('start_date') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>

            </div>
        </div>
        {{-- if({{$errors)}} --}}
        <div class="form-group required">
            <label class="control-label" for="place_id">Place Name</label>
            <div class="input-group">

                <select name="place_id" id="place_id" class="form-control {{ $errors->has('place_id') ? ' is-invalid' : '' }}"
                    onfocusout="validateplace_id()">
                    <option class="dropup" value="" selected> Select One</option>
                    @foreach ($places as $place)
                        @if (old('place_id') )
                        <option class="dropup"  value="{{$place->id}}" {{old('place_id') == $place->id ? 'selected' : ''}}> {{$place->name}} </option>
                        @else
                        <option value={{$place->id}}  {{$place->id == $operation->place_id ? 'selected' : ''}}>{{ $place->name }}</option>
                        @endif
                    @endforeach

                </select>
                @if ($errors->has('place_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('place_id') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Cargo volume in Tone</label>
            <div class="input-group">
                <input type="number" name="volume" id="volume"
                    class="form-control {{ $errors->has('volume') ? ' is-invalid' : '' }}"
                    value="{{ old('volume') ??  $operation->volume }}" onfocusout="validateVolume()">
                @if ($errors->has('volume'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('volume') }}</strong>
                </span>
                @endif
            </div>

        </div>

    </div>
    <div class="col-md-6">

        <div class="form-group mb-0 required">
            <label class="control-label" for="cargo_type">Cargo Type</label>
            <select name="cargo_type" class="form-control select" id="cargo_type"
                class="form-control {{ $errors->has('cargo_type') ? ' is-invalid' : '' }}" onfocusout="validatecargo_type()">
                <option class="dropup" value="1" {{$operation->cargotype == 1 ? 'selected' : '' }}> Relief Cargo
                </option>
                <option class="dropup" value="0" {{$operation->cargotype == 0 ? 'selected' : '' }}> Commercial Cargo
                </option>

            </select>
            @if ($errors->has('cargo_type'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cargo_type') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group required">
            <label class="control-label" for="tone">Tone KM</label>
            <div class="input-group">
                <input  type="number" name="tone"  id="tone"
                    class="form-control {{ $errors->has('tone') ? ' is-invalid' : '' }}"
                    value="{{ old('tone') ?? $operation->tone }}" onfocusout="validateTone()">
                @if ($errors->has('tone'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tone') }}</strong>
                </span>
                @endif
                </div>
        </div>
        <div class="form-group required">
            <label class="control-label"> Triff per Ton KM</label>
            <div class="input-group">
                <input name="tariff" type="number" step="0" pattern="\d+"id="tariff"
                    class="form-control {{ $errors->has('tariff') ? ' is-invalid' : '' }}"
                    value="{{ old('tariff') ?? $operation->tariff}}" onfocusout="validateTariff()">
                @if ($errors->has('tariff'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tariff') }}</strong>
                </span>
                @endif
            </div>
        </div>

        @section( 'javascript' )
        <script>
            jQuery.datetimepicker.setDateFormatter('moment');
                 $("#start_date").datetimepicker({
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
            // const oid = document.getElementById( 'oid' );
            //         const customer_id = document.getElementById( 'customer_id' );
            //         const start_date = document.getElementById( 'start_date' );
            //         const place_id = document.getElementById( 'place_id' );
            //         const volume = document.getElementById( 'volume' );
            //         const cargo_type = document.getElementById( 'cargo_type' );
            //         const tone = document.getElementById( 'tone' );
            //         const operation_reg_form = document.getElementById( 'operation_reg_form' );

            //         operation_reg_form.addEventListener( 'submit', function ( event ) {
            //             event.preventDefault();
            //             if (
            //                 validateOid() &&
            //                 validatecustomer_id() &&
            //                 validatestart_date() &&
            //                 validateplace_id() &&
            //                 validateVolume() &&
            //                 validatecargo_type() &&
            //                 validateTone() &&
            //                 validateTariff()

            //             ) {
            //                 operation_reg_form.submit();
            //             } else {
            //                 return false;
            //             }
            //         } );


            //         function validateOid() {
            //             if ( checkIfEmpty( oid ) ) {
            //                 return false;
            //             } else {
            //                 return true;
            //             }
            //         }

            //         function validatecustomer_id() {
            //             if ( checkIfEmpty( customer_id ) ) {
            //                 return false;
            //             } else {
            //                 return true;
            //             }
            //         }
            //         function validatestart_date() {
            //             if ( checkIfEmpty( start_date ) ) {
            //                 return false;
            //             } else {
            //                 return true;
            //             }
            //         }
            //         function validateplace_id() {
            //             if ( checkIfEmpty( place_id ) ) {
            //                 return false;
            //             } else {
            //                 return true;
            //             }
            //         }
            //         function validateVolume() {
            //             if ( checkIfEmpty( volume ) ) {
            //                 return false;
            //             } else {
            //                 return true;
            //             }
            //         }
            //         function validatecargo_type() {
            //             if ( checkIfEmpty( cargo_type ) ) {
            //                 return false;
            //             } else {
            //                 return true;
            //             }
            //         }
            //         function validateTone() {
            //             if ( checkIfEmpty( tone ) ) {
            //                 return false;
            //             }
            //             if ( !minmax( tone, 100, 100000000 ) ) {
            //                 return false;
            //             } else {
            //                 return true;

            //             }
            //         }
            //         function validateTariff() {
            //             if ( checkIfEmpty( tariff ) ) {
            //                 return false;
            //             }
            //             if ( !minmax( tariff, 0.25, 6.00 ) ) {
            //                 return false;
            //             } else {
            //                 return true;

            //             }
            //         }

        </script>

        @endsection
