@extends('layout.admin.master')
@section('content')
    <link href="{{ asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('assets/global/plugins/typeahead/typeahead.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/global/css/components-md.min.css') }}" rel="stylesheet" id="style_components"
          type="text/css">
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Movie
                <small>Add New</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Movie Information Input</span>
                    </div>
                </div>
                <div class="porlet-body form">
                    <form action="{{ url('admin/movie/') }}" method="post" class="horizontal-form">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="form-section">From IMDB</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input type="text" id="movieName" name="movieName" class="form-control"
                                               placeholder="Movie Name"
                                               value="{{ $movie['Title'] }}">
                                        {{--<span class="help-block"> This is inline help </span>--}}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Slug</label>
                                        <input type="text" id="slug" name="slug" value="{{ str_slug($movie['Title']) }}"
                                               class="form-control"
                                               placeholder="movie-name">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Title</label>
                                        <input type="text" id="slug" name="movieTitle" class="form-control"
                                               placeholder="title"
                                               value="{{ $movie['Title'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Description</label>
                                        <textarea name="movieDes" class="form-control">{{ $movie['Plot'] }}</textarea>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Runtime</label>
                                        <input type="text" name="runtime" class="form-control"
                                               value="{{ $movie['Runtime'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">IMDB Code</label>
                                        <input type="text" name="imdbId" class="form-control"
                                               value="{{ $movie['imdbID'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">IMDB Votes</label>
                                        <input type="text" name="imdbVotes" class="form-control"
                                               value="{{ $movie['imdbVotes'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Released</label>
                                        <input type="text" name="released" class="form-control"
                                               value="{{ $movie['Released'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Genres</label><br>
                                        <input type="text" name="movieGenres" class="form-control" data-role="tagsinput"
                                               style="display: none;"
                                               value="{{ $movie['Genre'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Director</label><br>
                                        <input type="text" name="director" class="form-control" data-role="tagsinput"
                                               value="{{ $movie['Director'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Writer</label><br>
                                        <input type="text" name="writer" class="form-control" data-role="tagsinput"
                                               value="{{ $movie['Writer'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Actor</label><br>
                                        <input type="text" name="actor" class="form-control" data-role="tagsinput"
                                               value="{{ $movie['Actors'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Country</label><br>
                                        <input type="text" name="country" class="form-control" data-role="tagsinput"
                                               value="{{ $movie['Country'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Language</label><br>
                                        <input type="text" name="lang" class="form-control" data-role="tagsinput"
                                               value="{{ $movie['Language'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Cover</label><br>
                                        <input type="text" name="cover" class="form-control"
                                               value="{{ $movie['Poster'] }}">
                                        <a href="javascript:;" class="thumbnail">
                                            <img src="{!! url('images/poster/'.str_slug($movie['Title']).'.jpg') !!}"
                                                 style="width: 182px ; height: 268px; display: block">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Rated</label><br>
                                        <input type="text" name="rated" class="form-control"
                                               value="{{ $movie['Rated'] }}">
                                    </div>
                                </div>

                            </div>

                            <h3 class="form-section">Additional Info</h3>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="control-label">Trailer</label>
                                        <input type="text" name="trailer" class="form-control"></div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="control-label">Rating</label>
                                        <input type="text" name="rating" class="form-control"
                                               value="{{ $movie['imdbRating'] }}"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tags</label><br>
                                        <input value="{{$tags}}" type="text" name="tags" class="form-control" data-role="tagsinput">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Award</label>
                                        <input type="text" name="award" class="form-control"
                                               value="{{ $movie['Awards'] }}"></div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Type</label>
                                        <input type="text" name="type" class="form-control"
                                               value="{{ $movie['Type'] }}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group form-md-checkboxes">
                                        <label>Group</label>
                                        <div class="mt-checkbox-inline">
                                            @foreach($groups as $item)
                                                <label class="mt-checkbox">
                                                    <input type="checkbox" name="group[]" id="inlineCheckbox21"
                                                           value="{{ $item->id }}"> {{ $item->group_name }}
                                                    <span></span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quality</label>
                                        <div class="mt-checkbox-inline">
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="quality[]" id="inlineCheckbox21"
                                                       value="HD"> HD
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="quality[]" id="inlineCheckbox21"
                                                       value="DVD"> DVD
                                                <span></span>
                                            </label>
                                            <label class="mt-checkbox">
                                                <input type="checkbox" name="quality[]" id="inlineCheckbox21"
                                                       value="CAM"> CAM
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @if($movie['Type']=='series')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Season</label>
                                        <input type="number" name="season" class="form-control"
                                               placeholder="Enter Season Number" required>
                                    </div>
                                </div>
                                    @endif
                            </div>
                            <h3 class="form-section">Movie Link</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Google Drive</label>
                                        <input id="googleCode" type="text" name="google_drive" class="form-control"
                                               placeholder="drive file id">
                                        <span class="input-group-btn">
                                                            <button id="checkQuality" class="btn red" type="button">Check Quality</button>
                                                        </span>
                                        <span class="label label-success" id="qualityInfo"></span>
                                        <div class="toast-bottom-center"></div>

                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Openload</label>
                                        <input type="text" name="openload" class="form-control"
                                               placeholder="openload file id">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>
                        <div class="form-actions right">
                            <button type="button" class="btn default">Cancel</button>
                            <button type="submit" class="btn blue">
                                <i class="fa fa-check"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
@section('pageScript')
    <script src="{{ asset('assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/typeahead/handlebars.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/typeahead/typeahead.bundle.min.js') }}"
            type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/pages/scripts/ui-toastr.min.js') }}" type="text/javascript"></script>
    <script>
        function showToastr(data){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-full-width",
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr.info(data,'Checking code');
        }
        $("#checkQuality").click(function () {
            showToastr("Loading");
            $.get("/googlelink/"+$("#googleCode").val(),function (data,status) {
                var json = JSON.parse(data);
                var q = '';
                $.each(json,function (index,data) {
                    q+=data.label+" "
                });
                $("#qualityInfo").text(q);
            });
        });

    </script>
@endsection

