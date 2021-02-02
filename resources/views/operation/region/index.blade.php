@extends( 'master.app' )
@section( 'title', 'TIMS | Region ' )
 @section('content')

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
	<div class="card text-left col-md-12">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<h2>All regions </h2>
				{{-- @can('customer create') --}}

				<div class="ml-auto">
					<a href="{{route('region.create')}}" class="btn btn-outline-primary"><i
							class="fafa-plus mr-1"></i>Add regions</a>

				</div>
				{{-- @endcan --}}
			</div>
		</div>


<div class="card-body">
    <div class="table-responsive text-nowrap">
        <table class="table table-bordered table-sm table-striped" id="region">
            <thead>
                <tr>
                    <th class="m-1 b-1">Number</th>
                    <th>Region Name</th>
                    <th>Comment</th>
                    {{-- @can('operation_region edit') --}}
                    <th>Edit</th>
                    {{-- @endcan
                    @can('operation_region delete') --}}
                    <th>Delete</th>
                    {{-- @endcan --}}

                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @if ($regions->count()> 0)
                @foreach ($regions as $region)
                <tr>
                    <td class='m-1 p-1'>{{$no ++}}</td>
                    <td class='m-1 p-1'>{{$region->name}}</td>
                    <td class='m-1 p-1'>{{$region->comment}}</td>
                    {{-- @can('operation_region edit') --}}
                    <td class='m-1 p-1'><a href="{{route('region.edit',$region->id)}}"
                            class="btn btn-info btn-sm"><i class="fa fa-edit"> </i></a>
                    </td>
                    {{-- @endcan
                    @can('operation_region delete') --}}
                    <td class='m-1 p-1'>

                        <form action="{{route('region.destroy',$region->id)}}" id="detach-form-{{$region->id}}"
                            method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to Delete this?')){
                            event.preventDefault();
                            document.getElementById('detach-form-{{$region->id}}').submit();
                        }else{
                            event.preventDefault();
                        }"> <i class="fa fa-trash"> </i>
                        </button>
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
</div>
        @endsection
        @section('javascript')
        <script src="{{ asset('js/jquery.dataTables.min.js') }}">
        </script>
        <script>
            $( document ).ready( function () {
				$( '#region' ).DataTable();
			} );
        </script>
        @endsection
