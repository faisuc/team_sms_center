@extends('layouts.master')

@section('content')

	<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SKILL TEST</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('route.user.profile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li><a href="{{ route('route.auth.logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        @if ($isAdmin)
                            <li>
                                <a href="{{ route('route.home') }}"><i class="fa fa-dashboard fa-fw"></i> User Management</a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('route.phonebook') }}"><i class="fa fa-dashboard fa-fw"></i> Phonebook</a>
                        </li>
                        <li>
                            <a href="{{ route('route.sms') }}"><i class="fa fa-dashboard fa-fw"></i> SMS</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('dashboard_title')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            @yield('home_content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

@stop