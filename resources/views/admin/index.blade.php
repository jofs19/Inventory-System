@extends('admin.admin_master')
@section('admin')

{{-- DASHBOARD CONTENT --}}
@php
    // Dashboard Content
    $totalProduct = App\Models\Product::count();
    $totalSupplier = App\Models\Supplier::count();
    $totalStock = App\Models\Product::sum('quantity');
    $totalSell = App\Models\InvoiceDetail::sum('selling_qty');
    $totalInvoice = App\Models\Invoice::count();
    $totalCustomer = App\Models\Customer::count();

    // Products Content
    $totalProduct = App\Models\Product::count();
    $totalSupplier = App\Models\Supplier::count();
    $totalStock = App\Models\Product::sum('quantity');
    $totalSell = App\Models\InvoiceDetail::sum('selling_qty');
    $totalInvoice = App\Models\Invoice::count();
    $totalCustomer = App\Models\Customer::count();
    


    
    

@endphp


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Dashboard</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ Auth::user()->username }}</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

</div>
</div>
</div>
<!-- end page title -->

<div class="row">
<div class="col-xl-4 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Total Item</p>
                <h4 class="mb-2">{{ $totalProduct }}</h4>
                {{-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i></span>from previous period</p> --}}
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-primary rounded-3">
                    <i class="ri-shopping-cart-2-line font-size-24"></i>  
                </span>
            </div>
        </div>                                            
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-4 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Total Staff</p>
                <h4 class="mb-2">{{ $totalSupplier }}</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                    <i class="ri-user-3-line font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-4 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Total Requestors</p>
                <h4 class="mb-2">{{ $totalCustomer }}</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-primary rounded-3">
                    <i class="ri-user-3-line font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
{{-- <div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Total Sell</p>
                <h4 class="mb-2">{{ $totalSell }}</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                    <i class="mdi mdi-currency-btc font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col --> --}}
</div><!-- end row -->

<div class="row">
 
    {{-- LATEST PURCHASE --}}

    @php
    $purchase = App\Models\Purchase::orderBy('id','DESC')->limit(5)->get();
    // product
        $products =  App\Models\Product::latest()->get();
    @endphp

    

<div class="row">
<div class="col-xl-12">
<div class="card">
    <div class="card-body">
        <div class="dropdown float-end">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
         
        </div>

        <h4 class="card-title mb-4">List of Items</h4>

        <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Item name</th> 
                    <th>Staff name </th>
                    <th>Offices</th>
                    <th>Category</th> 
                    <th>Action</th>
                    
                </thead>


                <tbody>
                     
                    @foreach($products as $key => $item)
                <tr>
                    <td> {{ $key+1}} </td>
                    <td> {{ $item->name }} </td> 
                    @if(isset($item['supplier']['name']))

                    <td> {{ $item['supplier']['name'] }} </td> 

                    @else
                    <td> N/A </td>

                    @endif

                    @if(isset($item['unit']['name']))

                    
                    <td> {{ $item['unit']['name'] }} </td> 

                    @else
                    <td> N/A </td>

                    @endif

                    @if(isset($item['category']['name']))

                    <td> {{ $item['category']['name'] }} </td> 

                    @else

                    <td> N/A </td>

                    @endif
                    <td>
<a href="{{ route('product.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

<a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                    </td>
                   
                </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div><!-- end card -->
</div><!-- end card -->
</div>
<!-- end col -->
 


</div>
<!-- end row --> 
</div>

</div>

@endsection