@extends( 'master.app' )
@section( 'title', 'TIMS | Driver' )

@section('content')

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{session('route')}}"> {{ session('key') }}</a>
            </li>
        </ol>
    </div>
</header>

<div class="container">
    <div class="card text-left col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>All Drivers </h2>

                {{-- @can('customer create') --}}
                <div class="ml-auto">
                    <a href="{{route('driver.create')}}" class="btn btn-outline-primary"><i
                            class="fafa-plus mr-1"></i>Add Driver</a>
                </div>
                {{-- @endcan --}}

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table-sm table table-bordered table-sm table-striped" id="drivers">
                    <thead>
                        <tr>
                            <th class="m-1 b-1" width="3%">No</th>
                            <th class="m-1 b-1">ID</th>
                            <th class="m-1 b-1"> Name</th>
                            <th class="m-1 b-1"> Birthdate</th>
                            <th class="m-1 b-1">Telephone</th>
                            <th class="m-1 b-1">Hired Date</th>

                            {{-- @can('driver edit') --}}
                            <th class="m-1 b-1" width="3%">Details</th>
                            {{-- @endcan
							@can('driver delete') --}}
                            {{-- <th class="m-1 b-1" width="3%">Delete</th> --}}
                            {{-- @endcan
							@can('driver deactivate') --}}
                            {{-- <th class="m-1 b-1" width="3%">Deactivate</th> --}}
                            {{-- @endcan --}}

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        @forelse ($drivers as $driver)
                        <tr>
                            <td class='p-1'>{{++$no}}</td>
                            <td class='p-1'>{{$driver->driverid}}</td>
                            <td class='p-1'>{{$driver->name}}</td>
                            <td class='p-1 text-center'>{{$driver->birth_date}}</td>
                            <td class='p-1 text-center'>{{$driver->mobile}}</td>
                            <td class='p-1 text-center'>{{$driver->hired_date}}</td>
                            {{-- @can('driver edit') --}}
                            <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit"><a
                                    href="{{route('driver.show', $driver->id)}}"><i class="fa fa-edit"></i></a>
                            </td>
                            {{-- @endcan
							@can('driver delete') --}}

                        </tr>
                        {{-- @endcan --}}
                        @empty
                        <tr>
                            <td class='m-1 p-1 text-center' colspan="7">No Data Avilable</td>
                        </tr>

                        @endforelse ()
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
            $( '#drivers' ).DataTable( {
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "pageLength": 10,
                'columnDefs': [ {
                'orderable': false, /* true or false */
                    }]
            } );
        } );
</script>
@endsection
