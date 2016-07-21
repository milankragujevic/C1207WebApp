@extends('layout.master')
@section('maincontent')
    <div id="main-content" class="col-2-3">
        <div class="wrap-content">
            <article>
                <div class="art-header">
                    <div class="col-1-3">
                        <div class="wrap-col">
                            <img src="{{ url('images/poster/'.$movie->movieimages()->whereType('poster')->first()->link) }}">
                        </div>
                    </div>
                    <div class="col-2-3">
                        <div class="wrap-col">
                            <ul>
                                <li><h2>{{ $movie->name }} ({{ substr($movie->released,7) }})</h2></li>
                                <li><p>Genre:
                                    @foreach($movie->genresmodel as $genre)
                                        <a href="#">{{ $genre->name }}</a>
                                        @endforeach
                                    </p></li>
                                <li><p>Director:
                                    @foreach($movie->directors as $director)
                                        <a href="#">{{ $director->name }}</a>
                                        @endforeach
                                    </p></li>
                                <li><p>Writer: {{ $movie->writer }}</p></li>
                                <li><p>Actor:
                                        @foreach($movie->actors as $actor)
                                            <a href="#">{{ $actor->name }}</a>
                                        @endforeach
                                    </p></li>
                                <li><p>Runtime: {{ $movie->runtime }}</p></li>
                                <li><p>IMDB: <a href="http://www.imdb.com/title/{{ $movie->imdb_code }}/" target="_blank">{{ $movie->rating }}/10</a></p></li>
                                <li><p>Released: {{ $movie->released }}</p></li>
                                <li><p>Language: {{ $movie->language }}</p></li>
                                <li><p>Country: {{ $movie->country }}</p></li>
                                <li><p>Tags: <a href="#">{{ $movie->name }}</a>,
                                    @foreach($movie->tags as $tag)
                                        <a href="#">{{ $tag->tag_content }}</a>
                                        @endforeach
                                    </p></li>
                                <li class="star"><a href="#"><img class="vote-star" src="{{ url('images/star.png') }}" alt="{{ $movie->name }} 4 stars"></a></li>
                                <li><a class="button bt1" href="{{ url('play/'.$movie->slug) }}" target="_blank">Play</a><a class="button bt1" href="#">Trailer</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="art-content">
                    <section id="trailer">
                        @if(!empty($movie->trailer))
                            <iframe width="560" height="315" src="{{ $movie->trailer }}" frameborder="0" allowfullscreen></iframe>
                            @endif
                    </section>
                    @if(isset($movie->movieimages))
                    @foreach($movie->movieimages as $img)
                        <div class="load-image-1">

                        </div>
                        @endforeach
                    @endif
                    <p class="detail-info-movie">{{ !empty($movie->detail)? $movie->detail:'No detail provided' }}</p>
                    <div class="clear"></div>
                </div>
            </article>
            <div class="widget wid-related">
                <div class="wid-header">
                    <h5>Related Post</h5>
                </div>
                <div class="wid-content">
                    <div class="row">
                        <div class="col-1-3">
                            <div class="wrap-col">
                                <a href="#"><img src="images/10.jpg"></a>
                                <p>IMDB: 8.5</p>
                                <a href="#"><img class="vote-star" src="images/star.png" alt="Film_Name 4 stars"></a>
                            </div>
                        </div>
                        <div class="col-1-3">
                            <div class="wrap-col">
                                <a href="#"><img src="images/13.jpg"></a>
                                <p>IMDB: 8.5</p>
                                <a href="#"><img class="vote-star" src="images/star.png" alt="Film_Name 4 stars"></a>
                            </div>
                        </div>
                        <div class="col-1-3">
                            <div class="wrap-col">
                                <a href="#"><img src="images/6.jpg"></a>
                                <p>IMDB: 8.5</p>
                                <a href="#"><img class="vote-star" src="images/star.png" alt="Film_Name 4 stars"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection