@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Show Plate ' . $truck->plate )

@section('content')

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Trucks</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
    </div>
  </header>


{{-- {{dd($truck)}} --}}
<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Truck Plate No <span class="text-violet">{{$truck->plate}} </span> </h2>
                <div class="ml-auto">
                    <a href="{{route('truck.index')}}" class="btn btn-outline-primary"> <i class="fa fa-backward mr-1"
                            aria-hidden="true"> Back</i> </a>
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
                        <label class="col-form-label col-lg-4">Vehecle Type</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->truck_models_id}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Chassis Number</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->chassis_number}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Engine Number</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->engine_number}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Tyre Size</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->tyre_size}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Service In KM</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->service_Interval_km}}</h4>
                        </div>
                    </div>


                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Purchase Price</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->purchase_price}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Poduction Date</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->production_date}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Servie Start Date</label>

                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->service_start_date}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Stauts</label>

                        <div class="col-lg-8">
                            @if ($truck->status == 1)
                            <h4 class="col-form-label ">Active </h4>
                            @else
                            <h4 class="col-form-label ">Deactivated </h4>
                            @endif

                        </div>
                    </div>

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Created In</label>

                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->created_at}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Updated at</label>

                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$truck->updated_at}}</h4>
                        </div>
                    </div>

                </div>
                {{-- @can('truck edit') --}}
                <div class='m-1 p-1'>
                    <a href="{{route('truck.edit', $truck->id)}}" class="btn btn-info btn-sm"><i
                            class="fa fa-edit"> </i>Edit </a>
                </div>
                {{-- @endcan --}}
                {{-- @can('truck delete') --}}
                <div class='m-1 p-1'>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$truck->id}})"
                        data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                </div>
                {{-- @endcan --}}
 {{-- @can('truck deactivate') --}}
                @if ($truck->status == 1)
                    <form action="{{route('truck.deactivate', $truck->id)}}" id="deactivate-form-{{$truck->id}}"
                        style="display: none">
                        @csrf
                        {{-- @method('DELETE') --}}
                    </form>
                    <button class="btn btn-sm btn-outline-info" type="submit" onclick="if(confirm('Are you sure to deactivate this? if your answer is yes you don\'t insert any data by this dirive. ')){
								event.preventDefault();
								document.getElementById('deactivate-form-{{$truck->id}}').submit();
									}else{
										event.preventDefault();
									}"> Deactivate

                    </button>
                          @else

                          <form action="{{route('truck.activate', $truck->id)}}" id="activate-form-{{$truck->id}}"
                            style="display: none">
                            @csrf
                            {{-- @method('DELETE') --}}
                        </form>
                        <button class="btn btn-sm btn-outline-info " type="submit" onclick="if(confirm('Are you sure to activate this? if your answer is yes you don\'t insert any data by this dirive. ')){
                                    event.preventDefault();
                                    document.getElementById('activate-form-{{$truck->id}}').submit();
                                        }else{
                                            event.preventDefault();
                                        }"> Activate

                        </button>
                @endif


              {{-- @endcan --}}
            </div>


        </div>
    </div>
</div>
<!-- Button trigger modal -->

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
                    <p class="text-center">Are You Sure Want To Delete ? Plate Number <span class="font-weight-bold">
                            {{$truck->plate}}</span> </p>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                            onclick="formSubmit()">Yes, Delete</button>
                    </center>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('javascript')
<script>
    function deleteData(id)
     {
         var id = id;
         var url = '{{ route("truck.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endsection
