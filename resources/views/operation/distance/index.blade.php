@extends( 'master.app' )
@section( 'title', 'TIMS | Distance' )

@section('content')
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
        	<li class="breadcrumb-item active">Distance</li>
        </ol>
    </div>
  </header>

<div class="col-md-12">
    <div class="card text-left col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>City and There distance </h2>
                {{-- @can('distance create') --}}
                <div class="ml-auto">

                    <a href="{{route('distance.create')}}" class="btn btn-outline-primary"><i class="fafa-plus mr-1"></i>Add Distance</a>
                </div>
                {{-- @endcan --}}
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table-sm table table-bordered table-sm table-striped" id="distances">
                    <thead>
                        <tr>
                            <th class="m-1 b-1" width="3%">No</th>
                            <th class="m-1 b-1">Origin Name </th>
                            <th class="m-1 b-1"> Destination Name</th>
                            <th class="m-1 b-1"> Distance KM</th>
                            <th class="m-1 b-1" width="3%">Details</th>



                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>

@endsection
@section('javascript')

<script>
    $(document).ready(function() {
        $('#distances').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url("distance") }}',
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'orgion',
                    name: 'orgion'
                },
                {
                    data: 'destination',
                    name: 'destination'
                },
                {
                    data: 'distance',
                    name: 'distance'
                },
                {
                    data: 'details',
                    name: 'details',
                    orderable: false
                }
            ],
        });
    });
</script>
@endsection
