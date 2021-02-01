@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Model ' )
  @section('content')

  <header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item "><a href="#">Truks</a>
            </li>
            <li class="breadcrumb-item active">Truks Model</li>
        </ol>
    </div>

  </header>
<div class="container">
    <div class="card col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>All Truck Models </h2>
                {{-- @can('truck_model create') --}}
                    <div class="ml-auto">
                        <a href="{{route('truck_model.create')}}" class="btn btn-outline-primary"><i
                                class="fafa-plus mr-1"></i>Add Truck Model</a>
                    </div>
                {{-- @endcan --}}
            </div>
        </div>
        <div class="card-body">
            <div class="table table-responsive">
                <table class="table table-bordered table-sm table-striped" id="truck_models">
                    <thead>
                        <tr>
                            <th class="m-1 b-1">No</th>
                            <th class="m-1 b-1">Name/Model</th>
                            <th class="m-1 b-1">Company</th>
                            <th class="m-1 b-1">Production Date </th>
                            <th class="m-1 b-1">Comment</th>
                            {{-- @can('truck_model edit') --}}
                            <th class="m-1 b-1">Edit</th>
                            {{-- @endcan
                            @can('truck_model delete') --}}
                            <th class="m-1 b-1">Delete</th>
                            {{-- @endcan --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if ($truck_models->count() > 0)
                        @foreach ($truck_models as $truck_model)
                        <tr>
                            <td class='m-1 p-1'>{{$truck_model->id}}</td>
                            <td class='m-1 p-1'>{{$truck_model->name}}</td>
                            <td class='m-1 p-1'>{{$truck_model->company}}</td>
                            <td class='m-1 p-1'>{{$truck_model->production_date}}</td>
                            <td class='m-1 p-1'>{{$truck_model->comment}}</td>
                            {{-- @can('truck_model edit') --}}
                            <td class='m-1 p-1 text-center' data-toggle="tooltip" data-placement="top" title="Edit"><a
                                    href="{{route('truck_model.edit', $truck_model->id) }} "><i class="fa fa-edit"> </i></a>
                            </td>
                            {{-- @endcan
                            @can('truck_model delete') --}}
                            <td class='m-1 p-1 text-center'>

                                <form action="{{route('truck_model.destroy',$truck_model->id)}}"
                                    id="detach-form-{{$truck_model->id}}" style="display: none" method="POST">
                                    @csrf
                                     @method('DELETE')
                                </form>
                                <button type="submit" onclick="if(confirm('Are you sure to Delete this?')){
                                event.preventDefault();
                                document.getElementById('detach-form-{{$truck_model->id}}').submit();
                            }else{
                                event.preventDefault();
                            }"> <i class="fa fa-trash red"></i>
                                </button>
                            </td>
                            {{-- @endcan --}}

                        </tr>

                        @endforeach
                         @else
                        <tr>
                            <td class='m-1 p-1 text-center' colspan="7">No Data Avilable</td>
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

</div>

@endsection
@section('javascript')
<script>
    $( document ).ready( function () {
        $( '#truck_models' ).DataTable();
			} );
</script>
@endsection
