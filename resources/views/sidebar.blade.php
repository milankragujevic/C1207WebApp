<section id="side-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Side bar -->
                <!-- Hot Movies-->
                <div class="hot-movies">
                    <div class="row">
                        <div class="title">
                            <center>
                                <h2>HOT MOVIES</h2>
                            </center>
                        </div>
                    </div>
                    @foreach($hotMovie->chunk(6) as $chunked)
                    <div class="row">
                        @foreach($chunked as $item)
                            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                <div class="post">
                                    <div class="view effect">
                                        <img class="thumb" src="{{ url('images/poster/'.$item->poster) }}" alt="Watch Free {{ $item->name }} Online" title="Watch Free {{ $item->name }} Online"/>
                                        <div class="mask">
                                            <a href="movie-detail.html" class="info" title="Click to watch free Film_Name online"><img src="{{ asset('images/play_button_64.png') }}" alt="Click to watch free {{ $item->name }} online"/></a>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <a href="movie-detail.html">
                                        <h3>{{ $item->name }}</h3>
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
                        @endforeach
                    </div>
                    @endforeach
                    <center>
                        <p><a href="series-movies.html" title="View all series movie" class="view-more"> View more series movie </a></p>
                    </center>
                </div>
                <!-- Requested Movies -->
                <div class="requested-movies">
                    <div class="row">
                        <div class="title">
                            <center>
                                <h2>REQUESTED MOVIES</h2>
                            </center>
                        </div>
                    </div>
                    @foreach($requestedMovie->chunk(6) as $chunked)
                    <div class="row">
                        @foreach($chunked as $item)
                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                            <div class="post">
                                <div class="view effect">
                                    <img class="thumb" src="{{ url('images/poster/'.$item->poster) }}" alt="Watch Free {{ $item->name }} Online" title="Watch Free {{ $item->name }} Online"/>
                                    <div class="mask">
                                        <a href="movie-detail.html" class="info" title="Click to watch free {{ $item->name }} online"><img src="images/play_button_64.png" alt="Click to watch free {{ $item->name }} online"/></a>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <a href="movie-detail.html">
                                    <h3>{{ $item->name }}</h3>
                                </a>
                                <div class="please-vote-star">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span>IMDB: {{ $item->rating }}</span>
                            </div>
                        </div>
                            @endforeach
                    </div>
                    @endforeach
                    <center>
                        <p><a href="series-movies.html" title="View all series movie" class="view-more"> View more series movie >></a></p>
                    </center>
                </div>
                <!---- Start Widget ---->
                <div class="wid-tag">
                    <div class="row">
                        <div class="title">
                            <center>
                                <h4>TAGS</h4>
                            </center>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul>
                                <li><a href="#">free movies</a></li>
                                <li><a href="#">watch free movies online</a></li>
                                <li><a href="#">cinema movies</a></li>
                                <li><a href="#">tv series</a></li>
                                <li><a href="#">action</a></li>
                                <li><a href="#">horror</a></li>
                                <li><a href="#">animation</a></li>
                                <li><a href="#">comedy</a></li>
                                <li><a href="#">romance</a></li>
                                <li><a href="#">free movies online</a></li>
                                <li><a href="#">smovies.tv</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Side bar -->
            </div>
        </div>
    </div>
</section>