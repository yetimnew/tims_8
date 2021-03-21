@extends( 'master.app' )
@section( 'title', 'TIMS | Customer' )
@section('content')
<header class="page-header mb-4">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a>
            </li>
            <li class="breadcrumb-item active">Customer</li>
        </ol>
    </div>
</header>

<div class="conteiner">
    <div class="card text-left">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h2>All Customers </h2>
                {{-- @can('customer create') --}}

                <div class="ml-auto">
                    <a href="{{route('customer.create')}}" class="btn btn-outline-primary"> <i class="fafa-plus"></i>
                        Add Customer</a>
                </div>
                {{-- @endcan --}}
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered table-sm table-striped" id="customer">
                    <thead>
                        <tr>
                            <th width="3%">Number</th>
                            <th class="text-center">Customer Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Office No</th>
                            <th class="text-center">Mobile </th>
                            <th class="text-center">Remark</th>
                            {{-- @can('customer edit') --}}
                            <th width="5%">Edit</th>
                            {{-- @endcan
							@can('customer delete') --}}
                            <th width="5%">Delete</th>
                            {{-- @endcan --}}

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0 ?>
                        @forelse ($customers as $customer)
                        <tr>
                            <td>{{++$no}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->office_number}}</td>
                            <td>{{$customer->mobile}}</td>
                            <td>{{$customer->remark}}</td>
                            {{-- @can('customer edit') --}}
                            <td class='m-1 p-1 text-center'><a href="{{route('customer.edit', $customer->id)}}">
                                    <i class="fa fa-edit "></i> </a>
                            </td>
                            {{-- @endcan
							@can('customer delete') --}}
                            <td class='m-1 p-1 text-center '>
                                <form action="{{route('customer.destroy', $customer->id)}}"
                                    id="delete-form-{{$customer->id}}" style="display: none" method="POST">
                                    @csrf

                                    @method('DELETE')
                                </form>

                                <button type="submit" onclick="if(confirm('Are you sure to delete this?')){
									event.preventDefault();
									document.getElementById('delete-form-{{$customer->id}}').submit();
								}else{
								event.preventDefault();
								}"> <i class="fa fa-trash red"></i>
                                </button>
                            </td>
                            {{-- @endcan --}}

                        </tr>
                        @empty
                        <tr>
                            <td class='m-1 p-1 text-center' colspan="4">No Data Avilable</td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
    $(document).ready( function () {
				$('#customer').DataTable();
			} );
</script>
@endsection
