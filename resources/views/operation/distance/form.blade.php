<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-0 required">
            <label class="control-label" for="customer">Origin Place</label>
            <div class="input-group">
                <select name="origin_id" id="origin_id" class="form-control {{ $errors->has('origin_id') ? ' is-invalid' : '' }}"
                    onfocusout="validateCustomer()">
                    <option class="dropup" value=""> Select One</option>
                    @foreach ($places as $place)
                    @if (old('origin_id') )
                    <option class="dropup"  value="{{$place->id}}" {{old('origin_id') == $place->id ? 'selected' : ''}}> {{$place->name}} </option>
                    @else
                    <option value={{$place->id}}  {{ $place->id == $distance->origin_id ? 'selected' : ''}}>{{ $place->name }}</option>
                    @endif
                  @endforeach

                </select>
                @if ($errors->has('origin_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('origin_id') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="form-group mb-2 required">
            <label class="control-label" for="destination_id">Destination Place</label>
            <div class="input-group">
                <select name="destination_id" id="destination_id"
                    class="form-control {{ $errors->has('destination_id') ? ' is-invalid' : '' }}"
                    onfocusout="validateCustomer()">
                    <option class="dropup" value=""> Select One</option>

                    @foreach ($places as $place)
                      @if (old('destination_id') )
                      <option class="dropup"  value="{{$place->id}}" {{old('destination_id') == $place->id ? 'selected' : ''}}> {{$place->name}} </option>
                      @else
                      <option value={{$place->id}}  {{ $place->id == $distance->destination_id ? 'selected' : ''}}>{{ $place->name }}</option>
                      @endif
                    @endforeach
                </select>

                @if ($errors->has('destination_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('destination_id') }}</strong>
                </span>
                @endif
            </div>
        </div>


        <div class="form-group mb-2 required">
            <label class="control-label">Distance In KM</label>

            <div class="input-group">
                <input name="km" type="number" step="1" pattern="\d+"  id="km"
                    class="form-control select {{ $errors->has('km') ? ' is-invalid' : '' }}"
                    value="{{old('km') ?? $distance->km}}" onfocusout="validateZone()">
                @if ($errors->has('km'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('km') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert"></span>
            </div>
        </div>


        @section( 'javascript' )

        <script>
            $(document).ready(function() {
                    $('#origin_id').select2({
                        placeholder: "Select Origin Place",
                        allowClear: true
                         });
                    $('#destination_id').select2({
                        placeholder: "Select Destination Place",
                        allowClear: true
                         });

                });

        </script>

        @endsection
