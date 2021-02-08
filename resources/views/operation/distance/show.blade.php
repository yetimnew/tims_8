@extends( 'master.app' )
@section( 'title', 'TIMS | Distance ' )
@section( 'styles' )
<link rel="stylesheet" href="{{asset('/css/jquery.dataTables.min.css')}}">
@endsection
@section('content')
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Distance show</li>
        </ol>
    </div>
</header>


<div class="container">
    <div class="card col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
{{-- {{dd($distance)}} --}}
                <h2>Details of Distance Froms <span class="text-info">{{$distance->origin->name}}</span> To <span class="text-info"> {{$distance->destination->name}} </span></h2>
                <div class="ml-auto">
                    <a href="{{route('distance.index')}}" class="btn btn-outline-primary"> <i class="fa fa-backward mr-1"
                            aria-hidden="true"> Back</i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Origion Name</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$distance->origin->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Destination zone</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$distance->destination->woreda->zone->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Destination woreda</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$distance->destination->woreda->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Destination Place</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$distance->destination->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Distance KM</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$distance->km}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Created By</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$distance->user->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Last Updated By</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$distance->updatedby->name}}</h4>
                        </div>
                    </div>



                {{-- @can('operation_place edit') --}}
                <div class='m-1 p-1'>
                    <a href="{{route('distance.edit',$distance->id)}}" class="btn btn-info btn-xs"><i
                            class="fa fa-edit"> </i>Edit </a>
                </div>
                {{-- @endcan
                @can('operation_place delete') --}}
                <div class='m-1 p-1'>
                    <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Delete">

                        <form action="{{route('distance.destroy', $distance->id)}}" id="delete-form-{{$distance->id}}"
                            style="display: none" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button class="btn btn-danger" type="submit" onclick="if(confirm('Are you sure to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$distance->id}}').submit();
                            }else{
                                event.preventDefault();
                            }">
                            <i class="fa fa-trash"></i> Delete </button>
                    </td>

                </div>
                {{-- @endcan --}}

            </div>
        </div>
    </div>


@endsection
@section('javascript')

@endsection
