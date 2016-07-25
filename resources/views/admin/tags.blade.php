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
                    <span>Movie.Tags</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Tags
            <small>List</small>
        </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-social-dribbble font-green"></i>
                            <span class="caption-subject font-green bold uppercase">Tag List</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-cloud-upload"></i>
                            </a>
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-wrench"></i>
                            </a>
                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                <i class="icon-trash"></i>
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Option </th>
                                    <th> Function </th>
                                </tr>
                                </thead>
                                <tbody>
@foreach($tags as $tag)
                                <tr>
                                    <td> {{ $tag->id }} </td>
                                    <td> {{ $tag->tag_content }} </td>
                                    <td> {{ $tag->option }} </td>
                                    <td><a href="{{ url('admin/tags/'.$tag->id) }}"
                                           class="btn btn-sm btn-default btn-circle btn-warning"><i
                                                    class="fa fa-pencil"></i> Show Toggle</a> </td>
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