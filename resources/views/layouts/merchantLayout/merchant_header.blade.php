<?php
/**
 * Created by PhpStorm.
 * User: softy
 * Date: 29/09/20
 * Time: 01:49
 */
?>
<div class="topbar">

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <!-- language-->
            
            <li class="list-inline-item dropdown notification-list hide-phone">
                <a class="nav-link dropdown-toggle arrow-none waves-effect text-white" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('images/backend_images/flags/us_flag.jpg') }}" class="ml-2" height="16" alt=""/>
                </a>
                <div class="dropdown-menu dropdown-menu-right language-switch">
                    <a class="dropdown-item" href="#"><img src="{{ asset('images/backend_images/flags/italy_flag.jpg') }}" alt="" height="16"/><span> Italian </span></a>
                    <a class="dropdown-item" href="#"><img src="{{ asset('images/backend_images/flags/french_flag.jpg') }}" alt="" height="16"/><span> French </span></a>
                    <a class="dropdown-item" href="#"><img src="{{ asset('images/backend_images/flags/spain_flag.jpg') }}" alt="" height="16"/><span> Spanish </span></a>
                    <a class="dropdown-item" href="#"><img src="{{ asset('images/backend_images/flags/russia_flag.jpg') }}" alt="" height="16"/><span> Russian </span></a>
                </div>
            </li>
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="ti-user noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" href="{{ url('/merchant/view_profile') }}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                    <a class="dropdown-item" href="{{ url('/merchant/settings') }}"><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/logout') }}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>

        <div class="clearfix"></div>

    </nav>

</div>