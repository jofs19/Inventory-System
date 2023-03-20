@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Add Admin Page </h4><br><br>
            
  

    <form method="post" action="{{ route('admin.user.store') }}" id="myForm" enctype="multipart/form-data" >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Name </label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text" required>
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Username </label>
                <div class="form-group col-sm-10">
                    <input name="username" class="form-control" type="text" required>
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Mobile # </label>
                <div class="form-group col-sm-10">
                    <input name="phone" class="form-control" type="text" required>
                </div>
            </div>
            <!-- end row -->


  <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Email </label>
                <div class="form-group col-sm-10">
                    <input name="email" class="form-control" type="email" required>
                </div>
            </div>
            <!-- end row -->


  <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Password </label>
                <div class="form-group col-sm-10">
                    <input name="password" class="form-control" type="text" required>
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Image </label>
                <div class="form-group col-sm-10">
       <input name="profile_image" class="form-control" type="file"  id="image" required>
                </div>
            </div>
            <!-- end row -->

              <div class="row mb-3">
                 <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                <div class="col-sm-10">
   <img id="showImage" class="rounded avatar-lg" src="{{  url('upload/no_image.jpg') }}" alt="Card image cap">
                </div>
            </div>
            <!-- end row -->

            <hr>


            <h4 class="card-title">Admin Access Control </h4> <br>


            	<div class="row my-2 py-2">

<div class="col-md-4 ">
			<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_2" name="m_suppliers" value="1" >
				<label for="checkbox_2">Manage Staffs</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_3" name="m_customers" value="1" >
				<label for="checkbox_3">Manage Employees</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_4" name="m_units" value="1" >
				<label for="checkbox_4">Manage Units</label>
			</fieldset>

		</div>
	</div>
</div>



<div class="col-md-4">
			<div class="form-group">

		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_7" name="m_categories" value="1" >
				<label for="checkbox_7">Manage Categories</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_8" name="m_products" value="1" >
				<label for="checkbox_8">Manage Products</label>
			</fieldset>

			{{-- <fieldset>
				<input type="checkbox" id="checkbox_9" name="m_purchases" value="1" >
				<label for="checkbox_9">Manage Purchases</label>
			</fieldset> --}}


		</div>
	</div>
</div>




<div class="col-md-4">
	<div class="form-group">

		<div class="controls">
			{{-- <fieldset>
				<input type="checkbox" id="checkbox_12" name="m_invoices" value="1" >
				<label for="checkbox_12">Manage Invoices</label>
			</fieldset> --}}
			<fieldset>
				<input type="checkbox" id="checkbox_13" name="m_stocks" value="1" >
				<label for="checkbox_13">Manage Stocks</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_14" name="m_access" value="1" >
				<label for="checkbox_14">Manage Admin Access Control</label>
			</fieldset>

		</div>
			</div>
		</div>
						</div>
 
 

<br>
        
<input type="submit" class="btn btn-info waves-effect waves-light" value="Add Admin">
<a href="{{ route('admin.user.all') }}" class="btn btn-danger waves-effect waves-light"> Cancel</a>

            </form>
             
           
           
        </div>
    </div>
</div> <!-- end col -->
</div>
 


</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 mobile_no: {
                    required : true,
                },
                 email: {
                    required : true,
                },
                 address: {
                    required : true,
                },
                 customer_image: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Name',
                },
                mobile_no: {
                    required : 'Please Enter Your Mobile Number',
                },
                email: {
                    required : 'Please Enter Your Email',
                },
                address: {
                    required : 'Please Enter Your Address',
                },
                 customer_image: {
                    required : 'Please Select one Image',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>


 
@endsection 
