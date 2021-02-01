@extends( 'master.app' )

@section( 'title', 'TIMS | Edit ' .  $truck_model->name )
@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item "><a href="#">Truks</a>
            </li>
            <li class="breadcrumb-item active">Truks Model</li>
        </ol>
    </div>

  </header>

<div class="container">
    <div class="card ">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <h2>Truck Model Update <span class="text-violet">{{ $truck_model->name}}</span> </h2>
                <div class="ml-auto">
                    <a href="{{route('truck_model.index')}}" class="btn btn-outline-primary"><i
                            class="fa fa-caret-left mr-1"></i>Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('truck_model.update',$truck_model->id)}}"  method="post"
                class="form-horizontal" id="truck_form" >
                @method('PATCH')
                @csrf
                        <div class="form-group required pb-0">
                            <label class="control-label">Type/Model Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"></span>
                                <input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required
                                    value="{{$truck_model->name}}">

                            @if ($errors->has('name'))
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            <span class="invalid-feedback" role="alert"></span>
                        </div>
                        </div>

                        <div class="form-group pb-0">
                            <label class="control-label">Company</label>
                            <div class="input-group"> <span class="input-group-addon"></span>
                                <input name="company" type="text"  class="form-control {{ $errors->has('company') ? ' is-invalid' : '' }}"  id="company"
                                    value="{{$truck_model->company}}">
                                    @if($errors->has('company'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                    @endif
                            </div>

                        </div>
                        <div class="form-group pb-0">
                            <label class="control-label" for="production_date">Production Date</label>
                            <div class="input-group"> <span class="input-group-addon"></span>
                                <input name="production_date" type="date"  class="form-control {{ $errors->has('production_date') ? ' is-invalid' : '' }}"  id="production_date"
                                    value="{{$truck_model->production_date}}">
                                    @if($errors->has('production_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('production_date') }}</strong>
                                    </span>
                                    @endif
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea class="form-control" name="comment" id="comment"
                                rows="3">{{$truck_model->comment}}</textarea>
                        </div>
                        <span class="help-block"></span>

                        <div class="form-group pb-0 text-right">
                            <input type="submit" class="btn btn-primary btn-lg" name="save" id="mangeBtn" value="Save">
                        </div>
                        <!--                                          the right side begins here-->


        </div>
        <div class="card-footer">
            the footer
        </div>

        </form>
    </div>

</div>



@endsection
