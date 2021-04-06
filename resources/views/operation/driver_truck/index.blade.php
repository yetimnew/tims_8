@extends( 'master.app' )
@section('content')

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Driver And Truck Create</li>
        </ol>
    </div>
</header>

<div class="card col-md-12">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h2>All Drivers and Plates </h2>
            {{-- @can('truck_driver create') --}}
            <div class="ml-auto">
                <a href="{{route('driver_truck.create')}}" class="btn btn-outline-primary"><i
                        class="fafa-plus mr-1"></i>Assign Drivers to Truck</a>

            </div>
            {{-- @endcan --}}
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered table-sm table-striped" id="truck_driver">
                <thead>
                    <tr>
                        <th class="m-1 b-1">No</th>
                        <th class="m-1 b-1">Driver ID</th>
                        <th class="m-1 b-1">Driver Name</th>
                        <th class="m-1 b-1">Plate</th>
                        <th class="m-1 b-1">Recived Date</th>
                        <th class="m-1 b-1">Dettach Date</th>
                        <th class="m-1 b-1">Status</th>
                        {{-- @can('truck_driver view') --}}
                        <th class="m-1 b-1">Show</th>
                        {{-- @endcan --}}

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;?>
                    @forelse ($driver_truck as $dt)
                    <tr>
                        <td class='m-1 p-1'>{{++$no}}</td>
                        <td class='m-1 p-1'>{{$dt->DriverId}}</td>
                        <td class='m-1 p-1'>{{$dt->Name}}</td>
                        <td class='m-1 p-1'>{{$dt->Plate}}</td>
                        <td class='m-1 p-1'>{{$dt->date_received}}</td>
                        <td class='m-1 p-1'>{{$dt->date_detach}}</td>
                        @if ($dt->is_attached == 1)
                        <td class='m-1 p-1'><span class="badge badge-primary">Attached</span></td>
                        @else
                        <td class='m-1 p-1'><span class="badge badge-danger">Detached</span> </td>
                        @endif
                        {{-- @can('truck_driver view') --}}
                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="show"><a
                                href="{{route('driver_truck.show',$dt->id)}}"><i class="fa fa-edit"></i></a>
                        </td>
                        {{-- @endcan --}}
                    </tr>
                    @empty
                    <tr>
                        <td class='m-1 p-1 text-center' colspan="8">No Data Avilable</td>
                    </tr>
                    @endforelse


                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer">

    </div>
</div>

@endsection
@section('javascript')
<script>
    $( document ).ready( function () {
				$( '#truck_driver' ).DataTable({
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"pageLength": 25,
				// "scrollY": 100,
				'columnDefs': [ {

				// 'targets': [7,8], /* column index */

				'orderable': false, /* true or false */
				}]
				});
			} );


</script>
@endsection
