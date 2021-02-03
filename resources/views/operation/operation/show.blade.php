@extends( 'master.app' )
@section( 'title', 'TIMS | Operation Edit' )
@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Operation</li>
            <li class="breadcrumb-item active">Operation Edit</li>
          </ol>
    </div>
  </header>



<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Details of Operation Id {{$operation->operationid}} </h2>
                <div class="ml-auto">
                    <a href="{{route('operation.index')}}" class="btn btn-outline-primary"> <i class="fa fa-backward mr-1"
                            aria-hidden="true"> Back</i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- {{ dd($performance)}} --}}
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Operation ID</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$operation->operationid}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Customer Name</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$operation->customer->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Start Date</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$operation->startdate}} </h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Region Name</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$operation->place->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Volume In Ton</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{ number_format($operation->volume)}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Cargo Type</label>
                        <div class="col-lg-8">
                            @if ($operation->cargotype == 1)
                            <h4 class="col-form-label ">Relief Cargo</h4>
                            @else
                            <h4 class="col-form-label "> Commercial Cargo</h4>

                            @endif
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Ton KM</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{number_format($operation->km,2)}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Tariff</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$operation->tariff}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Status</label>
                        <div class="col-lg-8">
                            @if ($operation->closed)
                            <h4 class="col-form-label "> <span class="badge badge-primary">Active</span> </h4>
                            @else
                            <h4 class="col-form-label "> <span class="badge badge-warning">Closed</span> </h4>

                            @endif
                        </div>
                    </div>
                    @if (!$operation->closed)
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">End Date</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$operation->enddate}} </h4>

                        </div>
                    </div>
                    @endif
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Expected Revenu</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{ number_format(($operation->km * $operation->tariff ),2) }}
                            </h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Actual Revenu</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">
                                {{-- {{ number_format($outsource_performance->revenue + ($operation->tariff * $performance->tonekm) ) }}
                                <span class="badge badge-primary">
                                    {{number_format((( ($outsource_performance->revenue + ($operation->tariff * $performance->tonekm) )
                                    /($operation->km * $operation->tariff)) *100),2)}}
                                    % </span> --}}
                            </h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">ERTE</th>
                                <th scope="col">Outsource</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Uplifted Ton</th>
                                {{-- <td>{{ number_format($performance->mt ) }}</td>
                                <td>{{ number_format($outsource_performance->mt ) }}</td>
                                <td> {{ number_format($performance->mt + $outsource_performance->mt ) }}</td> --}}
                            </tr>
                            <tr>
                                <th scope="row">Tone Km Performed</th>
                                {{-- <td>{{ number_format($performance->tonekm,2 ) }}</td>
                                <td>{{ number_format($outsource_performance->tonekm,2 ) }}</td>
                                <td>{{ number_format($outsource_performance->tonekm + $performance->tonekm ,2 ) }}</td> --}}
                            </tr>
                            <tr>
                                <th scope="row">Trip</th>
                                {{-- <td>{{ number_format($performance->trip ) }}</td>
                                <td>{{ number_format($outsource_performance->trip ) }}</td>
                                <td>{{ number_format($performance->trip + $outsource_performance->trip  ) }}</td> --}}
                            </tr>
                            <tr>
                                <th scope="row">Distance With Cargo</th>
                                {{-- <td>{{ number_format($performance->dwc ) }}</td>
                                <td>{{ number_format($outsource_performance_km->dwc ) }}</td>
                                <td>{{ number_format($outsource_performance_km->dwc  + $performance->dwc) }}</td> --}}
                            </tr>
                            <tr>
                                <th scope="row">Distance Without Cargo</th>
                                {{-- <td>{{ number_format($performance->dwoc ) }}</td>
                                <td>{{ number_format($outsource_performance_km->dwoc  ) }}</td>
                                <td>{{ number_format($outsource_performance_km->dwoc +  $performance->dwoc ) }}</td> --}}
                            </tr>
                            <tr>
                                <th scope="row">Total Km</th>
                                {{-- <td>{{ number_format($performance->dwoc + $performance->dwc ) }}</td>
                                <td>{{ number_format($outsource_performance_km->dwoc +$outsource_performance_km->dwc  ) }}
                                </td>
                                <td>{{ number_format(($outsource_performance_km->dwoc + $outsource_performance->dwc) + ($performance->dwoc + $performance->dwc)  ) }} --}}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Revenu</th>
                                {{-- <td> {{ number_format(($operation->tariff * $performance->tonekm),2) }}</td>
                                <td>{{ number_format($outsource_performance->revenue  ) }}</td>
                                <td>{{ number_format($outsource_performance->revenue + ($operation->tariff * $performance->tonekm) ) }} --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4 m-0">Fuel In Birr</label>
                        <div class="col-lg-8 m-0">
                            <h4 class="col-form-label m-0 ">{{ number_format($performance->fuel ) }}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4 m-0">Perdiem</label>
                        <div class="col-lg-8 m-0">
                            <h4 class="col-form-label m-0 ">{{ number_format($performance->per ) }}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4 m-0">Operational Expense</label>
                        <div class="col-lg-8 m-0">
                            <h4 class="col-form-label m-0 ">{{ number_format($performance->wog ) }}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4 m-0">Other Expense </label>
                        <div class="col-lg-8 m-0">
                            <h4 class="col-form-label m-0 ">{{ number_format($performance->other ) }}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4 m-0">Total Expense </label>
                        <div class="col-lg-8 m-0">
                            <h4 class="col-form-label m-0 ">
                                {{number_format(($performance->fuel + $performance->per + $performance->wog + $performance->other) ) }}
                            </h4>
                        </div>
                    </div> --}}
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Created By</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$operation->user->name}}</h4>

                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">last Updated By</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$operation->updatedby->name}}</h4>

                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4 m-0">Created In</label>
                        <div class="col-lg-8 m-0">
                            <h4 class="col-form-label m-0 ">{{$operation->created_at}} ||
                                {{$operation->created_at->diffForHumans()}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4 m-0">Updated In</label>
                        <div class="col-lg-8 m-0">
                            <h4 class="col-form-label m-0 ">{{$operation->updated_at }} ||
                                {{$operation->updated_at->diffForHumans()}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4 m-0">Comment</label>
                        <div class="col-lg-8 m-0">
                            <h4 class="col-form-label m-0 ">{{$operation->remark}}</h4>
                        </div>
                    </div>

                </div>
                {{-- @can('operation edit') --}}
                <div class='ml-1 p-1'>
                    <a href="{{route('operation.edit', $operation->id)}}" class="btn btn-info btn-sm"> <i
                            class="fa fa-edit"></i> Edit </a>
                </div>

                {{-- @endcan --}}


                {{-- @can('operation delete') --}}
                <div class='m-1 p-1'>
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$operation->id}})"
                        data-target="#DeleteModal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                </div>
                {{-- @endcan
                @can('operation close') --}}
                @if ($operation->closed )
                <div class='ml-1 p-1'>
                    <a href="javascript:;" data-toggle="modal" onclick="closeData({{$operation->id}})"
                        data-target="#CloseModal" class="btn btn-info"><i class="fa fa-window-close"></i> Close</a>
                </div>
                @else
                <div class='ml-1 p-1'>

                    <form action="{{route('operation.open', $operation->id)}}"
                        id="delete-form-{{$operation->id}}" style="display: none">
                        @csrf
                         @method('POST')
                    </form>
                    <button class="btn btn-default btn-sm" type="submit" onclick="if(confirm('Are you sure to reopen this?')){
									event.preventDefault();
									document.getElementById('delete-form-{{$operation->id}}').submit();
										}else{
											event.preventDefault();
										}"> <i class="fa fa-trash blue"> ReOpen</i>
                    </button>

                </div>

                @endif
                {{-- @endcan --}}
            </div>
            <div class="card-footer">
                the footer
            </div>

        </div>
    </div>
</div>

<!-- Modal  delete-->
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
                    <p class="text-center">Are You Sure Want To Delete ? Operation Id <span class="font-weight-bold">
                            {{$operation->operationid}}</span> </p>
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

<!-- Modal  Close-->
<div id="CloseModal" class="modal fade text-danger" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <form action="" id="closeForm" method="post">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-center text-white">Close CONFIRMATION</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('GET')
                    <p class="text-center">Are You Sure Want To close ? Operation Id <span class="font-weight-bold">
                            {{$operation->operationid}}</span> </p>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="" class="btn btn-danger" data-dismiss="modal"
                            onclick="formSubmit()">Yes, Close</button>
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
         var url = '{{ route("operation.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

     function closeData(id)
     {
         var id = id;
         var url = '{{ route("operation.close", ":id") }}';
         url = url.replace(':id', id);
         $("#closeForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#closeForm").submit();
     }


</script>
@endsection
