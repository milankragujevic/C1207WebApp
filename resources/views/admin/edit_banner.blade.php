@extends('layout.admin.master')
@section('title','Edit Banner')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ url('/admin') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Movie.Banner</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Banner
                <small>Edit</small>
            </h3>

            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Edit Banner</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" action="{{ url('/admin/banner-update/'.$banner->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="form-group form-md-line-input">
                                    <input type="text" value="{{$banner->option}}" class="form-control" name="link" id="form_control_1" placeholder="Enter Movie Link">
                                    <label for="form_control_1">Enter Movie Link</label>
                                    <span class="help-block">Viết đường dẫn tương đối vd : http://smovie.tv/movie/game-of-thrones thì chỉ lấy /movie/game-of-thrones</span>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <input type="file" class="form-control" name="banner_img" id="form_control_1" placeholder="Choose banner">
                                    <label for="form_control_1">Upload banner</label>
                                    <span class="help-block">Banner</span>
                                </div>

                            </div>
                            <div class="form-actions noborder">
                                <input type="submit" class="btn blue">
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection