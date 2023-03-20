 
{{-- Identify which user was login --}}

@php
    $user = Auth::user();
    $id = $user->id;
    $adminData = App\Models\User::find($id);

    $m_suppliers = $adminData->m_suppliers == 1;
    $m_customers = $adminData->m_customers == 1;
    $m_units = $adminData->m_units == 1;
    $m_categories = $adminData->m_categories == 1;
    $m_products = $adminData->m_products == 1;
    $m_purchases = $adminData->m_purchases == 1;
    $m_invoices = $adminData->m_invoices == 1;
    $m_stocks = $adminData->m_stocks == 1;
    $m_access = $adminData->m_access == 1;
@endphp
 
 
 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->

                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{ asset('backend/assets/images/Pangasinan_State_University_logo.webp
                            ') }}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">Pangasinan State University</h4>
                            <span class="text-muted font-size-13">Inventory Management System</span>
                        </div>
                    </div>
                

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ url('/dashboard') }}" class="waves-effect">
                                    <i class="ri-home-fill"></i> 
                                    <span>Dashboard</span>
                                </a>
                            </li>
 
        @if ($m_suppliers)

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-shield-user-fill"></i>
                <span>Manage Staff</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('supplier.all') }}">All Staffs</a></li>
               
            </ul>
        </li>

        @else
        @endif


        @if ($m_customers)
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-team-fill"></i>
                <span>Manage Requestors</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('customer.all') }}">All Requestors</a></li>
                 <li><a href="{{ route('credit.customer') }}">Credit Requestors</a></li>

                 <li><a href="{{ route('paid.customer') }}">Paid Requestors</a></li>
                  <li><a href="{{ route('customer.wise.report') }}">Requestors Wise Report</a></li>
               
            </ul>
        </li>
        @else
            
        @endif





        @if ($m_units)
         <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-building-fill"></i>
                <span>Manage Offices</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('unit.all') }}">All Offices</a></li>
               
            </ul>
        </li>

         <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-apps-2-fill"></i>
                <span>Manage Category</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('category.all') }}">All Categories</a></li>
               
            </ul>
        </li>

        @else
        @endif


        @if ($m_products)
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-reserved-fill"></i>
                <span>Manage Items</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('product.all') }}">All Items</a></li>
               
            </ul>
        </li>

        @else
        @endif


        @if ($m_purchases)
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-oil-fill"></i>
                <span>Manage Purchase</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('purchase.all') }}">All Purchase</a></li>
                <li><a href="{{ route('purchase.pending') }}">Purchase Approval</a></li>
                <li><a href="{{ route('daily.purchase.report') }}">Daily Purchase Report</a></li>
               
            </ul>
        </li>

        @else
        @endif


        @if ($m_invoices)
          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-compass-2-fill"></i>
                <span>Manage Invoice</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('invoice.all') }}">All Invoice</a></li>
                <li><a href="{{ route('invoice.pending.list') }}">Invoice Approval</a></li>
                <li><a href="{{ route('print.invoice.list') }}">Print Invoice List</a></li>
                  <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>
               
            </ul>
        </li>

        @else
        @endif

                             






    @if ($m_stocks)
        
    
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-stack-fill"></i>
            <span>Manage Stock</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('stock.report') }}">Requestor Stock Report</a></li>
            {{-- <li><a href="{{ route('stock.supplier.wise') }}">Staff / Product Wise </a></li> --}}
            
        </ul>
    </li>

    @else
    @endif

    <li class="menu-title">Others</li>


    @if ($m_access)
        
    
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="mdi mdi-account-key"></i>
            <span>User Access Control</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('admin.user.all') }}">Privilize User (Admin)</a></li>

        </ul>
    </li>

    @else
    @endif

                            {{-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Support</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li> --}}

                           

                            
                         

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>