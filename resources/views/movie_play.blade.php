@extends('layout.master')
@section('title')
@endsection

@section('content')
    <section id="container">
        <div class="container-fluid">
            <div class="row">
                <div id="main-content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact">
                        <div class="alert-warning" role="alert"><i class="fa fa-warning"></i> If you can't see the video
                            and
                            only hear the sound, please switch to Firefox/Chrome/Safari for better performance.
                        </div>
                        <div class="player-embed">
                            <div id="movie-loading" style="display: none;">
                            </div>
                            <div id="movie" class="movie-player">
                                <div style="position:relative; padding-bottom:56.25%; overflow:hidden;">
                                    <iframe src="//content.jwplatform.com/players/kX6Xr8wp-rulQ5XkJ.html" width="100%"
                                            height="100%" frameborder="0" scrolling="auto" allowfullscreen
                                            style="position:absolute;"></iframe>
                                </div>
                            </div>
                            <div class="bar-player">
                                <a href="javascrip:void(0);" class="btn-lightbulb lightSwitcher">
                                    <i class="fa fa-lightbulb-o"></i>
                                    <span>Turn off the lights</span>
                                </a>
                                <a href="#comment" class="btn-comment">
                                    <i class="fa fa-comments"></i>
                                    <span>Comment</span>
                                </a>
                                <a href="javascrip:void(0);" class="btn-view">
                                    <i class="fa fa-eye"></i>
                                    <span>View</span>
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
                            <div class="fb-comments"
                                 data-href="https://developers.facebook.com/docs/plugins/comments#imdb"
                                 data-numposts="5" data-colorscheme="light"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"
            integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script>
        /*menu-server*/
        $('.menu-server .play-server2').click(function () {
            document.getElementById('frame-player').src = '{{ $googleLink }}';
        });
        $('.menu-server .play-server1').click(function () {
            document.getElementById('frame-player').src = '{{ $openloadLink }}';
        });
    </script>

@endsection