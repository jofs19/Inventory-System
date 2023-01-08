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
            <li class="breadcrumb-item"><a href="javascript: void(0);">JOFS</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

</div>
</div>
</div>
<!-- end page title -->

<div class="row">
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Total Product</p>
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
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Total Supplier</p>
                <h4 class="mb-2">{{ $totalSupplier }}</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                    <i class="mdi mdi-currency-usd font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">Total Customers</p>
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
<div class="col-xl-3 col-md-6">
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
</div><!-- end col -->
</div><!-- end row -->

<div class="row">
 
    {{-- LATEST PURCHASE --}}

    @php
    $purchase = App\Models\Purchase::orderBy('id','DESC')->limit(5)->get();
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

        <h4 class="card-title mb-4">Latest Purchase</h4>

        <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap text-center" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Sl</th>
                    <th>Purhase No</th> 
                    <th>Date </th>
                    <th>Supplier</th>
                    <th>Category</th> 
                    <th>Qty</th> 
                    <th>Product Name</th> 
                    <th>Status</th>
                    
                </thead>


                <tbody>
                     
                    @foreach($purchase as $key => $item)
    <tr>
        <td> {{ $key+1}} </td>
        <td> {{ $item->purchase_no }} </td> 
        <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
         <td> {{ $item['supplier']['name'] }} </td> 
         <td> {{ $item['category']['name'] }} </td> 
         <td> {{ $item->buying_qty }} </td> 
         <td> {{ $item['product']['name'] }} </td> 

         <td> 
            @if($item->status == '0')
            <span class="btn btn-warning">Pending</span>
            @elseif($item->status == '1')
            <span class="btn btn-success">Approved</span>
            @endif
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