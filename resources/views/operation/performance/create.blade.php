@extends( 'master.app' )
@section( 'title', 'TIMS | Performance Create' )
@section( 'content' )
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Performance</li>
        </ol>
    </div>
</header>
{{-- @include('master.error') --}}
{{-- @include('master.success') --}}
<div class="container">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex">
                <h2>Performance Registration</h2>
                <div class="ml-auto">
                    <a href="{{route('performance.index')}}" class="btn btn-outline-primary"> <i
                            class="fa fa-backward mr-1" aria-hidden="true"> Back</i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('performance.store')}}" id="performance_edit_form" novalidate>
                @csrf
                @include('operation.performance.form')

                <input name="created_by" type="hidden" id="created_by" value="{{ auth()->user()->id}}">
                <input name="updated_by" type="hidden" id="updated_by" value="{{ auth()->user()->id}}">

                <div class="form-group required">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>

                </div>

        </div>
    </div>

    {{-- end of card body --}}
</div>
<div class="card-footer">
    the footer
</div>


</form>
</div>
</div>

@endsection
@section( 'javascript' )
{{-- <script>
// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.origin_place').select2();
    });
</script> --}}
@endsection
