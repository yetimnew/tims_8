@extends( 'master.app' )
@section( 'title', 'TIMS | Model Registration' )
@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item "><a href="#">Truks</a>
            </li>
            <li class="breadcrumb-item active">Truks Model</li>
        </ol>
    </div>

  </header>

<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex">
                <h2>Truck Model Registration</h2>
                <div class="ml-auto">
                    <a href="{{route('truck_model.index')}}" class="btn btn-outline-primary"> <i class="fa fa-backward mr-1"
                            aria-hidden="true"> Back</i> </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('truck_model.store')}}" class="form-horizontal" id="truck_form">
                @csrf

                        <div class="form-group required pb-0">
                            <label class="control-label"  for="name">Type/Model Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" name="name" id="name"
                                    class=" form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{old('name')}}"  onfocusout="validateName()">

                                @if ($errors->has('name'))
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                                <span class="invalid-feedback" role="alert"></span>

                            </div>

                        </div>

                        <div class="form-group pb-0">
                            <label class="control-label" for="company">Company</label>
                            <div class="input-group"> <span class="input-group-addon"></span>
                                <input name="company" type="text" class="form-control" id="company"  value="{{old('company')}}">
                            </div>

                        </div>

                        <div class="form-group ">
                            <label class="control-label" for="production_date">Production Date</label>
                            <div class="input-group">
                                <input name="production_date" type="text"
                                    class="form-control {{ $errors->has('production_date') ? ' is-invalid' : '' }}" id="production_date"
                                     value="{{ old('production_date')}}" onfocusout="validateDdate()">
                                <div class="input-group-append">
                                    <button type="button" id="toggle" class="input-group-text">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </button>
                                </div>
                                @if($errors->has('production_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('production_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                        </div>
                        <span class="help-block"></span>

                        <div class="form-group pb-0 text-right">
                            <input type="submit" class="btn btn-primary btn-lg" name="save" id="mangeBtn" value="Save">
                        </div>
                        <!--                                          the right side begins here-->
                    </div>


        <div class="card-footer">
        </div>

        </form>
    </div>
</div>

@endsection
@section('javascript')
<script>
    jQuery.datetimepicker.setDateFormatter('moment');
			 $("#production_date").datetimepicker({
			timepicker:false,
			datepicker:true,
			format: "YYYY-MM-DD"

		});
		$('#toggle').on('click', function(){
			$("#production_date").datetimepicker('toggle');
		})

</script>
<script>
    const name = document.getElementById( 'name' );

		const truck_form = document.getElementById( 'truck_form' );

		truck_form.addEventListener( 'submit', function ( event ) {
			event.preventDefault();
			if ( validateName()

			) {
				truck_form.submit();
			} else {
				return false;
			}
		} );

		function validateName() {
			if ( checkIfEmpty( name ) ) {
				return false;
			} else {
				return true;
			}
		}



</script>
@endsection
