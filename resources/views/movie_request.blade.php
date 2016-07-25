@extends('layout.master')
@section('title')
    Request Movie
@endsection
@section('content')
    <section id="container">
        <div class="container-fluid">
            <div class="row">
                <div id="main-content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact">
                        <h2>Movies Request</h2>
                        <p>Search movies before sending the request. Please leave movie name, more info and message, we will send back soon.</p>
                        <hr>
                        <div id="contact_form">

                            <form class="form-horizontal" role="form" action="{{ url('/storerequest') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="txtname">Enter movie name: (*)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="txtname" placeholder="Enter movie name..." required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Enter your email: (*)</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email..." required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="txtimdb">Enter IMDB url:</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="imdb" class="form-control" id="txtimdb" placeholder="Enter IMDB url...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="txtarea">Your message here:</label>
                                    <div class="col-sm-10">
                                        <textarea rows="3" name="message" class="form-control" id="txtarea" placeholder="Your message here...">										  </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default btn-sumit-request">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection