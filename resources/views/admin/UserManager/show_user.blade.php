@extends('layout.admin.master')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content" style="min-height:852px">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
            <div class="theme-panel hidden-xs hidden-sm">
                <div class="toggler"> </div>
                <div class="toggler-close"> </div>
                <div class="theme-options">
                    <div class="theme-option theme-colors clearfix">
                        <span> THEME COLOR </span>
                        <ul>
                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
                        </ul>
                    </div>
                    <div class="theme-option">
                        <span> Theme Style </span>
                        <select class="layout-style-option form-control input-sm">
                            <option value="square" selected="selected">Square corners</option>
                            <option value="rounded">Rounded corners</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Layout </span>
                        <select class="layout-option form-control input-sm">
                            <option value="fluid" selected="selected">Fluid</option>
                            <option value="boxed">Boxed</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Header </span>
                        <select class="page-header-option form-control input-sm">
                            <option value="fixed" selected="selected">Fixed</option>
                            <option value="default">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Top Menu Dropdown</span>
                        <select class="page-header-top-dropdown-style-option form-control input-sm">
                            <option value="light" selected="selected">Light</option>
                            <option value="dark">Dark</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Mode</span>
                        <select class="sidebar-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Menu </span>
                        <select class="sidebar-menu-option form-control input-sm">
                            <option value="accordion" selected="selected">Accordion</option>
                            <option value="hover">Hover</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Style </span>
                        <select class="sidebar-style-option form-control input-sm">
                            <option value="default" selected="selected">Default</option>
                            <option value="light">Light</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Sidebar Position </span>
                        <select class="sidebar-pos-option form-control input-sm">
                            <option value="left" selected="selected">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                    <div class="theme-option">
                        <span> Footer </span>
                        <select class="page-footer-option form-control input-sm">
                            <option value="fixed">Fixed</option>
                            <option value="default" selected="selected">Default</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Dashboard</span>
                    </li>
                </ul>
                <div class="page-toolbar">
                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>&nbsp;
                        <span class="thin uppercase hidden-xs">{{ Carbon\Carbon::now() }}</span>&nbsp;
                        <i class="fa fa-angle-down"></i>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> {{ $user->name }} - {{ $user->email }}
                <small>dashboard &amp; statistics</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD Analytic dashboard -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{ $movieToday }}">{{ $movieToday }}</span>
                            </div>
                            <div class="desc"> Total New Movies Today</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{ $episodeToday }}">{{ $episodeToday }}-{{ $allEpisode }}</span>
                            </div>
                            <div class="desc"> Episode Added Today</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="{{ $movieAll }}">{{ $movieAll }}</span>
                            </div>
                            <div class="desc"> Total Movie Added</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                        <div class="visual">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="1500">{{ $linkDieFixed }}</span>
                            </div>
                            <div class="desc"> Total Movie Edited Today</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
            <!-- Date time -->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <div class="input-group date" id="datetimepicker1">
                            <input type="text" class="form-control">
                            <span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Date time -->
            <!-- Begin detail user -->
            <div class="row">
                <!-- Detail User Today -->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value=""></span>
                            </div>
                            <div class="desc"> User 1 </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="89">89</span>
                            </div>
                            <div class="desc"> Total New Movies Today </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                        <div class="visual">
                            <i class="fa fa-globe"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="89">89</span>
                            </div>
                            <div class="desc"> Total Link Die Fixed Today </div>
                        </div>
                    </a>
                </div>
                <!-- End Detail User Today -->
            </div>
        </div>
        <!-- End -->
        <!-- END CONTENT BODY -->
    </div>

@endsection
@section('pageScript')
@endsection