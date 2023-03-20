@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Purchase </h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('purchase.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Purchase </i></a> <br>  <br>               

                    <h4 class="card-title">Purchase All Data </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Purhase No</th> 
                            <th>Date </th>
                            <th>Staff</th>
                            <th>Category</th> 
                            <th>Qty</th> 
                            <th>Item Name</th> 
                            <th>Status</th>
                            <th>Action</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($allData as $key => $item)
            <tr>
                <td> {{ $key+1}} </td>
                <td> {{ $item->purchase_no }} </td> 
                <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
                @if(isset($item['supplier']['name']))

                 <td> {{ $item['supplier']['name'] }} </td> 

                @else 
                <td> N/A </td>

                @endif

                @if(isset($item['category']['name']))
                 <td> {{ $item['category']['name'] }} </td> 
                @else 
                <td> N/A </td>
                @endif
                 <td> {{ $item->buying_qty }} </td> 

                 @if(isset($item['product']['name']))
                 <td> {{ $item['product']['name'] }} </td> 

                 @else
                 <td>N/A</td>

                 @endif
                 <td> 
                    @if($item->status == '0')
                    <span class="btn btn-warning">Pending</span>
                    @elseif($item->status == '1')
                    <span class="btn btn-success">Approved</span>
                    @endif
                     </td> 

                <td> 
@if($item->status == '0')
<a href="{{ route('purchase.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
@endif
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