@extends('layout.admin.master')
@section('title','Movie')
@section('pageCss')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Movie</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Movie
                <small>List</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- Begin: life time stats -->
                    <div class="portlet ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-shopping-cart"></i>Order Listing
                            </div>
                            <div class="actions">
                                <a href="{{ url('admin/movie/newmovie') }}" class="btn btn-circle btn-info">
                                    <i class="fa fa-plus"></i>
                                    <span class="hidden-xs"> New Movie </span>
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-container">
                                <table class="table table-striped table-bordered table-hover table-checkable">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th width="1%">
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="group-checkable"
                                                       data-set="#sample_2 .checkboxes"/>
                                                <span></span>
                                            </label>
                                        </th>
                                        <th width="10%">Images</th>
                                        <th width="10%"> Movie Name</th>
                                        <th width="5%"> Group</th>
                                        <th width="5%"> IMDB Id</th>
                                        <th width="4%"> Date Created</th>
                                        <th width="4%"> Date Updated</th>
                                        <th width="5%"> Status</th>
                                        <th width="20%"> Detail</th>
                                        <th width="5%"> Function</th>
                                    </tr>
                                    <tr role="row" class="filter">
                                        <form action="{{ url('/admin/search') }}" method="get">
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="movie_name"></td>
                                            <td>
                                                <select name="group" class="form-control form-filter input-sm">
                                                    <option value="">Select...</option>
                                                    @foreach($groups as $item)
                                                        <option value="{{ $item->id }}">{{ $item->group_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control form-filter input-sm"
                                                       name="imdbId"></td>
                                            </td>
                                            <td></td>
                                            <td>
                                            </td>
                                            <td>
                                                <select name="status" class="form-control form-filter input-sm">
                                                    <option value="">Select...</option>
                                                    <option value="1">Enabled</option>
                                                    <option value="0">Disabled</option>
                                                </select>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="margin-bottom-5">
                                                    <button class="btn btn-sm btn-success filter-submit margin-bottom">
                                                        <i class="fa fa-search"></i> Search
                                                    </button>
                                                </div>
                                                <button class="btn btn-sm btn-default filter-cancel">
                                                    <i class="fa fa-times"></i> Reset
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($listMovie))
                                    @foreach($listMovie as $item)
                                    <tr role="row" >

                                        <td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input
                                                        name="id[]" type="checkbox" class="checkboxes"
                                                        value="11"><span></span></label></td>
                                        <td class="sorting_1"><img height="230px" width="155px" src="{{ asset('images/poster/'.str_slug($item->name).'.jpg') }}"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if(isset($item->groups))
                                                @foreach($item->groups as $group)
                                                    <span class="label label-sm label-info">{{ $group->group_name }}</span>
                                                    @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $item->imdb_code }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>
                                            {!! $item->trashed()? '<span class="label label-sm label-default">Disabled</span>':
                                            '<span class="label label-sm label-success">Enabled</span>' !!}</td>
                                        <td>
                                            <ul>
                                            <li>Released: {{ $item->released }}</li>
                                            <li>Created by: {{ $item->created_by }}</li>
                                            <li>Updated by: {{ $item->updated_by }}</li>
                                            <li>ViewCount: {{ isset($item->analytics)? $item->analytics()->count():0 }}</li>
                                            </ul>
                                        </td>
                                        <td><a href="{{ url('admin/movie/'.$item->id.'/edit') }}"
                                               class="btn btn-sm btn-default btn-circle btn-editable"><i
                                                        class="fa fa-pencil"></i> Edit&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
                                            @if(!$item->trashed())
                                            <a href="{{ url('admin/disable/'.$item->id) }}"
                                               class="btn btn-sm btn-default btn-circle btn-warning"><i
                                                        class="fa fa-pencil"></i> Disable</a>
                                                @else
                                                <a href="{{ url('admin/enable/'.$item->id) }}"
                                                   class="btn btn-sm btn-default btn-circle btn-default"><i
                                                            class="fa fa-pencil"></i> Enable</a>
                                                @endif
                                            <a href="{{ url('admin/movie/'.$item->id) }}"
                                               class="btn btn-sm btn-default btn-circle btn-editable"><i
                                                        class="fa fa-desktop"></i> Detail   </a>
                                            @if($item->type=='series')
                                                <a href="{{ url('admin/episode/movie/'.$item->id) }}"
                                                   class="btn btn-sm btn-default btn-circle btn-editable"><i
                                                            class="fa fa-desktop"></i>Episode   </a>
                                                @endif
                                        </td>
                                    </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End: life time stats -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>

@endsection
@section('pageScript')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
            type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"
            type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"
            type="text/javascript"></script>
    <script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/pages/scripts/ecommerce-products.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection