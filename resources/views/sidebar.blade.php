<div id="sidebar" class="col-1-3">
    <div class="wrap-sidebar">
        <!---- Start Widget ---->
        <div class="widget wid-new-updates">
            <div class="wid-header">
                <h4>Hot Updates !</h4>
            </div>
            <div class="wid-content">
                <ul>
                    @foreach($hotmovie as $movie)
                    <li><a href="#">{{ $movie->name }}</a><span><img src="{{ url('images/hot.png') }}" alt="Watch free hot movies online {{ $movie->name }}" title="Watch free hot movies online {{ $movie->name }}"/></span></li>
                        @endforeach
                </ul>
                <div class="view-more-small">
                    <a href="">View more &gt;&gt;</a>
                </div>
            </div>
        </div>
        <!---- Start Widget ---->
        <div class="widget wid-post">
            <div class="wid-header">
                <h4>Requested movies</h4>
            </div>
            <div class="wid-content">
                @foreach($requestedMovie as $movie)
                <div class="post">
                    <a href="#"><img src="{{ asset('images/poster/'.$movie->movieimages()->whereType('poster')->first()->link) }}" alt="Watch free today's movies online {{ $movie->name }}" title="Watch free today's movies online {{ $movie->name }}"/></a>
                    <div class="wrapper">
                        <a href="#"><h6>{{ $movie->name }}</h6></a>
                        <p>IMDB: {{ $movie->rating }}</p>
                        <div class="please-vote-star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
                @endforeach
                    <div class="view-more-small">
                        <a href="">View more &gt;&gt;</a>
                    </div>
            </div>
        </div>
        <!---- Start Widget ---->
        <div class="widget wid-last-updates">
            <div class="wid-header">
                <h4>Lastest Updates</h4>
            </div>
            <div class="wid-content">
                @foreach($latestmovie as $movie)
                    <div class="post">
                        <a href="#"><img src="{{ asset('images/poster/'.$movie->movieimages()->whereType('poster')->first()->link) }}" alt="Watch free today's movies online {{ $movie->name }}" title="Watch free today's movies online {{ $movie->name }}"/></a>
                        <div class="wrapper">
                            <a href="#"><h6>{{ $movie->name }}</h6></a>
                            <p>IMDB: {{ $movie->rating }}</p>
                            <div class="please-vote-star">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <div class="view-more-small">
                        <a href="">View more &gt;&gt;</a>
                    </div>
            </div>
        </div>
        {{--Country--}}
        <div id="country" class="widget wid-tag">
            <div class="wid-header">
                <h4>Country</h4>
            </div>
            <div class="wid-content">
                <ol>
                    <li><a href="#">Asia</a></li>
                    <li><a href="#">China</a></li>
                    <li><a href="#">France</a></li>
                    <li><a href="#">HongKong</a></li>
                    <li><a href="#">India</a></li>
                    <li><a href="#">Japan</a></li>
                    <li><a href="#">Korea</a></li>
                    <li><a href="#">Taiwan</a></li>
                    <li><a href="#">Thailand</a></li>
                    <li><a href="#">United Kingdom</a></li>
                    <li><a href="#">United States</a></li>
                    <li><a href="#">Other</a></li>
                </ol>
            </div>
        </div>
        <!---- Start Widget ---->
        <div class="widget wid-tag">
            <div class="wid-header">
                <h4>Tags</h4>
            </div>
            <div class="wid-content">
                <ul>
                    @foreach($latestTag as $tag)
                        <li><a href="#">{{ $tag->tag_content }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>