@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Registration' )

@section( 'content' )

<div class="col-md-12">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('hrm')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Leave Type Registration</li>
        </ol>
    </nav>
    <div class="card text-left">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>Leave Type</h2>
                {{-- <!-- @can('driver create') --> --}}
                <div class="ml-auto">
                    <a href="{{route('leave_type.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- <!-- @endcan --> --}}
            </div>

        </div>
        <div class="card-body">

            <form method="post" action="{{route('leave_type.store')}}" class="form-horizontal" id="driver_reg"
                novalidate>
                @csrf
                @include('hrm.leave_type.form')


                <div class="d-flex align-items-center mt-4">
                    <div class="form-group 	required ">
                        <label class="control-label" for="job"></label>
                        This Field must have value</div>
                    {{-- @can('customer create') --}}

                    <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary" name="save"> <i class="fa fa-save mr-1"
                                aria-hidden="true"></i>Save</button>

                    </div>
                </div>
        </div>

        <div class="card-footer">

        </div>

        </form>
    </div>
</div>

@endsection
