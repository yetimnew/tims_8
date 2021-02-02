@extends( 'master.app' )
@section( 'title', 'TIMS | Region Create' )

@section( 'content' )
    <header class="page-header mb-4">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Operations</a>
                </li>
                <li class="breadcrumb-item active">Operational Region</li>
            </ol>
        </div>
      </header>

<div class="container">
	@include('master.error') {{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Operational Region Registration</h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('region.store')}}" class="form-horizontal" id="region_reg">
				@csrf
			@include('operation.region.form')
						<div class="form-group required">
							<button type="submit" class="btn btn-primary pull-right  m-3" name="save">Save</button>

					</div>

					</div>
                </form>
				</div>


		</div>



</div>
</div>

@endsection
