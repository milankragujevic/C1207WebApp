<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="en">
<![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en">
<![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en">
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <!-- Basic Page Needs
       ================================================== -->
    <meta charset="utf-8">
    <title>Smovies.tv | Watch Free @yield('title') Movies Online</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="index,follow">
    <meta http-equiv="content-language" content="vi">
    <meta name="referrer" content="no-referrer">
    <meta name="description" content="Free HD movies online & tv series online and Download the latest movies without Registration at Smovies.tv">
    <meta name="keywords" content="free movie, free movies online, Free HD movies, watch hd movies, watch tv series, watch free movies online, hot movies, new movies">
    <!-- Mobile Specific Metas
       ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-title" content="Free HD movies online & tv series online without Registration at Smovies.tv">
    <meta name="application-name" content="Free HD movies online & tv series online without Registration at Smovies.tv">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('/images/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.ico') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Watch Free Movies & TV Series Online | Smovies.tv">
    <meta property="og:url" content="http://smovies.tv/">
    <meta property="og:image" content="images/maxresdefault.jpg">
    <meta property="og:description" content="Free HD movies online & tv series online and Download the latest movies without Registration at Smovies.tv">
    <meta property="og:site_name" content="smovies.tv">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS
       ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5.js')}}"></script>
    <script src="{{ asset('js/css3-mediaqueries.js')}}"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('css/glide.core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glide.theme.css') }}">
</head>
<body>
<div class="wrap-body">
    <!--////////////////////////////////////Header-->
    <header>
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <ul>
                            <li class="mail">
                                <i class="fa fa-envelope-o"></i>
                                <p><a href="mailto:contact@smovies.tv">contact@smovies.tv</a></p>
                            </li>
                        </ul>
                        <h1>Watch Free Movies & TV Series Online</h1>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="language">
                            <ul>
                                <li><a target="_blank" class="img-fb" href="https://www.facebook.com/Smovies.tv"><img alt="Follow us on Facebook" title="Follow us on Facebook" src="{{ asset('/images/facebook-fanpage-smovies.tv.png') }}" ></a></li>
                                <li>
                                    <p>Language</p>
                                </li>
                                <li>
                                    <select>
                                        <option value="en" selected>English</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div id="logo">
                            <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" alt="Logo Smovies.tv"/></a></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="pull-right">
                            <form method="get" action="{{ url('/search') }}" id="search"  >
                                <input id="search-box" name="query" type="text" size="40" placeholder="Search movie name, actor..." />
                                <input type="submit" value="Search">
                                <!-- Khung hien thi phan search -->
                                <div id="suggesstion-box"></div>
                            </form>
                            <a class="movies-request" href="{{ url('/request-movie') }}" title="Send movies request please!">Movies Request<i class="fa fa-pencil"></i></a>
                        </div>
                    </div>
                </div>
                <div id="menu-top" class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="http://smovies.tv">MENU</a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="{{ Request::is('/')?'active':'' }}"><a href="{{  url('/') }}">Home</a></li>
                                    <li class="{{ Request::is('cinema')?'active':'' }}"><a href="{{ url('/cinema') }}">Cinema Movies</a></li>
                                    <li class="{{ Request::is('tvseries')?'active':'' }}"><a href="{{ url('/tvseries') }}">TV Series</a></li>
                                    <li class="{{ Request::is('latestmovie')?'active':'' }}"><a href="{{ url('/latestmovie') }}">Latest Movies</a></li>
                                    <li class="{{ Request::is('topimdb')?'active':'' }}"><a href="{{ url('/topimdb') }}">Top IMDB</a></li>
                                    <li class="dropdown {{ Request::is('genre/*')?'active':'' }}" >
                                        <a href="javascrip:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Genres<i class="fa fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('/genre/action') }}">Action</a></li>
                                            <li><a href="{{ url('/genre/horror') }}">Horror</a></li>
                                            <li><a href="{{ url('/genre/war') }}">War</a></li>
                                            <li><a href="{{ url('/genre/Western') }}">Western</a></li>
                                            <li><a href="{{ url('/genre/Adventure') }}">Adventure</a></li>
                                            <li><a href="{{ url('/genre/sci-fi') }}">Sci-Fi</a></li>
                                            <li><a href="{{ url('/genre/drama') }}">Drama</a></li>
                                            <li><a href="{{ url('/genre/comedy') }}">Comedy</a></li>
                                            <li><a href="{{ url('/genre/romance') }}">Romance</a></li>
                                            <li><a href="{{ url('/genre/Animation') }}">Animation</a></li>
                                            <li><a href="{{ url('/genre/Sport') }}">Sport</a></li>
                                            <li><a href="{{ url('/genre/Musical') }}">Musical</a></li>
                                            <li><a href="{{ url('/genre/Talk-Showmas') }}">Talk-Show</a></li>
                                            <li><a href="{{ url('/genre/Reality-TV') }}">Reality-TV</a></li>
                                            <li><a href="{{ url('/genre/Documentary') }}">Documentary</a></li>
                                            <li><a href="{{ url('/genre/Biography') }}">Biography</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown {{ Request::is('country/*')?'active':'' }}">
                                        <a href="javascrip:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Country<i class="fa fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('/country/asia') }}">Asia</a></li>
                                            <li><a href="{{ url('/country/china') }}">China</a></li>
                                            <li><a href="{{ url('/country/france') }}">France</a></li>
                                            <li><a href="{{ url('/country/hongkong') }}">HongKong</a></li>
                                            <li><a href="{{ url('/country/india') }}">India</a></li>
                                            <li><a href="{{ url('/country/japan') }}">Japan</a></li>
                                            <li><a href="{{ url('/country/korea') }}">Korea</a></li>
                                            <li><a href="{{ url('/country/taiwan') }}">Taiwan</a></li>
                                            <li><a href="{{ url('/country/thailand') }}">Thailand</a></li>
                                            <li><a href="{{ url('/country/UK') }}">United Kingdom</a></li>
                                            <li><a href="{{ url('/country/USA') }}">United States</a></li>
                                            <li><a href="{{ url('/country/other') }}">Other</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                            <!-- /.container-fluid-fluid -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('banner-index-only')
</div>
@yield('content')
@include('sidebar')
<!--////////////////////////////////////Footer-->
<footer>
    <div class="top-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="widget wid-about">
                        <div class="wid-header">
                            <h5>Welcome</h5>
                        </div>
                        <div class="logo"><a href="http://smovies.tv"><img src="{{ asset('images/logo.png') }}" alt="Logo Smovies.tv"/></a></div>
                        <p>Smovies.tv is the best movie site, where you can watch free movies online & tv series online and download the latest movies without registration. No surveys and only instant streaming of movies. The latest movies and highest quality for you. Enjoy your favorite movies with smovies.tv</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="widget wid-meta">
                        <div class="wid-header">
                            <h5>Quick Links</h5>
                        </div>
                        <div class="widget-content">

                            <ul>
                                <li><a href="{{ url('/') }}">> Home </a></li>
                                <li><a href="{{ url('/latestmovie') }}">> Watch free movies online </a></li>
                                <li><a href="{{ url('/latestseries') }}">> Watch free tv-series online </a></li>
                                <li><a href="{{ url('/dmca') }}">> DMCA </a></li>
                                <li><a href="{{ url('/ads') }}">> Advertising </a></li>
                                <li><a href="{{ url('/request-movie') }}">> Movies Request </a></li>
                                <li><a href="{{ url('/contact') }}">> Contact </a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="widget wid-report">
                        <div class="wid-header">
                            <h5>Disclaimer</h5>
                        </div>
                        <div class="wid-content">
                            <p>Disclaimer: Smovies.tv is absolutely legal and contain only links to other sites on the Internet : (dailymotion.com, filefactory.com, myspace.com, mediafire.com, sevenload.com, zshare.net, stage6.com, tudou.com, crunchyroll.com, veoh.com, peteava.ro, 2shared.com, 4shared.com, uploaded.net, youku.com, youtube.com and many others… ) We do not host or upload any video, films, media files (avi, mov, flv, mpg, mpeg, divx, dvd rip, mp3, mp4, torrent, ipod, psp), Smovies.tv is not responsible for the accuracy, compliance, copyright, legality, decency, or any other aspect of the content of other linked sites. If you have any legal issues please contact the appropriate media file owners or host sites.
                                <br/>
                                Disclaimer: This site does not store any files on its server. All contents are provided by non-affiliated third parties.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="widget wid-meta">
                        <div class="wid-header">
                            <h5>Follow Us Facebook</h5>
                        </div>
                        <div class="widget-content">

                            <div class="fb-page"
                                 data-href="https://www.facebook.com/Smovies.tv"
                                 data-width="340"
                                 data-hide-cover="false"
                                 data-show-facepile="true"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright">
                        <p>Copyright © 2016. All Rights Reserved - <a href="http://smovies.tv">Smovies.tv</a></p>
                        <div class="back-to-top"><a href="#logo"><img src="{{ asset('/images/Back-To-Top.png') }}" alt="Back to top Smovies.tv" title="Back to top Smovies.tv"/></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="last-footer">
        <h6>Watch Free Movies Online & TV Series Online at Smovies.tv</h6>
    </div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=503333826533478";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-81337315-1', 'none');
        ga('send', 'pageview');

    </script>
</footer>
</div>
<div id="shadow"></div>
<script src="{{ asset('js/css3-mediaqueries.js') }}"></script>
<script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/glide.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/custom.ajax.js') }}"></script>
</body>
</html>
</html>