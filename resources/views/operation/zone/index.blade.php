@extends( 'master.app' )
@section( 'title', 'TIMS | zone ' )
@section('content')

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Operations</a>
            </li>
            <li class="breadcrumb-item active">Operational Zone</li>
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
					<a href="{{route('zone.create')}}" class="btn btn-outline-primary"><i
							class="fafa-plus mr-1"></i>Add Zone</a>

				</div>
			</div>
        </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-bordered table-sm table-striped" id="zone_table">
            <thead>
                <tr>
                    <th class="m-1 b-1">Number</th>
                    <th>Zone Name</th>
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
                        $( '#zone_table' ).DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ url('zone') }}',
                            columns: [
                                        { data: 'id', name: 'id' },
                                        { data: 'zoneName', name: 'zoneName' },
                                        { data: 'regionsaName', name: 'regionsaName' },
                                        { data: 'zoneComment', name: 'zoneComment' },
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
