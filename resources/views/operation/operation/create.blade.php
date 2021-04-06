@extends( 'master.app' )
@section( 'title', 'TIMS | Operation Create ' )
@section( 'content' )

<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Operation</li>
        </ol>
    </div>
</header>

<div class="container">
    {{-- @include('master.error') --}}
    {{-- @include('master.success') --}}
    <div class="card text-left">
        <div class="card-header">
            <h2>Operation Registration</h2>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('operation.store')}}" class="form-horizontal" id="operation_reg_form"
                novalidate>
                @csrf
                @include('operation.operation.form')
                <input name="created_by" type="hidden" id="created_by" value="{{ auth()->user()->id}}">
                <input name="updated_by" type="hidden" id="updated_by" value="{{ auth()->user()->id}}">
                <div class="form-group required pull-right">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>

        </div>

    </div>
</div>
{{-- {{dd($errors)}} --}}
<div class="card-footer">
    the footer
</div>

</form>
</div>
</div>

@endsection

@section( 'javascript' )
@endsection
