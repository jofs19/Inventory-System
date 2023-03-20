@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All User (Admin) </h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('admin.user.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="mdi mdi-account-plus"></i> Add Admin </a> <br>  <br>               

                    <h4 class="card-title">All User's Data </h4>
                    

                    <table id="datatable" class="table text-center table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th> 
                            <th>Username</th> 

                            <th>User's Image </th>
                            <th>Email</th>
                            <th>Phone</th> 
                            <th>Access</th> 

                            <th>Action</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($adminuser as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item->name }} </td> 
                            <td> {{ $item->username }} </td>
@if($item->id == 18)
<td> <img  src="http://127.0.0.1:8000/upload/admin_images/202301100216download.png" style="width:60px; height:60px"> </td> 
@else

           <td> <img src="{{ asset( $item->profile_image ) }}" style="width:60px; height:60px"> </td> 
           @endif
                              <td> {{ $item->email }} </td> 
                               <td> {{ $item->phone }} </td> 
                            <td> 
                               
                            @if($item->m_suppliers == 1)
                            <span class="badge bg-primary">Suppliers</span>
                            @else
                            @endif

                            @if($item->m_customers == 1)
                            <span class="badge bg-warning">Customers</span>
                            @else
                            @endif

                            @if($item->m_units == 1)
                            <span class="badge bg-success">Units</span>
                            @else
                            @endif

                            @if($item->m_categories == 1)
                            <span class="badge bg-danger">Categories</span>
                            @else
                            @endif

                            @if($item->m_products == 1)
                            <span class="badge bg-dark">Products</span>
                            @else
                            @endif

                            @if($item->m_purchases == 1)
                            <span class="badge badge-soft-warning">Purchases</span>
                            @else
                            @endif

                            @if($item->m_invoices == 1)
                            <span class="badge bg-info">Invoices</span>
                            @else
                            @endif

                            @if($item->m_stock == 1)
                            <span class="badge badge-soft-primary">Stocks</span>
                            @else
                            @endif

                            @if($item->m_access == 1)
                            <span class="badge badge-soft-dark">Admin Access</span>
                            @else
                            @endif
                          
                            </td> 

                            <td>
   <a href="{{ route('admin.user.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{ route('admin.user.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>
                           
                        </tr>
                        @endforeach
                        
                        </tbody>
                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection