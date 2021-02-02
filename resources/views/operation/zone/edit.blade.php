@extends( 'master.app' )
@section( 'title', 'TIMS | Zone Update' )

@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Operations</a>
            </li>
            <li class="breadcrumb-item active">Zone Update</li>
        </ol>
    </div>
  </header>

<div class="container">
    @include('master.error') {{-- @include('master.success') --}}
    <div class="card text-left">
        <div class="card-header">
            <h2>Zone Registration</h2>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('zone.update',$zone->id)}}" class="form-horizontal"
                id="zone_reg">
                @csrf
                @method('PATCH')
                @include('operation.zone.form')

                <div class="form-group required">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>

        </div>
    </div>

    </form>

</div>


@endsection
