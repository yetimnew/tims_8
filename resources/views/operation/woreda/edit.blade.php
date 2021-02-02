@extends( 'master.app' )
@section( 'title', 'TIMS | Woreda Update' )
@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Operations</a>
            </li>
            <li class="breadcrumb-item active">Woreda Update</li>
        </ol>
    </div>
  </header>
<div class=container">
    @include('master.error') {{-- @include('master.success') --}}
    <div class="card text-left">
        <div class="card-header">
            <h2>Woreda Registration</h2>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('woreda.update',$woreda->id)}}" class="form-horizontal"
                id="woreda_reg">
                @csrf
                @method('PATCH')
                @include('operation.woreda.form')
                <div class="form-group required">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
        </div>
    </div>

    </form>
    <div class="card-footer">
        the footer
    </div>
</div>


@endsection
