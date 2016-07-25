@extends('layout.admin.master')
@section('title','Edit Movie')
@section('pageCss')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <link href="{{ asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('assets/global/plugins/typeahead/typeahead.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/global/css/components-md.min.css') }}" rel="stylesheet" id="style_components"
          type="text/css">
    <link href="{{ url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
          type="text/css">
@endsection
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-equalizer font-blue-hoki"></i>
                        <span class="caption-subject font-blue-hoki bold uppercase">{{$movie->name}}</span>
                        <span class="caption-helper">{{$movie->name}}</span>
                    </div>
                    <div class="tools">
                        <a href="" class="collapse" data-original-title="" title=""> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title=""
                           title=""> </a>
                        <a href="" class="reload" data-original-title="" title=""> </a>
                        <a href="" class="remove" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form method="post" action="{{ url('admin/movie/'.$movie->id) }}" class="horizontal-form">
                        {{ csrf_field() }}
                        <input name="_method" value="PUT" type="hidden">
                        <div class="form-body">
                            <h3 class="form-section">General</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tags</label>
                                        <input type="text" name="tags" class="form-control" data-role="tagsinput"
                                               value="{{$tagsString}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Genres</label>
                                        <input type="text" name="movieGenres" class="form-control" data-role="tagsinput"
                                               style="display: none;"
                                               value="{{ $genresString }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-checkboxes">
                                        <label>Group</label>
                                        <div class="mt-checkbox-inline">
                                            @foreach($groups as $item)
                                                <label class="mt-checkbox">
                                                    <input type="checkbox" name="group[]" id="inlineCheckbox21"
                                                           value="{{ $item->id }}" {{empty($movie->groups()->whereGroupName($item->group_name)->first())?'':'checked' }}> {{ $item->group_name }}
                                                    <span></span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                                <!--/span-->
                            </div>
                            <h3 class="form-section">Link</h3>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Google Link</label>
                                        <input value="{{ isset($googleLink)?$googleLink->link:'' }}" type="text"
                                               name="google_link" id="google_link" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Openload</label>
                                        <input value="{{ isset($openloadLink)?$openloadLink->link:'' }}" type="text"
                                               name="openload_link" id="lastName" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                          </div>
                        <div class="form-actions right">
                            <button type="button" class="btn default">Cancel</button>
                            <button type="submit" class="btn blue">
                                <i class="fa fa-check"></i> Save
                            </button>
                        </div>
                    </form>

                    <!-- END FORM-->
                </div>
            </div>
        </div>
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
    <script src="{{url('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/typeahead/handlebars.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/typeahead/typeahead.bundle.min.js') }}"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection