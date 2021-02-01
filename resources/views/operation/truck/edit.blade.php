@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Update Plate ' .  $truck->plate)
@section( 'content' )

    <header class="page-header mb-4">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Trucks</a></li>
                <li class="breadcrumb-item active">Truck Update</li>
            </ol>
        </div>
      </header>
    {{-- @include('master.error') --}}
    {{-- @include('master.success') --}}
    <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Truck Update <strong class="text-violet">{{$truck->plate}}</strong></h2>
                {{-- @can('truck edit') --}}
                <div class="ml-auto">
                    <a href="{{route('truck.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>
                        Back</a>

                </div>
                {{-- @endcan --}}
            </div>

        </div>

        <div class="card-body">
            <form  action="{{route('truck.update',$truck->id)}}" class="form-horizontal" id="truck_form" method="POST">
                @method('PATCH')
                @csrf
                @include('operation.truck.form')
                <div class="form-group required pull-right">
                    <button type="submit" class="btn btn-primary" name="save">Save Update</button>
                </div>
        </div>


    </div>
    <div class="card-footer">
        the footer
    </div>

    </form>
</div>
</div>

@endsection
