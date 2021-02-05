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
                            <label class="control-label" for="truck_id">truck_id Number</label>
                            <select name="truck_id" class="form-control select" id="truck_id" required>
                                <option class="dropup" value="{{$dts->truck_id}}" selected> {{$dts->plate}} </option>
                                @foreach ($trucks as $truck)
                                <option class="dropup" value="{{$truck->id}}}"> {{$truck->plate}}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('truck_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('truck_id') }}</strong>
							</span>
							@endif
                        </div>
                        <div class="form-group required">
                            <label class="control-label" for="driver_id">Driver Name</label>
                            <select name="driver_id" class="form-control select" id="driver_id" required>
                                <option class="dropup" value="{{$dts->driver_id}}" selected>
                                    {{$dts->NAME}}
                                </option>
                                {{-- {{dd($drivers)}} --}}
                                @foreach ($drivers as $driver)
                                <option class="dropup" value="{{$driver->id}} ">{{ $driver->name}}
                                </option>
                                @endforeach
                            </select>

                            @if ($errors->has('driver_id'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('driver_id') }}</strong>
							</span>
							@endif
                        </div>

                        <div class="form-group required">
                            <label class="control-label" for="recieve_date">Recived Date</label>

                            <div class="input-group">
                                <input name="recieve_date" type="date" required class="form-control" id="recieve_date"
                                    value="{{ $dts->date_received }}">
                            </div>
                        </div>
                        @if ($dts->is_attached == 0)
                        <div class="form-group required">
                            <label class="control-label" for="date_detach">Detach Date</label>

                            <div class="input-group"> <span class="input-group-addon"></span>
                                <input name="date_detach" type="date" required class="form-control" id="date_detach"
                                    value="{{ $dts->date_detach }}">
                            </div>

                        </div>
                        <div class="form-group required">
                            <label class="control-label" for="comment">Reson for detach</label>
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
