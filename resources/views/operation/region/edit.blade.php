@extends( 'master.app' )
@section( 'title', 'TIMS |  Update Region ' . $region->name)

@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Operations</a>
            </li>
    <li class="breadcrumb-item active">Region Update</li>
        </ol>
    </div>
  </header>

<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Region Update <strong class="text-violet">{{$region->name}}</strong></h2>
                {{-- @can('driver edit') --}}
                <div class="ml-auto">
                    <a href="{{route('region.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('region.update',$region->id)}}" class="form-horizontal"
                id="region_reg">
                @csrf
                @method('PATCH')

        <div class="form-group mb-0 required">
            <label class="control-label">Region Name</label>
            <div class="input-group"> <span class="input-group-addon"></span>
                <input name="name" type="text" id="name"
                    class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                    value="{{ old('name') ?? $region->name}}" onfocusout="validateName()">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
                <span class="invalid-feedback" role="alert">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Comments</label>
            <textarea name="comment" rows="5" class="form-control" id="comment">{{ $region->comment}} </textarea>

        </div>
                <div class="form-group required">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
        </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group row m-0">
                        <label class="col-form-label col-lg-5">Name Of Zones</label>
                        <div class="col-lg-7">
                            <ol>
                                @foreach ($zones as $wor)
                                <li>{{ $wor->name}}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>


</div>
</div>


</form>
</div>

@endsection
