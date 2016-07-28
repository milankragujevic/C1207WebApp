@extends('layout.admin.master')
@section('title','Movie')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Movie.LinkDie</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Link Die
                <small>List</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                        <div class="visual">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div class="details">
                            <div class="number">
                                <span data-counter="counterup" data-value="1349">{{ $count }}</span>
                            </div>
                            <div class="desc"> Link Die </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-social-dribbble font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Link Die List</span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-cloud-upload"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="#">
                                    <i class="icon-wrench"></i>
                                </a>
                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                    <i class="icon-trash"></i>
                                </a>
                            </div>
                        </div>
                        <a class="btn btn-success" role="button" href="{{ url('admin/linkdie?unfix=1') }}">Only Broken Link</a>
                        <a class="btn btn-success" role="button" href="{{ url('admin/linkdie?check=1') }}">Manually Check</a>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Movie Name/Episode Name </th>
                                        <th> Google Code </th>
                                        <th> Unavailable Date </th>
                                        <th> Status </th>
                                        <th> Function </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($movieLink as $link)
                                        <tr>
                                            <td> {{ $link->id }} </td>
                                            @if(isset($link->linkable->season))
                                            <td> {{ $link->linkable->name }} <span class="label label-warning">{{ $link->linkable->movie->name }}</span></td>
                                            @elseif(isset($link->linkable))
                                                @if($link->linkable->type==='movie')
                                                <td> {{ $link->linkable->name }}</td>
                                                    @endif
                                                @endif
                                            <td> {{ $link->link  }} </td>
                                            <td> {{ $link->updated_at }} <span class="label label-info">{{ $link->status }}</span></td>
                                            <td><span class="label label-info" >{{ $link->status }}</span></td>
                                            <td><a class="btn btn-info" href="">Edit</a><a class="btn btn-info" href="#">OK</a> </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
@endsection