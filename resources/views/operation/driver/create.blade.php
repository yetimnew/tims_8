@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Registration' )

@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Driver</li>
            <li class="breadcrumb-item active">Driver Registration</li>
        </ol>
    </div>
</header>

<div class="container">
    <div class="card text-left">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>Driver Registration</h2>
                {{-- @can('driver create') --}}
                <div class="ml-auto">
                    <a href="{{route('driver.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- @endcan --}}
            </div>

        </div>
        <div class="card-body">
            {{-- @include('master.error') --}}
            <form method="post" action="{{route('driver.store')}}" id="driver_reg">
                @csrf
                @include('operation.driver.form')
                <div class="form-group required pull-right mt-4">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>

                </div>
        </div>

    </div>
</div>
<div class="card-footer">

</div>

</form>
</div>
</div>

@endsection
@section( 'javascript' )

@endsection
