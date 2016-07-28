@extends('layout.master')
@section('title'){{ $movie->name }} @endsection
@section('content')
    <section id="container">
        <div class="container-fluid">
            <div class="row">
                <div id="main-content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <article class="article-movie-detail">
                        <div class="row">
                            <div class="art-header">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <img src="{{ asset('/images/poster/'.$movie->poster) }}">
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                                    <ul class="ul-detail-movie">
                                        <li><h2>{{ $movie->name }}</h2></li>
                                        <li><p>Genre:
                                                @foreach($movie->genresmodel as $genre)
                                                    <a href="{{ url('/genre/'.str_slug($genre->name)) }}">{{ $genre->name }}</a>,
                                                @endforeach
                                            </p></li>
                                        <li><p>Director:
                                                @foreach($movie->directors as $item)
                                                    <a href="{{ url('/director/'.str_slug($item->name)) }}">{{ $item->name }}</a>,
                                                @endforeach
                                            </p></li>
                                        <li><p>Writer: <a href="#">{{ $movie->writer }}</a></p></li>
                                        <li><p>Actor:
                                                @foreach($movie->actors as $item)
                                                    <a href="{{ url('/star/'.str_slug($item->name)) }}">{{ $item->name }}</a>,
                                                @endforeach
                                            </p></li>
                                        <li><p>Runtime: {{ $movie->runtime }}</p></li>
                                        <li><p>IMDB: <a href="{{ 'http://www.imdb.com/title/'.$movie->imdb_code.'/' }}"
                                                        target="_blank">{{ $movie->rating }}/10</a></p></li>
                                        <li><p>Released: {{ $movie->released }}</p></li>
                                        <li><p>Language:<a href="#">{{ $movie->language }}</a></p></li>
                                        <li><p>Country: @foreach(preg_split('/[\s,]+/',$movie->country) as $item)
                                                    <a href="{{url('/country/'.$item)}}">{{$item}}</a>
                                                @endforeach</p></li>
                                        <li><p>Tags:
                                                @foreach($movie->tags as $tag)
                                                    <a href="{{url('/tags/'.$tag->id)}}">{{ $tag->tag_content }}</a>
                                                    ,
                                                @endforeach
                                            </p></li>
                                        <li class="star">
                                            <div class="please-vote-star">
                                                {!! $movie->renderStar() !!}
                                            </div>
                                        </li>
                                        <li>
                                            @if(!isset($allEpisode))
                                            <a class="button bt1" href="{{ url('/play/'.$movie->slug) }}">Play</a>
                                            @endif
                                            <a class="button bt1" href="#" data-toggle="modal" data-target="#trailer">Trailer</a>
                                        </li>
                                        {{--@if(isset($allEpisode))--}}
                                            {{--@foreach($allEpisode as $season=>$list)--}}
                                                {{--<h2>Season: {{ $season }}</h2>--}}
                                                {{--<li class="eps-more">--}}
                                                    {{--@foreach($list as $item)--}}
                                                        {{--<a class="btn btn-eps"--}}
                                                           {{--href="{{ url('/play/'.$movie->slug.'/'.$item->slug) }}">Eps {{ $item->name }}</a>--}}
                                                    {{--@endforeach--}}
                                                {{--</li>--}}
                                            {{--@endforeach--}}
                                        {{--@endif--}}
                                    </ul>
                                    @if(isset($allEpisode))
                                        <ul class="nav nav-tabs">
                                            @foreach($allEpisode as $season => $list)
                                            <li role="presentation">
                                                <a href="#s{{ $season }}" role="tab" data-toggle="tab">Season {{ $season }}</a>
                                            </li>
                                                @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @foreach($allEpisode as $season => $list)
                                            <div id="s{{ $season }}" class="tab-pane fade" role="tabpanel">
                                                @foreach($list as $item)
                                                <a class="btn-eps" href="{{ url('/play/'.$movie->slug.'/'.$item->slug) }}">Eps {{ $item->name }}</a>
                                                    @endforeach
                                            </div>
                                                @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="news-movies">
                                <!-- Modal Trailer -->
                                <div id="trailer-item">
                                    <div class="container">
                                        <!-- Modal -->
                                        <div class="modal fade" id="trailer" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Trailer {{ $movie->name }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{ 'https://www.youtube.com/embed/'.$movie->trailer }}"
                                                                webkitallowfullscreen="" mozallowfullscreen=""
                                                                allowfullscreen="" scrolling="no"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sumit-request"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Modal Trailer -->

                                <div id="news-movies-item">

                                </div>
                            </div>
                        </div>
                    </article>
                    <div class="movie">
                        <div class="row">
                            <div class="title">
                                <center>
                                    <h2>RELATED POST</h2>
                                </center>
                            </div>
                        </div>
                        @foreach($relatedMovie->chunk(6) as $chunked)
                            <div class="row">
                                <div class="row">
                                    @foreach($chunked as $item)
                                        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
                                            <div class="post">
                                                <div class="view effect">
                                                    <img class="thumb" src="{{ url('images/poster/'.$item->poster) }}" alt="Watch Free {{ $item->name }} Online" title="Watch Free {{ $item->name }} Online"/>
                                                    <div class="mask">
                                                        <a href="{{ url('/movie/'.$item->slug) }}" class="info" title="Click to watch free {{ $item->name }} online"><img src="{{ asset('images/play_button_64.png') }}" alt="Click to watch free {{ $item->name }} online"/></a>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                                <a href="{{ url('/movie/'.$item->slug) }}">
                                                    <h3>{{ $item->name }}</h3>
                                                </a>
                                                <div class="please-vote-star">
                                                    {!! $item->renderStar() !!}
                                                </div>
                                                <span>IMDB: {{ $item->rating }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection