@extends( 'master.app' )
@section( 'title', 'TIMS | Truck Registration' )
@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item ">Trucks</li>
            <li class="breadcrumb-item active">Truck Registration</li>
        </ol>
    </div>

</header>


{{-- @include('master.error') --}}
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Truck Registration</h2>
                {{-- @can('driver create') --}}
                <div class="ml-auto">
                    <a href="{{route('truck.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- @endcan --}}
            </div>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('truck.store')}}" id="truck_reg_form">
                @csrf
                @include('operation.truck.form')
                <div class="form-group required pull-right">
                    <button type="submit" class="btn btn-outline-primary btn-lg" name="save">
                        <i class="fafa-save"></i>
                        Save</button>
                </div>

        </div>
        <div class="card-footer">
        </div>

    </div>
</div>
</div>
</div>


@endsection
