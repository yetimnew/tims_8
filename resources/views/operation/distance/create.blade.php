@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Registration' )

@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Distance</li>
        </ol>
    </div>
</header>

<div class="container">
    <div class="card text-left">

        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>Distance egistration</h2>
                {{-- @can('driver create') --}}
                <div class="ml-auto">
                    <a href="{{route('distance.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>


                </div>
                {{-- @endcan --}}
            </div>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('distance.store')}}" class="form-horizontal" id="distance_reg"
                novalidate>
                @csrf
                @include('operation.distance.form')
                <div class="form-group required">
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
