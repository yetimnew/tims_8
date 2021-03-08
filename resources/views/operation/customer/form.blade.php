<div class="form-group required">
    <label for="name">Customer Name</label>

    <input name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
        value="{{ old('name') ?? $customer->name }}" onfocusout="validateName()">
    @if ($errors->has('name'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
    <span class="invalid-feedback" role="alert"></span>
</div>

<div class="form-group">
    <label for="address">Address</label>

    <input name="address" type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
        id="address" value="{{ old('address') ?? $customer->address}}" onfocusout="validateAddress()">
    @if ($errors->has('address'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('address') }}</strong>
    </span>
    @endif
    <span class="invalid-feedback" role="alert"></span>
</div>


<div class="form-group">
    <label for="office_number"> Office No</label>

    <input name="office_number" type="text"
        class="form-control {{ $errors->has('office_number') ? ' is-invalid' : '' }}" id="office_number"
        value="{{ old('office_number') ?? $customer->office_number}}" onfocusout=" validateoffice_number()">
    @if ($errors->has('office_number'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('office_number') }}</strong>
    </span>
    @endif
    <span class="invalid-feedback" role="alert"></span>
</div>

<div class="form-group">
    <label for="mobile"> Mobile No</label>

    <input name="mobile" type="text" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" id="mobile"
        value="{{ old('mobile') ?? $customer->mobile}}" onfocusout="validateMobile()">
    @if ($errors->has('mobile'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('mobile') }}</strong>
    </span>
    @endif
    <span class="invalid-feedback" role="alert"></span>
</div>

<div class="form-group">
    <label for="remark">Remark</label>
    <textarea name="remark" rows="5" class="form-control {{ $errors->has('remark') ? ' is-invalid' : '' }}"
        id="remark">{{ old('remark') ?? $customer->remark}}</textarea>
    @if ($errors->has('remark'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('remark') }}</strong>
    </span>
    @endif
    <span class="invalid-feedback" role="alert"></span>
</div>


@section( 'javascript' )
{{-- <script>
                    const name = document.getElementById( 'name' );
                    const address = document.getElementById( 'address' );
                    const officenumber = document.getElementById( 'officenumber' );
                    const mobile = document.getElementById( 'mobile' );
                    const remark = document.getElementById( 'remark' );
                    const customer_reg = document.getElementById( 'customer_reg' );

                    customer_reg.addEventListener( 'submit', function ( event ) {
                        event.preventDefault();
                        if (
                            validateName() &&
                            validateAddress() &&
                            validateOfficenumber() &&
                            validateMobile()
                        ) {
                            customer_reg.submit();
                        } else {
                            return false;
                        }
                    } );


                    function validateName() {
                        if ( !meetLength( name, 3, 100) ) {
                            return false;
                        } else {
                            return true;

                        }
                    }
                    function validateAddress() {

                        if ( !meetLength( address, 2, 100) ) {
                            return false;
                        }
                        else {
                            return true;
                        }
                    }
                    function validateOfficenumber() {
                        if ( !meetLength( officenumber, 0, 11) ) {
                            return false;
                        }
                       else {
                            return true;

                        }
                    }

                     function validateMobile() {
                         if ( !meetLength( mobile, 0, 11 ) ) {
                             return false;
                         } else {
                             return true;

                         }
                     }

                </script> --}}

@endsection
