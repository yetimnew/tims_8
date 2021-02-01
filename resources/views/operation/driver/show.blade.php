@extends( 'master.app' )
@section( 'title', 'TIMS | driver Show Plate ' . $driver->driverid )

@section('content')

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">drivers</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
    </div>
  </header>


{{-- {{dd($driver)}} --}}
<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>driver Plate No <span class="text-violet">{{$driver->driverid}} </span> </h2>
                <div class="ml-auto">
                    <a href="{{route('driver.index')}}" class="btn btn-outline-primary"> <i class="fa fa-backward mr-1"
                            aria-hidden="true"> Back</i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">ID Number</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->driverid}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Full Name</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Sex</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->sex}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Birth Date</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->birth_date}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Zone</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->zone}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Worda</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->woreda}}</h4>
                        </div>
                    </div>


                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Kebele</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->kebele}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">House Number</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->house_number}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Mobile Number</label>

                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->mobile}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Stauts</label>

                        <div class="col-lg-8">
                            @if ($driver->status == 1)
                            <h4 class="col-form-label ">Active </h4>
                            @else
                            <h4 class="col-form-label ">Deactivated </h4>
                            @endif

                        </div>
                    </div>

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Created In</label>

                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->created_at}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Updated at</label>

                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$driver->updated_at}}</h4>
                        </div>
                    </div>

                </div>
                {{-- @can('driver edit') --}}
                <div class='m-1 p-1'>
                    <a href="{{route('driver.edit', $driver->id)}}" class="btn btn-info btn-sm"><i
                            class="fa fa-edit"> </i>Edit </a>
                </div>
                {{-- @endcan --}}
                {{-- @can('driver delete') --}}
                <div class='m-1 p-1'>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$driver->id}})"
                        data-target="#DeleteModal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a>
                </div>
                {{-- @endcan --}}
 {{-- @can('driver deactivate') --}}
                @if ($driver->status == 1)
                    <form action="{{route('driver.deactivate', $driver->id)}}" id="deactivate-form-{{$driver->id}}"
                        style="display: none">
                        @csrf
                        {{-- @method('DELETE') --}}
                    </form>
                    <button class="btn btn-sm btn-outline-info" type="submit" onclick="if(confirm('Are you sure to deactivate this? if your answer is yes you don\'t insert any data by this dirive. ')){
								event.preventDefault();
								document.getElementById('deactivate-form-{{$driver->id}}').submit();
									}else{
										event.preventDefault();
									}"> Deactivate

                    </button>
                          @else

                          <form action="{{route('driver.activate', $driver->id)}}" id="activate-form-{{$driver->id}}"
                            style="display: none">
                            @csrf
                            {{-- @method('DELETE') --}}
                        </form>
                        <button class="btn btn-sm btn-outline-info " type="submit" onclick="if(confirm('Are you sure to activate this? if your answer is yes you don\'t insert any data by this dirive. ')){
                                    event.preventDefault();
                                    document.getElementById('activate-form-{{$driver->id}}').submit();
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
                            {{$driver->plate}}</span> </p>
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
         var url = '{{ route("driver.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }
</script>
@endsection
