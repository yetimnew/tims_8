@extends( 'master.app' )
@section( 'title', 'TIMS |Driver Truck' )

@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Driver And Truck Create</li>
        </ol>
    </div>
  </header>
    @include('master.error')
    {{-- @include('master.success') --}}
    <div class="container">
    <div class="card text-left">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>Truck And Driver Registration</h2>
                <div class="ml-auto">
                    <a href="{{route('driver_truck.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
            </div>
        </div>
<div class="card-body">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4">Plate Number</label>
                    <div class="col-lg-8">
                        <h4 class="col-form-label ">{{$truck->plate}}</h4>
                    </div>
                </div>
                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4">Driver ID</label>
                    <div class="col-lg-8">
                        <h4 class="col-form-label "> {{$driver->driverid}}</h4>
                    </div>
                </div>
                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4">Driver Name</label>
                    <div class="col-lg-8">
                        <h4 class="col-form-label "> {{$driver->name}}</h4>
                    </div>
                </div>
                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4">Date Recived</label>
                    <div class="col-lg-8">
                        <h4 class="col-form-label ">{{$drivertruck->date_received}} || {{ $drivertruck->date_received ? $drivertruck->date_received->diffForHumans() : ''}}</h4>
                    </div>
                </div>
                @if ($drivertruck->is_attached == 0)
                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4">Date Detached</label>
                    <div class="col-lg-8">
                        <h4 class="col-form-label ">{{$drivertruck->date_detach}}</h4>
                    </div>
                </div>
                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4">Drive for </label>
                    <div class="col-lg-8">
                        <h4 class="col-form-label ">{{$difinday }} days or <span>{{$diffinhour}} hours</h4>
                    </div>
                </div>
                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4">Reason</label>
                    <div class="col-lg-8">
                        <h4 class="col-form-label ">{{$drivertruck->reason}}</h4>
                    </div>
                </div>
                @endif

                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4 m-0">Created In</label>
                    <div class="col-lg-8 m-0">
                        <h4 class="col-form-label m-0 ">{{$drivertruck->created_at}} || {{$drivertruck->created_at ? $drivertruck->created_at->diffForHumans() : '-'}}</h4>
                    </div>
                </div>
                <div class="form-group row m-0">
                    <label class="col-form-label col-lg-4 m-0">Updated In</label>
                    <div class="col-lg-8 m-0">
                        <h4 class="col-form-label m-0 ">{{$drivertruck->updated_at }} || {{$drivertruck->updated_at ? $drivertruck->updated_at->diffForHumans() : '-'}}
                        </h4>
                    </div>
                </div>


            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h5> FO By {{$driver->name}}</h5>
                <ul class="list-group">
                    {{-- @if (count($performance) > 0)
                    @foreach ($performance as $key => $pr)
                    <li class="list-group-item">{{$key+1}} - {{$pr->FOnumber}}
                        <span class="badge badge-pill badge-primary text-right">{{$pr->DateDispach}}</span> </li>
                    @endforeach
                    @else

                    <li class="list-group-item"> No Performance found </li>

                    @endif --}}

                </ul>
            </div>
            {{-- @can('truck_driver edit') --}}
            <div class='m-1 p-1'><a href="{{route('driver_truck.edit',$drivertruck->id)}}" class="btn btn-info btn-xs"><i
                        class="fa fa-edit"> </i>Edit </a>
            </div>
            {{-- @endcan --}}

            @if ($drivertruck->is_attached == 1)
            {{-- @can('truck_driver detach') --}}
            <div class='m-1 p-1'>
                <a href="javascript:;" data-toggle="modal" onclick="detachData({{$drivertruck->id}})" data-target="#detachModal"
                    class="btn btn-xs btn-info"><i class="fa fa-trash"></i>Detach </a>
            </div>
            {{-- @endcan --}}
            @endif

            {{-- @can('truck_driver delete') --}}
            <div class='m-1 p-1'>
                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$drivertruck->id}})" data-target="#DeleteModal"
                    class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </div>
            {{-- @endcan --}}
        </div>

</div>
        <div class="card-footer">
            the footer
        </div>

    </div>
</div>

<!-- Modal -->
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="deleteForm" method="post">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-center text-white">DELETE CONFIRMATION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <p class="text-center">Are You Sure Want To Delete ? <span class="font-weight-bold"> </span> </p>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                            onclick="formSubmitdelete()">Yes, Delete</button>
                    </center>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Detach Modal -->
<div id="detachModal" class="modal fade text-danger" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="detachForm" method="post">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-center text-white">DETACH CONFIRMATION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('GET')
                    <p class="text-center">Are You Sure To detach ?<br> <span class="font-weight-bold">
                            {{$driver->name}} </span> from plate <span class="font-weight-bold"> {{$drivertruck->plate}} </span>
                    </p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                        onclick="formSubmit()">Yes, Detach</button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section( 'javascript' )
<script>
    function deleteData(id)
     {
         var id = id;
         var url = '{{ route("driver_truck.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmitdelete()
     {
         $("#deleteForm").submit();
     }
     function detachData(id)
     {
         var id = id;
         var url = '{{ route("driver_truck.detach", ":id") }}';
         url = url.replace(':id', id);
         $("#detachForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#detachForm").submit();
     }
</script>

@endsection
