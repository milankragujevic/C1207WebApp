@extends('layout.master')
@section('title')
    @endsection

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
                                                <a href="{{ url('/genre/'.$genre->name) }}">{{ $genre->name }}</a>
                                                @endforeach
                                            </p></li>
                                        <li><p>Director:
                                                @foreach($movie->directors as $item)
                                                    <a href="{{ url('/director/'.$item->name) }}">{{ $item->name }}</a>
                                                @endforeach
                                            </p></li>
                                        <li><p>Writer: <a href="#">{{ $movie->writer }}</a></p></li>
                                        <li><p>Actor:
                                                @foreach($movie->actors as $item)
                                                    <a href="{{ url('/actor/'.$item->name) }}">{{ $item->name }}</a>
                                                @endforeach
                                            </p></li>
                                        <li><p>Runtime: {{ $movie->runtime }}</p></li>
                                        <li><p>IMDB: <a href="{{ 'http://www.imdb.com/title/'.$movie->imdb_code.'/' }}" target="_blank">{{ $movie->rating }}/10</a></p></li>
                                        <li><p>Released: {{ $movie->released }}</p></li>
                                        <li><p>Language:<a href="#">{{ $movie->language }}</a> </p></li>
                                        <li><p>Country: @foreach(preg_split('/[\s,]+/',$movie->country) as $item)
                                                    <a href="{{url('/country/'.$item)}}">{{$item}}</a>
                                                @endforeach</p></li>
                                        <li><p>Tags:
                                            @foreach($movie->tags as $tag)
                                                <a href="{{url('/tags/'.$tag->tag_content)}}">{{ $tag->tag_content }}</a>
                                                @endforeach
                                            </p></li>
                                        <li class="star">
                                            <div class="please-vote-star">
                                                @if($movie->rating!=0)
                                                    @for($x=1;$x<=$movie->rating/2;$x++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                    @if($movie->rating/2 - ($x-1)>=0.5)
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
                                        </li>
                                        <li><a class="button bt1" href="{{ url('/play/'.$movie->slug) }}">Play</a><a class="button bt1" href="#" data-toggle="modal" data-target="#trailer">Trailer</a></li>
                                        @if(isset($allEpisode))
                                            @foreach($allEpisode as $season=>$list)
                                                <h2>Season: {{ $season }}</h2>
                                        <li class="eps-more">
                                            @foreach($list as $item)
                                            <a class="btn btn-eps" href="{{ url('/play/'.$movie->slug.'/'.$item->slug) }}">Eps {{ $item->name }}</a>
                                                @endforeach
                                        </li>
                                            @endforeach
                                            @endif
                                    </ul>
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
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Trailer Film_Name</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{ 'https://www.youtube.com/embed/'.$movie->trailer }}" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" scrolling="no"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sumit-request" data-dismiss="modal">Close</button>
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
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class="post">
                                    <div class="view effect">
                                        <img class="thumb" src="images/1.jpg" alt="Watch Free Film_Name Online" title="Watch Free Film_Name Online">
                                        <div class="mask">
                                            <a href="movie-detail.html" class="info" title="Click to watch free Film_Name online"><img src="images/play_button_64.png" alt="Click to watch free Film_Name online"></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="movie-detail.html">
                                        <h3>Lethal Weapon 4</h3>
                                    </a>
                                    <div class="please-vote-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span>IMDB: 8.5</span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class="post">
                                    <div class="view effect">
                                        <img class="thumb" src="images/1.jpg" alt="Watch Free Film_Name Online" title="Watch Free Film_Name Online">
                                        <div class="mask">
                                            <a href="movie-detail.html" class="info" title="Click to watch free Film_Name online"><img src="images/play_button_64.png" alt="Click to watch free Film_Name online"></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="movie-detail.html">
                                        <h3>Lethal Weapon 4</h3>
                                    </a>
                                    <div class="please-vote-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span>IMDB: 8.5</span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class="post">
                                    <div class="view effect">
                                        <img class="thumb" src="images/1.jpg" alt="Watch Free Film_Name Online" title="Watch Free Film_Name Online">
                                        <div class="mask">
                                            <a href="movie-detail.html" class="info" title="Click to watch free Film_Name online"><img src="images/play_button_64.png" alt="Click to watch free Film_Name online"></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="movie-detail.html">
                                        <h3>Lethal Weapon 4</h3>
                                    </a>
                                    <div class="please-vote-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span>IMDB: 8.5</span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class="post">
                                    <div class="view effect">
                                        <img class="thumb" src="images/1.jpg" alt="Watch Free Film_Name Online" title="Watch Free Film_Name Online">
                                        <div class="mask">
                                            <a href="movie-detail.html" class="info" title="Click to watch free Film_Name online"><img src="images/play_button_64.png" alt="Click to watch free Film_Name online"></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="movie-detail.html">
                                        <h3>Lethal Weapon 4</h3>
                                    </a>
                                    <div class="please-vote-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span>IMDB: 8.5</span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class="post">
                                    <div class="view effect">
                                        <img class="thumb" src="images/1.jpg" alt="Watch Free Film_Name Online" title="Watch Free Film_Name Online">
                                        <div class="mask">
                                            <a href="movie-detail.html" class="info" title="Click to watch free Film_Name online"><img src="images/play_button_64.png" alt="Click to watch free Film_Name online"></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="movie-detail.html">
                                        <h3>Lethal Weapon 4</h3>
                                    </a>
                                    <div class="please-vote-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span>IMDB: 8.5</span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class="post">
                                    <div class="view effect">
                                        <img class="thumb" src="images/1.jpg" alt="Watch Free Film_Name Online" title="Watch Free Film_Name Online">
                                        <div class="mask">
                                            <a href="movie-detail.html" class="info" title="Click to watch free Film_Name online"><img src="images/play_button_64.png" alt="Click to watch free Film_Name online"></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="movie-detail.html">
                                        <h3>Lethal Weapon 4</h3>
                                    </a>
                                    <div class="please-vote-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span>IMDB: 8.5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection