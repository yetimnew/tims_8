@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Update' )
@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Distance Update</li>
        </ol>
    </div>
</header>

<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Distance Update <strong class="blue">{{$distance->name}}</strong></h2>
                @can('distance edit')
                <div class="ml-auto">
                    <a href="{{route('distance.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>
                        Back</a>

                </div>
                @endcan
            </div>

        </div>
        <div class="card-body">
            @include('master.error')
            <form method="post" action="{{route('distance.update',$distance->id)}}" class="form-horizontal" id="distance_reg" novalidate>
                @csrf
                @method('PATCH')
                @include('operation.distance.form')

                <div class="form-group d-flex  required">

                    <div class="ml-auto">
                        <button type="submit" class="btn btn-el btn-outline-primary ml-auto" name="save">
                            Save update</button>
                    </div>

                </div>
            </form>
        </div>


    </div>
</div>
</div>

@endsection
