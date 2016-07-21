@extends('layout.admin.master')
@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add New Movie </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="{{ url('/admin/movie/create') }}" class="form-horizontal">
                        <div class="form-body">
                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-3 control-label" for="form_control_1">IMDB Id</label>
                                <div class="col-md-9">
                                    <input type="text" name="imdbId" class="form-control" placeholder="tt..." style="width: 300px">
                                    <div class="form-control-focus" style="width: 300px"> </div>
                                    <span class="help-block">{{ isset($errorMovie)?$errorMovie:'Enter IMDB ID' }}</span>
                                </div>
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <label class="col-md-3 control-label" for="form_control_2">Search</label>
                                <div class="col-md-9">
                                    <input type="text" name="query" class="form-control" placeholder="batman" style="width: 300px">
                                    <div class="form-control-focus" style="width: 300px"> </div>
                                    <span class="help-block">Search by movie title</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-circle green">Submit</button>
                                    <button type="button" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>

@section('pageScript')
@endsection
@endsection