@extends( 'master.app' )
@section( 'title', 'TIMS | Show Place ' . $place->name)
 @section('content')

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Operations</a>
            </li>
            <li class="breadcrumb-item active">Operation Place Create</li>
        </ol>
    </div>
  </header>

<div class="container">
    <div class="card col-md-12">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Details of Place <span class="text-info">{{$place->name}} </span></h2>
                <div class="ml-auto">
                    <a href="{{route('place.index')}}" class="btn btn-outline-primary"> <i class="fa fa-backward mr-1"
                            aria-hidden="true"> Back</i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">

                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Region</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$place->woreda->zone->region->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Zone</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$place->woreda->zone->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Woreda</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$place->woreda->name}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4">Place</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$place->name}}</h4>
                        </div>
                    </div>
                    {{-- <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Performance ERTE </label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">Origion {{$performance_origion}} and Destination
                                {{$performance_destination}}
                            </h4>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Performance Outsource </label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">Origion {{$osperformance_origion}} and Destination
                                {{$osperformance_destination}}
                            </h4>
                        </div>
                    </div> --}}

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Created In</label>
                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$place->created_at}} ||
                                {{$place->created_at->diffForHumans()}}</h4>
                        </div>
                    </div>
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-4"> Updated at</label>

                        <div class="col-lg-8">
                            <h4 class="col-form-label ">{{$place->updated_at}} ||
                                {{$place->updated_at->diffForHumans()}}</h4>
                        </div>
                    </div>

                </div>
                {{-- @can('operation_place edit') --}}
                <div class='m-1 p-1'>
                    <a href="{{route('place.edit',$place->id)}}" class="btn btn-info btn-xs"><i
                            class="fa fa-edit"> </i>Edit </a>
                </div>
                {{-- @endcan
                @can('operation_place delete') --}}
                <div class='m-1 p-1'>


                    <td class='p-1 text-center' data-toggle="tooltip" data-placement="top" title="Delete">

                        <form action="{{route('place.destroy', $place->id)}}" id="delete-form-{{$place->id}}"
                            style="display: none" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button class="btn btn-danger" type="submit" onclick="if(confirm('Are you sure to delete this?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$place->id}}').submit();
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
</div>

@endsection
@section('javascript')

@endsection
