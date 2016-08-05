@extends('layout.admin.master')
@section('title','Add New User')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h1 class="page-title"> Add New Staff
            </h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> New Staff</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form" action="{{ url('/admin/user') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                        <input name="name" type="text" class="form-control" id="form_control_1" placeholder="Enter name">
                                        <label for="form_control_1">Staff Name</label>
                                        <span class="help-block">Mr Red</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input name="email" type="text" class="form-control" id="form_control_1" placeholder="Enter email">
                                        <label for="form_control_1">Email</label>
                                        <span class="help-block">mrred@gmail.com</span>
                                    </div>
                                    <div class="form-group form-md-line-input has-success">
                                        <input name="password" type="password" class="form-control" id="form_control_1" placeholder="Enter Password">
                                        <label for="form_control_1">abc123!@#</label>
                                    </div>
                                </div>
                                <div class="form-actions noborder">
                                    <button type="submit" class="btn blue">Submit</button>
                                    <button type="button" class="btn default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection