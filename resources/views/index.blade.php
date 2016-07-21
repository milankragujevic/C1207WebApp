@extends('layout.master')
@section('banner')
    <link rel="stylesheet" href="css/glide.core.css">
    <link rel="stylesheet" href="css/glide.theme.css">
    <section id="banner">
        <div class="wrap-container zerogrid">
            <div class="col-3-3">
                <div class="wrap-content">
                    <div id="Glide" class="glide">

                        <div class="glide__arrows">
                            <button class="glide__arrow prev" data-glide-dir="<">prev</button>
                            <button class="glide__arrow next" data-glide-dir=">">next</button>
                        </div>

                        <div class="glide__wrapper">
                            <ul class="glide__track">
                                <li class="glide__slide">
                                    <img src="images/slidershow/02.jpg"/>
                                </li>
                                <li class="glide__slide">
                                    <img src="images/slidershow/04.jpg"/>
                                </li>
                                <li class="glide__slide">
                                    <img src="images/slidershow/05.jpg"/>
                                </li>
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
        </div>
        </section>
    @endsection
@section('maincontent')
    <div id="main-content" class="col-2-3">
        <div class="wrap-content">
            <div class="movie">
                <div class="row type">
                    <div class="title">
                        <center><h2>LATEST MOVIES</h2></center>
                    </div>
                    <ul>
                        <li>
                            <select>
                                <option value="audi" selected>Action</option>
                                <option value="volvo">Adventure</option>
                                <option value="saab">Animation</option>
                                <option value="volvo">Children</option>
                                <option value="saab">Comedy</option>
                                <option value="volvo">Crime</option>
                                <option value="saab">Documentary</option>
                                <option value="volvo">Drama</option>
                                <option value="saab">Family</option>
                                <option value="volvo">Fantasy</option>
                                <option value="saab">Food</option>
                                <option value="audi">Game Show</option>
                                <option value="volvo">Home and Garden</option>
                                <option value="saab">Horror</option>
                                <option value="volvo">Mini-Series</option>
                                <option value="saab">News</option>
                                <option value="volvo">Reality</option>
                                <option value="saab">Science-Fiction</option>
                                <option value="volvo">Soap</option>
                                <option value="saab">Special Interest</option>
                                <option value="volvo">Sport</option>
                                <option value="saab">Suspense</option>
                                <option value="volvo">Talk Show</option>
                                <option value="saab">Thriller</option>
                                <option value="volvo">Travel</option>
                                <option value="saab">Western</option>
                            </select>
                        </li>
                        <li><a class="button " href="#">Search</a></li>
                    </ul>
                </div>
                @foreach($latestMovies->chunk(4) as $l4)
                <div class="row">
                    @foreach($l4 as $item)
                    <div class="col-1-4">
                        <div class="wrap-col">
                            <div class="post">
                                <div class="view effect">
                                    <img class="thumb" src="{{ asset('images/poster/'.$item->movieimages()->whereType('poster')->first()->link) }}" alt="Watch Free {{ $item->name }} Online" title="Watch Free {{ $item->name }} Online"/>
                                    <div class="mask">
                                        <a href="{{ url('movie/'.$item->slug) }}" class="info" title="Click to watch free {{ $item->name }} online"><img src="images/play_button_64.png" alt="Click to watch free {{ $item->name }} online"/></a>
                                    </div>

                                </div>
                                <div class="clear"></div>
                                <a href="movie-detail.html"><h3>{{ $item->name }}</h3></a>
                                <div class="please-vote-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <br>
                                <span>IMDB: {{ isset($item->rating)? $item->rating:0 }}</span>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
                @endforeach
                <center>
                    <p><a href="{{ url('latestmovie') }}" title="View all latest movie" class="view-more"> View more latest movie >></a></p>
                </center>
            </div>
            <div class="serie">
                <div class="row type">
                    <div class="title">
                        <center><h2>LATEST TV SERIES</h2></center>
                    </div>
                    <ul>
                        <li>
                            <select>
                                <option value="audi" selected>Action</option>
                                <option value="volvo">Adventure</option>
                                <option value="saab">Animation</option>
                                <option value="volvo">Children</option>
                                <option value="saab">Comedy</option>
                                <option value="volvo">Crime</option>
                                <option value="saab">Documentary</option>
                                <option value="volvo">Drama</option>
                                <option value="saab">Family</option>
                                <option value="volvo">Fantasy</option>
                                <option value="saab">Food</option>
                                <option value="audi">Game Show</option>
                                <option value="volvo">Home and Garden</option>
                                <option value="saab">Horror</option>
                                <option value="volvo">Mini-Series</option>
                                <option value="saab">News</option>
                                <option value="volvo">Reality</option>
                                <option value="saab">Science-Fiction</option>
                                <option value="volvo">Soap</option>
                                <option value="saab">Special Interest</option>
                                <option value="volvo">Sport</option>
                                <option value="saab">Suspense</option>
                                <option value="volvo">Talk Show</option>
                                <option value="saab">Thriller</option>
                                <option value="volvo">Travel</option>
                                <option value="saab">Western</option>
                            </select>
                        </li>

                        <li><a class="button " href="#">Search</a></li>
                    </ul>
                </div>
                @foreach($latestSeries->chunk(4) as $l4)
                <div class="row">
                    @foreach($l4 as $item)
                    <div class="col-1-4">
                        <div class="wrap-col">
                            <div class="post">
                                <div class="view effect">
                                    <img class="thumb" src="{{ asset('images/poster/'.$item->movieimages()->whereType('poster')->first()->link) }}"  />
                                    <div class="mask">
                                        <a href="{{url('movie/'.$item->slug)}}" class="info" title="Full Image"><img src="images/play_button_64.png" /></a>
                                    </div>
                                </div>
                                <a href="{{ url('latestseries') }}"><h3>{{ $item->name }}</h3></a>
                                <a href="#"><img class="vote-star" src="images/star.png" alt="Film_Name 4 stars"/></a>
                                <br>
                                <span>IMDB: {{ $item->imdb_code }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
                <center>
                    <p><a href="{{ url('latestseries') }}" title="View all series movie" class="view-more"> View more series movie >></a></p>
                </center>
            </div>
        </div>
    </div>
    @endsection