@extends( 'master.app' )
@section( 'title', 'TIMS | Edit  Place '. $place->name)
@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Operations</a>
            </li>
            <li class="breadcrumb-item active">Operation Place Create</li>
        </ol>
    </div>
  </header>

<div class="col-md-12">
	{{-- @include('master.error') --}}
	{{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<h2>Edit Operational Place </h2>
		</div>
		<div class="card-body">
			<form method="post" action="{{route('place.update',$place->id)}}" class="form-horizontal" id="place_reg">
                @csrf
                @method('PATCH')
				@include('operation.place.form')
						<div class="form-group required">
							<button type="submit" class="btn btn-primary" name="save">Save</button>
						</div>

					</div>
                </form>

		</div>
	</div>




@endsection
