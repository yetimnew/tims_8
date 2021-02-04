@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Registration' )
@section('content')
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Trucks</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>
    </div>

  </header>

{{-- {{dd($trucks)}} --}}
<div class="container">
    <div class="card text-left col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>All Trucks </h2>
                {{-- @can('driver create') --}}
                <div class="ml-auto">
                    <a href="{{route('truck.create')}}" class="btn btn-outline-primary"><i
                            class="fa fa-plus mr-1"></i>Add Truck</a>

                </div>
                {{-- @endcan --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-sm  table-bordered" id="trucks">
                    <thead>
                        <tr>
                            <th class="m-1 b-1" width="2%">No</th>
                            <th class="m-1 b-1">Plate Number</th>
                            <th class="m-1 b-1">Model</th>
                            <th class="m-1 b-1">SIIKM</th>
                            <th class="m-1 b-1">Purchase Price</th>
                            <th class="m-1 b-1">Production Date</th>
                            <th class="m-1 b-1">Start Date</th>
                            {{-- @can('truck edit') --}}
                            <th class="m-1 b-1 text-center" width="3%">Details</th>
                            {{-- @endcan --}}

                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd($trucks)}} --}}
                        <?php $no = 0 ?>
                        @if ($trucks->count()> 0)
                        @foreach ($trucks as $truck)
                        <tr>
                            <td class='p-1'>{{++$no }}</td>
                            <td class='p-1'>{{$truck->plate}}</td>

                            <td class='p-1'>{{$truck->truckmodel->name}}</td>

                            <td class='p-1'>{{$truck->tyre_size}}</td>
                            <td class='p-1'>{{ number_format($truck->service_Interval_km , 2)}}</td>
                            <td class='p-1'>{{$truck->production_date}}</td>
                            <td class='p-1'>{{$truck->service_start_date}}</td>

                            {{-- @can('truck edit') --}}
                            <td class='m-1 p-1 text-center'><a href="{{route('truck.show', $truck->id)}}"><i
                                        class="fa fa-edit"> </i></a>
                            </td>
                            {{-- @endcan --}}
                        </tr>

                        @endforeach
                         @else
                        <tr>
                            <td class='m-1 p-1 text-center' colspan="12">No Data Avilable</td>
                        </tr>
                        @endif

                    </tbody>
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
				$( '#trucks' ).DataTable( {
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					"pageLength": 10,
					'columnDefs': [ {
					'orderable': false, /* true or false */

}]
				} );
			} );
</script>
@endsection
