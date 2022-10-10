<?php
/**
 * Created by PhpStorm.
 * User: softy
 * Date: 29/09/20
 * Time: 01:50
 */
?>
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i>Zoter</a>-->
            <a href="{{ url('/merchant/dashboard') }}" class="logo">
                <img src="{{ asset('images/backend_images/logo-lg.png') }}" alt="" class="logo-large">
            </a>
        </div>
    </div>

    <div class="sidebar-inner niceScrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>
                @if(Session::get('adminDetail')['admin'] == 1)
                 <li>
                        <a href="{{ url('/merchant/dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @endif
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Add Order </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/merchant/pickup') }}">Pickup</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ url('/merchant/view-order') }}" class="waves-effect"><i class="mdi mdi-cart"></i><span> View Order </span></a>
                </li>
                 @if(Session::get('adminDetail')['admin'] == 1)
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-multiple-plus"></i> <span> Merchants </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/merchant/view_merchant') }}">View Merchants</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-multiple-plus"></i> <span> Web settings </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/merchant/our-services') }}">Our Services</a></li>
                        <li><a href="{{ url('/merchant/about-us') }}">About Us</a></li>
                        <li><a href="{{ url('/merchant/setting/header') }}">Header</a></li>
                        <li><a href="{{ url('/merchant/setting/footer') }}">Footer</a></li>
                        <li><a href="{{ url('/merchant/our-services') }}">Subcriber</a></li>
                    </ul>
                </li>
                @endif

            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>