@extends('layout.master')
@section('maincontent')

    <div id="main-content" class="col-2-3">
        <div class="wrap-content">
            <div class="contact">
                <div class="alert-warning" role="alert"><i class="fa fa-warning"></i> If you can't see the video and
                    only hear the sound, please switch to Firefox/Chrome/Safari for better performance.
                </div>
                <div class="player-embed">
                    <div id="movie-loading" style="display: none;">
                    </div>
                    <div id="movie" class="movie-player">
                        <div id="player" style="position:relative; padding-bottom:56.25%; overflow:hidden;">
                            <iframe src="{!! $movie->movielinks()->whereProvider('Google Drive')->first()->link !!} " width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;">
                            </iframe>
                        </div>
                    </div>
                    <div class="bar-player">
                        <a href="#lightbulb" class="btn-lightbulb lightSwitcher">
                            <i class="fa fa-lightbulb-o"></i>
                            <span>Turn off the lights</span>
                        </a>
                        <a href="#comment" class="btn-comment">
                            <i class="fa fa-comments"></i>
                            <span>Comment</span>
                        </a>
                        <a href="#view" class="btn-view">
                            <i class="fa fa-eye"></i>
                            <span>View</span>
                        </a>
                    </div>
                    <div class="menu-server">
                        <div class="server1">
                            <i class="fa fa-server"></i>
                            <span>Server 1</span>
                            <button type="button" id="playserver1" class="btn-play">Play</button>
                        </div>
                        <div class="server2">
                            <i class="fa fa-server"></i>
                            <span>Server OpenLoad</span>
                            <button type="button" id="playserver2" class="btn-play">Play</button>
                        </div>
                    </div>
                </div>
                <div id="comment">
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#imdb" data-numposts="5" data-colorscheme="light"></div>
                </div>
            </div>
        </div>
    </div>
    <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
<script>
    $("#playserver2").click(function(){
        $("#movie").html('<iframe src="{!! $linkOpenload  !!}" scrolling="no" frameborder="0" width="700" height="430" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>');
    });
</script>
@endsection