@extends( 'master.app' )
@section( 'title', 'TIMS | Driver' )

@section('content')

<header class="page-header">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
    </div>
</header>
<section class="dashboard-counts no-padding-bottom">
    <div class="container">
        <div class="row bg-white has-shadow">
            <div class="col-md-12">
                <div class="card text-left col-md-12">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4>All promotions</h4>
                            {{-- @can('customer create') --}}

                            <div class="ml-auto">
                                <a href="{{route('promotion.create')}}" class="btn btn-outline-primary btn-sm"><i
                                        class="fas fa-plus mr-1"></i>Add promotion</a>

                            </div>
                            {{-- @endcan --}}
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table-sm table table-bordered table-sm table-striped" id="personales">
                                <thead>
                                    <tr>
                                        <th class="m-1 b-1" width="3%">No</th>
                                        <th class="m-1 b-1">personale_id</th>
                                        <th class="m-1 b-1"> department_id</th>
                                        <th class="m-1 b-1"> jobtitle_id</th>
                                        <th class="m-1 b-1"> pay_grade_id</th>
                                        <th class="m-1 b-1"> pay_grade_level_id</th>
                                        <th class="m-1 b-1"> start_date</th>
                                        <th class="m-1 b-1"> comment</th>
                                        <th class="m-1 b-1"> status</th>
                                        <th class="m-1 b-1" width="3%">Edit</th>
                                        <th class="m-1 b-1" width="3%">Delete</th>
                                        {{-- @endcan --}}


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0 ?>
                                    @if ($promotions->count()> 0)
                                    @foreach ($promotions as $promotion)
                                    <tr>
                                        <input type="hidden" class="deleted_value_id" value="{{$promotion->id}}">
                                        <td class='p-1'>{{++$no}}</td>
                                        <td class='p-1'>{{$promotion->personal->fullName}}</td>
                                        <td class='p-1'>{{$promotion->department->name}}</td>
                                        <td class='p-1'>{{$promotion->jobtitle->name}}</td>
                                        <td class='p-1'>{{$promotion->paygrade->name}}</td>
                                        <td class='p-1'>{{$promotion->paygradelevel->name}}</td>
                                        <td class='p-1'>{{$promotion->start_date}}</td>
                                        <td class='p-1'>{{$promotion->comment}}</td>
                                        @if ($promotion->status == 0)

                                        <td class='p-1'>Old</td>
                                        @else
                                        <td class='p-1'>New</td>
                                        @endif
                                        {{-- @can('driver edit') --}}
                                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top"
                                            title="edit">
                                            <a href="{{route('promotion.edit', $promotion->id)}}"><i
                                                    class="fas fa-edit"></i></a>
                                        </td>
                                        <td class='p-1 text-center' data-toggle="tooltip" data-placement="top"
                                            title="delete">
                                            <button id="delete_promotion" class="delete_promotion red"> <i
                                                    class="fas fa-trash" aria-hidden="true"></i></button>
                                        </td>
                                        {{-- @endcan --}}
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td class='m-1 p-1 text-center' colspan="15">No Data Avilable</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->

@endsection
@section('scripts')
<script type="application/javascript">
    $( document ).ready( function () {
                $( '#personales' ).DataTable();
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

            $('.delete_promotion').click(function (e) {

    e.preventDefault();
    var deleted_id = $(this).closest("tr").find('.deleted_value_id').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                var data = {
                    "_token": "{{ csrf_token() }}",
                    "id": deleted_id
                }
                var urlPath = '/hrm/promotion/'+ deleted_id;
                // alert(urlPath);

                $.ajax({
                    type: "DELETE",
                    url:  urlPath,
                    data: data,
                    dataType: "JSON",
                    success: function (response) {
                        // swal("Your imaginary file is safe!");
                        console.log(response.success);
                        swal(response.success, {
                        icon: 'success',
                        }).then((result)=>{
                            location.reload();
                        });
                    },
                    error:function(){
                        swal("Your imaginary file is safe!");
                    }
                });

            }
            });

            });
            } );


</script>

@endsection