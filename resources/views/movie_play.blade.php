@extends('layout.master')
@section('title'){{ $movie->name }} @endsection
@section('content')
    <script src="{{ asset('js/jwplayer.js') }}"></script>
    <script>jwplayer.key = "RZXhBDa/OH0pznbqTglt2e2r9lZFuV8wEJnFBQ==";</script>
    <section id="container">
        <div class="container-fluid">
            <div class="row">
                <div id="main-content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact2">
                        <div class="alert-warning" role="alert"><i class="fa fa-warning"></i> If you can't see the video
                            and
                            only hear the sound, please switch to Firefox/Chrome/Safari for better performance.
                        </div>
                        <div class="player-embed">
                            <div id="movie-loading" style="display: none;">
                            </div>
                            <div id="movie" style="width: 1000px" class="movie-player">
                            </div>
                            <div class="bar-player">
                                <a href="javascript:void(0);" class="btn-lightbulb lightSwitcher">
                                    <i class="fa fa-lightbulb-o"></i>
                                    <span>Turn off the lights</span>
                                </a>
                                <a href="#comment" class="btn-comment">
                                    <i class="fa fa-comments"></i>
                                    <span>Comment</span>
                                </a>
                                <a href="javascript:void(0);" class="btn-view">
                                    <i class="fa fa-eye"></i>
                                    <span>View :{{ $view }}</span>
                                </a>
                            </div>
                            <div class="menu-server">
                                <div class="server1">
                                    <i class="fa fa-server"></i>
                                    <span>Server 1</span>
                                    <button type="button" id="playserver1" class="btn-play play-server1">Play</button>
                                </div>
                                <div class="server2">
                                    <i class="fa fa-server"></i>
                                    <span>Server OpenLoad</span>
                                    <button type="button" id="playserver2" class="btn-play play-server2">Play</button>
                                </div>
                            </div>
                        </div>
                        <div id="comment">
                            <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5"
                                 data-colorscheme="dark"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var playerInstance = jwplayer("movie");
        playerInstance.setup({
//            skin:{
//                name:'five'
//            },
            source: [{
                file: '{!!$linkGoogle['720p']!!}',
                label: "720p HD",
                type: 'mp4',
                "default": "true"
            },{
                file: '{!!$linkGoogle['480p']!!}',
                label: "480p HD",
                type: 'mp4'
            },{
                file: '{!!$linkGoogle['360p']!!}',
                label: "360p HD",
                type: 'mp4'
            }],
            aspectratio: '16:9',
            width: '100%'
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"
            integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>

    <script>

        /*menu-server*/
        $('.menu-server .play-server1').click(function () {

            var playerInstance = jwplayer("movie");
            playerInstance.setup({

                aspectratio: '16:9',
                width: '100%',
                type: 'mp4',
                file: '{!!$linkGoogle!!}'
            });
        });
        $('.menu-server .play-server2').click(function () {
            $('#movie').html('<iframe id="frame-player" class="frame-player" src="{{$linkOpenload}}" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true" scrolling="no"></iframe>');
        });
    </script>


@endsection