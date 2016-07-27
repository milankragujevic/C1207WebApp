@extends('layout.master')
@section('title')TV series and @endsection
@section('banner-index-only')
    <section id="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div id="Glide" class="glide">
                        <div class="glide__arrows">
                            <button class="glide__arrow prev" data-glide-dir="<">prev</button>
                            <button class="glide__arrow next" data-glide-dir=">">next</button>
                        </div>
                        <div class="glide__wrapper">
                            <ul class="glide__track">
                                @foreach($banners as $banner)

                                <li class="glide__slide">
                                    <a href="{{ url($banner->option) }}"><img src="{{ asset('/images/banner/'.$banner->link) }}"/></a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="glide__bullets"></div>
                    </div>
                    <div class="alert-share">
                        <div class="addthis_native_toolbox"></div>
                        <i>Like and share our website to support us.</i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

@section('content')
    <!--////////////////////////////////////Main content-->
    <section id="container">
        <div class="container-fluid">
            <div class="row">
                <div id="main-content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- suggestion -->
                    <div class="suggestion">
                        <div class="row">
                            <div class="title">
                                <center>
                                    <h2>SUGGESTION</h2>
                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul class="nav nav-pills">
                                    <li class="active"><a onclick="ajaxGetContent('featured')" id="featured">Featured</a></li>
                                    <li><a onclick="ajaxGetContent('topToday')" id="topToday">Top viewed today</a></li>
                                    <li><a onclick="ajaxGetContent('mostFavorite')" id="mostFavorite">Most Favorite</a></li>
                                    <li><a onclick="ajaxGetContent('topRat')" id="topRat">Top Rating</a></li>
                                </ul>
                            </div>
                        </div>
                        @foreach($recommend->chunk(6) as $chunked)
                            <div class="row" id="suggestion-content">
                                @foreach($chunked as $item)
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
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
                    </div>
                    <!-- End Suggestion -->
                    <div class="movie">
                        <div class="row">
                            <div class="title">
                                <center>
                                    <h2>LATEST MOVIES</h2>
                                </center>
                            </div>
                        </div>
                        @foreach($latestMovies->chunk(6) as $chunked)
                        <div class="row">
                            @foreach($chunked as $item)
                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
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
                        <center>
                            <p><a href="{{ url('/latestmovie') }}" title="View all latest movie" class="view-more"> View more latest movie >></a></p>
                        </center>
                    </div>
                    <div class="serie">
                        <div class="row">
                            <div class="title">
                                <center>
                                    <h2>LATEST TV SERIES</h2>
                                </center>
                            </div>
                        </div>
                        @foreach($latestSeries->chunk(6) as $chunked)
                        <div class="row">
                            @foreach($chunked as $item)
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
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
                        <center>
                            <p><a href="{{ url('/latestseries') }}" title="View all series movie" class="view-more"> View more series movie >></a></p>
                        </center>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-578761e96a1a3518" async="async"></script>
    <!--////////////////////////////////////End content-->
    @endsection