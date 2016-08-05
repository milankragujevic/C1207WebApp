@extends('layout.admin.master')
@section('title','Edit User')
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
                                <span class="caption-subject bold uppercase"> Edit Staff</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form role="form" action="{{ url('/admin/user/'.$user->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT" >
                                <div class="form-body">
                                    <div class="form-group form-md-line-input">
                                        <input name="name" value="{{$user->name}}" type="text" class="form-control" id="form_control_1" placeholder="Enter name">
                                        <label for="form_control_1">Staff Name</label>
                                        <span class="help-block">Mr Red</span>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input name="email" value="{{ $user->email }}" type="text" class="form-control" id="form_control_1" placeholder="Enter email">
                                        <label for="form_control_1">Email</label>
                                        <span class="help-block">mrred@gmail.com</span>
                                    </div>
                                    <div class="form-group form-md-line-input has-success">
                                        <input name="password" type="password" class="form-control" id="form_control_1" placeholder="Enter Password">
                                        <label for="form_control_1">Password</label>
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