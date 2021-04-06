@extends( 'master.app' )
@section( 'title', 'TIMS | Performance Create' )
@section('content')
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Performance</li>
        </ol>
    </div>
</header>
{{-- {{dd($statuslist[0])}} --}}

<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>All Performances </h2>
                {{-- @can('performance create') --}}
                <div class="ml-auto">
                    <a href="{{route('performance.create')}}" class="btn btn-outline-primary"><i
                            class="fafa-plus mr-1"></i>Add Performance</a>
                </div>
                {{-- @endcan --}}
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-sm table-striped" id="performance_table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>FO</th>
                            <th>Driver</th>
                            <th>Plate</th>
                            <th>Date Dispach</th>
                            <th>Destination </th>
                            <th>Ton KM</th>
                            <th>VolumMT</th>
                            <th>Is Returned?</th>
                            <th>Type of Trip</th>
                            <th class="text-center" width="4%">Details</th>
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
    $( document ).ready( function () {
                $( '#performance_table' ).DataTable({
                    processing: true,
                    serverSide: true,
                         order: [
                                [0, 'desc']
                            ],
                    ajax: '{{ url('/operation/performance') }}',
                    columns: [
                                { data: 'id', name: 'id' },
                                { data: 'fo', name: 'fo' },
                                { data: 'dname', name: 'dname' },
                                { data: 'plate', name: 'plate' },
                                { data: 'ddate', name: 'ddate' },
                                { data: 'orgion', name: 'orgion' },
                                { data: 'tonkm', name: 'tonkm' },
                                { data: 'tone', name: 'tone' },
                                { data: 'is_returned', name: 'is_returned' },
                                { data: 'trip', name: 'trip' },
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
