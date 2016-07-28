@extends('layout.master')
@section('title'){{ $title }}@endsection
@section('content')
    <section id="container">
        <div class="container-fluid">
            <div class="row">
                <div id="main-content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="movie">
                        <div class="row">
                            <div class="title">
                                <center>
                                    <h2>{{ $title }}</h2>
                                </center>
                            </div>
                        </div>
                        @foreach($listMovie->chunk(6) as $chunked)
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
                        @endforeach
                        <center><div class="pagination">
                                {!! $listMovie->render() !!} }}
                            </div></center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection