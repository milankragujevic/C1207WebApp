@extends('layout.master')

@section('title' )
    {{ $title.' - Smovies.tv | Watch Free Movies & TV Series Online' }}
@endsection
@section('maincontent')
    <div id="main-content" class="col-2-3">
        <div class="wrap-content">
            <div class="movie">
                <div class="row type">
                    <div class="title">
                        <center><h2>Latest Movies</h2></center>
                    </div>
                    <ul>
                        <li>
                            <select>
                                <option value="audi" selected="">Action</option>
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
                @foreach($latestMovie->chunk(4) as $list)

                <div class="row">
                    @foreach($list as $movie)
                    <div class="col-1-4">
                        <div class="wrap-col">
                            <div class="post">
                                <div class="view effect">
                                    <img class="thumb" src="{{ asset('images/poster/'.$movie->movieimages()->whereType('poster')->first()->link) }}" alt="Watch Free {{$movie->name}} Online" title="Watch Free {{$movie->name}} Online">
                                    <div class="mask">
                                        <a href="movie-detail.html" class="info" title="Click to watch free {{$movie->name}} online"><img src="images/play_button_64.png" alt="Click to watch free {{$movie->name}} online"></a>
                                    </div>

                                </div>
                                <div class="clear"></div>
                                <a href="movie-detail.html"><h3>{{ $movie->name }}</h3></a>
                                <a href="#"><img class="vote-star" src="images/star.png" alt="Film_Name 4 stars"></a>
                                <br>
                                <span>IMDB: {{ $movie->imdb_code }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
                <center><div class="pagination">
                        {!! $latestMovie->render() !!}
                    </div></center>
            </div>
        </div>
    </div>
    @endsection