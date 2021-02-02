@extends( 'master.app' )
@section( 'title', 'TIMS | Woreda ' )
@section('content')
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Operations</a>
            </li>
            <li class="breadcrumb-item active">Woreda </li>
        </ol>
    </div>
  </header>

  <div class="container">
	<div class="card text-left col-md-12">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>All regions </h2>
				{{-- @can('customer create') --}}

				<div class="ml-auto">
					<a href="{{route('woreda.create')}}" class="btn btn-outline-primary"><i
							class="fafa-plus mr-1"></i>Add Woreda</a>

				</div>
			</div>
        </div>

<div class="row col-12">
    <div class="table-responsive text-nowrap">
        <table class="table table-bordered table-sm table-striped" id="woreda_table">
            <thead>
                <tr>
                    <th class="m-1 b-1">Number</th>
                    <th>Woreda Name</th>
                    <th>Zone</th>
                    <th>Region</th>
                    <th>Comment</th>
                    <th>Details</th>

                </tr>
            </thead>

        </table>
    </div>
</div>
</div>
        @endsection
        @section('javascript')

        <script>
            $( document ).ready( function () {
                        $( '#woreda_table' ).DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('woreda') }}',
                            columns: [
                                        { data: 'id', name: 'id' },
                                        { data: 'woredaName', name: 'woredaName' },
                                        { data: 'zoneaName', name: 'zoneaName' },
                                        { data: 'regionsaName', name: 'regionsaName' },
                                        // { data: 'placeName', name: 'placeName' },
                                        { data: 'woredaComment', name: 'woredaComment' },
                                        {
                                            data: 'details',
                                            name: 'details',
                                            orderable: false
                                            }
                                    ],
                        });
                    } );
        </script>
        @endsection
