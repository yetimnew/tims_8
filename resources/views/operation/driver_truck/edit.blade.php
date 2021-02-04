@extends( 'master.app' )
@section( 'title', 'TIMS | Driver Truck Edit ' )

@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Driver And Truck Edit</li>
        </ol>
    </div>
  </header>

<div class="col-md-12">
    @include('master.error') {{-- @include('master.success') --}}
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>Driver Truck Edit</h2>
                <div class="ml-auto">
                    <a href="{{route('driver_truck.index')}}" class="btn btn-outline-primary">
                        <i class="fa fa-caret-left mr-1" aria-hidden="true"></i>Back</a>


                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('driver_truck.update',$dts->id)}}" class="form-horizontal"
                id="truck_form">
                @csrf
                @method('PATCH')
                        <div class="form-group required">
                            <label class="control-label">Plate Number</label>
                            <select name="plate" class="form-control select" id="plate" required>
                                <option class="dropup" value="{{$dts->truck_id}}" selected> {{$dts->plate}} </option>
                                @foreach ($trucks as $truck)
                                <option class="dropup" value="{{$truck->id}}}"> {{$truck->plate}}
                                </option>
                                @endforeach

                            </select>
                            <small class="form-text text-danger" id="error_region"></small>
                        </div>
                        <div class="form-group required">
                            <label class="control-label">Driver Name</label>
                            <select name="dname" class="form-control select" id="dname" required>
                                <option class="dropup" value="{{$dts->driver_id}}" selected>
                                    {{$dts->NAME}}
                                </option>
                                {{-- {{dd($drivers)}} --}}
                                @foreach ($drivers as $driver)
                                <option class="dropup" value="{{$driver->id}} ">{{ $driver->name}}
                                </option>
                                @endforeach
                            </select>

                            <small class="form-text text-danger" id="error_region"></small>
                        </div>

                        <div class="form-group required">
                            <label class="control-label">Recived Date</label>

                            <div class="input-group"> <span class="input-group-addon"></span>
                                <input name="rdate" type="date" required class="form-control" id="rdate"
                                    value="{{ $dts->date_received }}">
                            </div>

                        </div>
                        @if ($dts->is_attached == 0)
                        <div class="form-group required">
                            <label class="control-label" for="ddate">Detach Date</label>

                            <div class="input-group"> <span class="input-group-addon"></span>
                                <input name="ddate" type="date" required class="form-control" id="ddate"
                                    value="{{ $dts->date_detach }}">
                            </div>

                        </div>
                        <div class="form-group required">
                            <label class="control-label">Reson for detach</label>
                            <textarea name="comment" rows="5"
                                class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                                id="comment">{{ $dts->reason}}</textarea>
                        </div>
                        @endif
                        <div class="form-group required">
                            <button type="submit" class="btn btn-primary" name="save">Update</button>

                        </div>

                    </form>
                    </div>


                </div>
        </div>



@endsection
