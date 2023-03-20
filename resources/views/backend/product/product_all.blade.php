@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">ALL ITEMS</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

    <a href="{{ route('product.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle"> Add Item </i></a> <br>  <br>               

                    <h4 class="card-title">All Item's Data </h4>
                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Item name</th> 
                            <th>Staff Name </th>
                            <th>Offices</th>
                            <th>Category</th> 
                            <th>Stock Requested</th>

                            <th>Action</th>
                            
                        </thead>


                        <tbody>
                        	 
                        	@foreach($product as $key => $item)
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

                            {{-- Display Stock --}}
                            <td>{{$item->stock}}</td>

                            <td>
   <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>

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