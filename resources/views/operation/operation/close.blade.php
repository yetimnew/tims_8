@extends( 'master.app' )
@section( 'title', 'TIMS | Operation close ' )
@section( 'content' )
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dasboard')}}">Home</a>
		</li>
		<li class="breadcrumb-item ">Operations</li>
		<li class="breadcrumb-item active">Operation</li>
		<li class="breadcrumb-item active">Close Operation</li>
	</ol>
<div class="col-md-12">
	@include('master.error') {{-- @include('master.success') --}}
	<div class="row col-12">
			<div class="col-10">
			</div>
			<div class="col-2">
				<a href="{{route('operation')}}" class="btn btn-primary">Back</a>
		
			</div>
		</div>
	<div class="card text-left">
		<div class="card-header">
			<h2>Closing Operation</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('operation.update2',['id'=>$operation->id])}}" class="form-horizontal" id="operation_reg_form">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-0 ">
							<label class="control-label">Operation Id</label>

							<div class="input-group"> <span class="input-group-addon"></span>
                            <input name="oid" type="text" autofocus class="form-control" id="oid" value="{{$operation->operationid}}" disabled>
							</div>
						</div>
				<div class="form-group ">
							<label class="control-label">Starting Date</label>

							<div class="input-group">
                                <input type="datetime" id="sdate" name="sdate" class="form-control" required value="{{$operation->startdate}}" disabled>
                             </div>
							<small class="form-text text-danger" id="error_sdate"></small>
						</div>
				
			
						<div class="form-group required">
                                <label class="control-label"> End Date</label>
    
                                <div class="input-group"> <span class="input-group-addon"></span>
                                    <input name="edate" type="date" class="form-control" id="edate">
                                </div>
                            </div>
                            <div class="form-group "  >
                                    <label class="control-label" for="remark">Remark</label>
                                   
                                        <textarea name="remark" rows="5" class="form-control {{ $errors->has('remark') ? ' is-invalid' : '' }}" id="remark"> </textarea> 
                            </div>
                       
                            <div class="form-group required">
                                    <button type="submit" class="btn btn-primary" name="save" onClick="manageData">Save</button>
                                </div>
					</div>


				</div>
		</div>
		<div class="card-footer">
			the footer
		</div>

		</form>
	</div>
</div>

@endsection

@section( 'javascript' )
<script>
		const oid = document.getElementById( 'oid' );
		const customer = document.getElementById( 'customer' );
		const sdate = document.getElementById( 'sdate' );
		const region = document.getElementById( 'region' );
		const sdate = document.getElementById( 'sdate' );
		const volume = document.getElementById( 'volume' );
		const ctype = document.getElementById( 'ctype' );
		const tone = document.getElementById( 'tone' );
		const ctype = document.getElementById( 'ctype' );
		// const sik = document.getElementById( 'sik' );
		const operation_reg_form = document.getElementById( 'operation_reg_form' );

		operation_reg_form.addEventListener( 'submit', function ( event ) {
			event.preventDefault();
			if ( validatePlate() 
				
			) {
				operation_reg_form.submit();
			} else {
				return false;
			}
		} );

		// Validator functions
		function validatePlate() {
			if ( checkIfEmpty( plate ) ) {
				return false;
			} else {
				return true;
			}
		}
		


// basic
	
		function checkIfEmpty( field ) {
			if ( isEmpty( field.value.trim() ) ) {
				setInvalid( field, `${field.name} must not be empty` )
				return true;
			} else {
				setValid( field );
				return false;
			}
		}


		function isEmpty( value ) {
			if ( value === '' ) return true;
			return false;
		}

		function setInvalid( field, message ) {
			field.className = 'form-control is-invalid';
			field.nextElementSibling.innerHTML = message;
		}

		function setValid( field ) {
			field.className = 'form-control is-valid';
			field.nextElementSibling.innerHTML = '';
		}

		function meetLength( field, min, max ) {
			if ( field.value.length >= min && field.value.length < max ) {
				setValid( field );
				return true;
			} else if ( field.value.length < min ) {
				setInvalid( field, `${field.name} Must be atlist ${min} Character Long` );
				return false;
			} else {
				setInvalid( field, `${field.name} Must be less than  ${max} Characters` );
				return false;
			}
		}

		function minmax( field, min, max ) {
			if ( field.value >= min && field.value < max ) {
				setValid( field );
				return true;
			} else if ( field.value < min ) {
				setInvalid( field, `${field.name} Must be atlist ${min} Character Long` );
				return false;
			} else {
				setInvalid( field, `${field.name} Must be less than  ${max} Characters` );
				return false;

			}
		}
	</script>

@endsection