<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                    <i class="bx bx-home-circle"></i><span class="badge rounded-pill bg-info float-end"></span>
                    <span key="t-dashboards">Dashboards</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/dashboard') }}" key="t-default">Admin Dashboard</a></li>
                        {{-- <li><a href="dashboard-saas.html" key="t-saas">Saas</a></li>
                        <li><a href="dashboard-crypto.html" key="t-crypto">Crypto</a></li>
                        <li><a href="dashboard-blog.html" key="t-blog">Blog</a></li> --}}
                    </ul>
                </li>
                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-layout"></i>
                    <span key="t-layouts">Layouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">Vertical</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-light-sidebar.html" key="t-light-sidebar">Light Sidebar</a></li>
                                <li><a href="layouts-compact-sidebar.html" key="t-compact-sidebar">Compact Sidebar</a></li>
                                <li><a href="layouts-icon-sidebar.html" key="t-icon-sidebar">Icon Sidebar</a></li>
                                <li><a href="layouts-boxed.html" key="t-boxed-width">Boxed Width</a></li>
                                <li><a href="layouts-preloader.html" key="t-preloader">Preloader</a></li>
                                <li><a href="layouts-colored-sidebar.html" key="t-colored-sidebar">Colored Sidebar</a></li>
                                <li><a href="layouts-scrollable.html" key="t-scrollable">Scrollable</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-horizontal">Horizontal</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal.html" key="t-horizontal">Horizontal</a></li>
                                <li><a href="layouts-hori-topbar-light.html" key="t-topbar-light">Topbar light</a></li>
                                <li><a href="layouts-hori-boxed-width.html" key="t-boxed-width">Boxed width</a></li>
                                <li><a href="layouts-hori-preloader.html" key="t-preloader">Preloader</a></li>
                                <li><a href="layouts-hori-colored-header.html" key="t-colored-topbar">Colored Header</a></li>
                                <li><a href="layouts-hori-scrollable.html" key="t-scrollable">Scrollable</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="menu-title" key="t-apps">Apps</li> --}}
                {{-- <li>
                    <a href="calendar.html" class="waves-effect">
                    <i class="bx bx-calendar"></i>
                    <span key="t-calendar">Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="chat.html" class="waves-effect">
                    <i class="bx bx-chat"></i>
                    <span key="t-chat">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="apps-filemanager.html" class="waves-effect">
                    <i class="bx bx-file"></i>
                    <span class="badge rounded-pill bg-success float-end" key="t-new">New</span>
                    <span key="t-file-manager">File Manager</span>
                    </a>
                </li>--}}

                @if (Auth::guard('admin')->user()->type == "seller")
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Seller Details</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/update_sellers_details/personal') }}" key="t-personaldetails">Personal Details</a></li>
                        <li><a href="{{ url('admin/update_sellers_details/business') }}" key="t-businessdetails">Business Detail</a></li>
                        <li><a href="{{ url('admin/update_sellers_details/bank') }}" key="t-bankdetails">Bank Detail</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/update-admin-password') }}" key="t-updatepassword">Update Password</a></li>
                        <li><a href="{{ route('admin/update-admin-details') }}" key="t-updatedetail">Update Detail</a></li>

                    </ul>
                </li>

                @else
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Admin Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/admins/admin') }}" key="t-admin">Admins</a></li>
                        <li><a href="{{ url('admin/admins/seller') }}" key="t-seller">Seller</a></li>
                        <li><a href="{{ url('admin/admins/') }}" key="t-all">All</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">User Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('admin/users') }}" key="t-updatepassword">User</a></li>
                        {{-- <li><a href="{{ route('admin/admins/subscriber') }}" key="t-updatedetail">Subscribers</a></li> --}}

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Catalogue Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/sections') }}" key="t-section">Section</a></li>
                        <li><a href="{{ route('admin/categories') }}" key="t-category">Category</a></li>
                        <li><a href="{{ url('admin/brands') }}" key="t-brands">Brands</a></li>
                        <li><a href="{{ url('admin/products') }}" key="t-section">Product</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-wrench font-size-16 align-middle me-1"></i>
                    <span key="t-ecommerce">Banner Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/banners') }}" key="t-section">Banners</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog font-size-16 align-middle me-1"></i>
                        {{-- <i class="bx bx-cog bx-spin align-middle me-1"></i> --}}
                    <span key="t-ecommerce">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin/update-admin-password') }}" key="t-updatepassword">Update Password</a></li>
                        <li><a href="{{ route('admin/update-admin-details') }}" key="t-updatedetail">Update Detail</a></li>

                    </ul>
                </li>

                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
