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
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                    <div class="post">
                                        <div class="view effect">
                                            <img class="thumb" src="{{ url('images/poster/'.$item->poster) }}" alt="Watch Free {{ $item->name }} Online" title="Watch Free {{ $item->name }} Online"/>
                                            <div class="mask">
                                                <a href="movie-detail.html" class="info" title="Click to watch free {{ $item->name }} online"><img src="{{ asset('images/play_button_64.png') }}" alt="Click to watch free {{ $item->name }} online"/></a>
                                            </div>
                                        </div>
                                        <div class="clear"></div>
                                        <a href="movie-detail.html">
                                            <h3>{{ $item->name }}</h3>
                                        </a>
                                        <div class="please-vote-star">
                                            @if($item->rating!=0)
                                                @for($x=1;$x<=$item->rating/2;$x++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                @if($item->rating/2 - ($x-1)>=0.5)
                                                    <i class="fa fa-star"></i>
                                                    {{-- */$x++;/* --}}
                                                @else
                                                    {{-- */$x--;/* --}}
                                                @endif
                                                @while($x<5)
                                                    <i class="fa fa-star-o"></i>
                                                    {{-- */$x++;/* --}}
                                                @endwhile
                                            @else
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            @endif
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