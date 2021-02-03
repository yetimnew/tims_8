@extends( 'master.app' )
@section( 'title', 'TIMS | Edit Operation ' . $operation->id )
@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Operation Edit</li>
        </ol>
    </div>
  </header>

<div class="col-md-12">
	{{-- @include('master.error') --}}
	{{-- @include('master.success') --}}
	<div class="card text-left">
		<div class="card-header">
			<div class="row">

				<div class="col-10">
					<h2>Operation Edit</h2>
				</div>
				<div class="col-2">
					<span><a class="btn btn-primary" href="{{route('operation.index')}}">Back</a></span>
				</div>

			</div>

		</div>
		<div class="card-body">
			<form method="post" action="{{route('operation.update',$operation->id)}}" class="form-horizontal" id="operation_reg_form">
				@method('PATCH')
				@csrf
				@include('operation.operation.form')

				<div class="form-group required">
					<button type="submit" class="btn btn-primary" name="save">Save Update</button>
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
@endsection
