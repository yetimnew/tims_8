@extends( 'master.app' )
@section( 'title', 'TIMS | Job Type Update' )
@section( 'content' )

<div class="col-md-12">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Downtime Update</li>
    </ol>

    <div class="card text-left">

        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Downtime Update <strong class="blue">{{$jobtype->name}}</strong></h2>
                {{-- @can('driver edit') --}}
                <div class="ml-auto">
                    <a href="{{route('job_type.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- @endcan --}}
            </div>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('job_type.update',$jobtype->id)}}" class="form-horizontal"
                id="driver_reg">
                @csrf
                @method('PATCH')
                @include('maintenance.job_type.form')

                <div class="d-flex align-items-center mt-4">
                    <div class="form-group 	required ">
                        <label class="control-label" for="job"></label>
                        This Field must have value</div>
                    <div class="form-group ml-auto">
                        <button type="submit" class="btn btn-primary" name="save"> <i class="fa fa-save mr-1"
                                aria-hidden="true"></i>Save Updates</button>

                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer">

        </div>

    </div>
</div>

@endsection
