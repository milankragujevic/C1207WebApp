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
                                        <h3>{{ $item->name }} {{ $item->type=='series'? 'Season '.$item->season:''}}</h3>
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
                    <center>
                        <p><a href="{{ url('/hot') }}" title="View all hot movie" class="view-more"> View more hot movie </a></p>
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
                                        <h3>{{ $item->name }} {{ $item->type=='series'? 'Season '.$item->season:''}}</h3>
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
                    <center>
                        <p><a href="{{ url('requested') }}" title="View all requested movie" class="view-more"> View more requested movie </a></p>
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
                                @foreach($latestTag as $tag)
                                <li><a href="{{ url('/tags/'.$tag->id) }}">{{ $tag->tag_content }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--End Side bar -->
            </div>
        </div>
    </div>
</section>