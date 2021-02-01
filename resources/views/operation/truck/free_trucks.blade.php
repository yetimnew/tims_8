@extends( 'master.app' )
@section( 'title', 'TIMS | Free Truck and Driver')
n
@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="breadcrumb breadcrumb-style ">

            <li class="breadcrumb-item"><a href="{{route('dasboard')}}"><i class="fa fa-home"></i>Home</a></li>
            <li class="breadcrumb-item"><a href="#">Reports</a></li>
            <li class="breadcrumb-item active">Free Driver and Truck</li>
        </ul>

    </div>
</div>

<div class="conteiner col-12">
    <div class="row">
        <div class="row col-6">
            <div class="card text-left ">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Free Trucks </h2>

                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Plate</th>
                                <th scope="col">Date Ditach</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($free_trucks as $key => $truck)
                            <tr>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{ $truck->plate}}</td>
                                <td> <span class="text-muted"> {{Carbon\Carbon::parse($truck->date_detach)->diffForHumans()}}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="row col-6">
            <div class="card text-left ">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Free Drivers </h2>

                    </div>
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date Ditach</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($free_drivers as $key => $truck)
                            <tr>
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{ $truck->name}}</td>
                                <td> <span class="text-muted"> {{Carbon\Carbon::parse($truck->date_detach)->diffForHumans()}}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')

@endsection
