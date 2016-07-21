<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title','Home - Smovies.tv | Watch Free Movies & TV Series Online')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noindex,nofollow">
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
    <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ url('images/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ url('images/favicon.ico') }}">


    <meta property="og:type" content="website">
    <meta property="og:title" content="Watch Free Movies & TV Series Online | Smovies.tv">
    <meta property="og:url" content="http://smovies.tv/">
    <meta property="og:image" content="images/maxresdefault.jpg">
    <meta property="og:description" content="Free HD movies online & tv series online and Download the latest movies without Registration at Smovies.tv">
    <meta property="og:site_name" content="smovies.tv">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="{{ url('css/zerogrid.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/responsive.css') }}">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="{{ url('js/html5.js')}}"></script>
    <script src="{{ url('js/css3-mediaqueries.js') }}"></script>
    <![endif]-->

</head>
<body>
<div class="wrap-body">

    <!--////////////////////////////////////Header-->
    <header>
        <div class="top-bar">
            <div class="wrap-top zerogrid">
                <div class="row">
                    <div class="col-1-2">
                        <div class="wrap-col">
                            <ul>
                                <li class="mail"><p>smovies.tv@gmail.com</p></li>
                            </ul>
                            <br/>
                            <h1>Watch Free Movies & TV Series Online</h1>
                        </div>
                    </div>
                    <div class="col-1-2">
                        <div class="wrap-col f-right">
                            <ul>
                                <li><select>
                                        <option value="en" selected>English</option>
                                    </select></li>
                                <li><p>Language</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-header zerogrid">
            <div class="row">
                <div class="col-1-2">
                    <div class="wrap-col" id="logo">
                        <div class="logo"><a href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}" alt="Logo Smovies.tv"/></a></div>
                    </div>
                </div>
                <div class="col-1-2">
                    <div class="wrap-col f-right">
                        <form method="get" action="/search" id="search"  >
                            <input name="q" type="text" size="40" placeholder="Search movie name, actor..." />
                            <input type="submit" value="Submit">
                        </form>
                        <a class="movies-request" href="movies-request.html" title="Send movies request please!">Movies Request<img class="movies-request-icon" src="{{ url('images/movies-request-icon.png') }}" alt="Movies request icon"/></a>
                    </div>
                </div>
            </div>
            <div class="row" id="menu-top">
                <div class="menu">
                    <nav>
                        <div class="wrap-nav">
                            <ul>
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="cinema-movies.html">Cinema Movies</a></li>
                                <li><a href="{{ url('latestseries') }}">TV Series</a></li>
                                <li><a href="{{ url('latestmovie') }}">Latest Movies</a></li>
                                <li><a href="movie-detail.html">Top IMDB</a></li>
                                <li class="sub-menu-item"><a href="javascrip:void(0);">Genres<img class="show-sub-menu-icon" src="{{ url('images/show-sub-menu-icon.png') }}" alt="Show more Genres Movie"/></a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="sub-menu">
                    <ul>
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Horror</a></li>
                        <li><a href="#">War</a></li>
                        <li><a href="#">Western</a></li>
                        <li><a href="#">Adventure</a></li>
                        <li><a href="#">Sci-Fi</a></li>
                        <li><a href="#">Drama</a></li>
                        <li><a href="#">Comedy</a></li>
                        <li><a href="#">Romance</a></li>
                        <li><a href="#">Animation</a></li>
                        <li><a href="#">Sport</a></li>
                        <li><a href="#">Musical</a></li>
                        <li><a href="#">Talk-Show</a></li>
                        <li><a href="#">Reality-TV</a></li>
                        <li><a href="#">Documentary</a></li>
                        <li><a href="#">Biography</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    @yield('banner')
    <section id="container">
        <div class="wrap-container zerogrid">
            @yield('maincontent')
            @include('sidebar')
        </div>
    </section>
    <!--////////////////////////////////////Footer-->
    <footer>
        <div class="zerogrid">
            <div class="wrap-footer">
                <div class="row">
                    <div class="col-1-4">
                        <div class="wrap-col">
                            <div class="widget wid-about">
                                <div class="wid-header">
                                    <h5>Welcome</h5>
                                </div>
                                <div class="logo"><a href="http://smovies.tv"><img src="{{ url('images/logo.png') }}" alt="Logo Smovies.tv"/></a></div>
                                <p>Smovies.tv is the best movie site, where you can watch free movies online & tv series online and download the latest movies without registration. No surveys and only instant streaming of movies. The latest movies and highest quality for you. Enjoy your favorite movies with smovies.tv</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-1-4">
                        <div class="wrap-col">
                            <div class="widget wid-meta">
                                <div class="wid-header">
                                    <h5>Quick Links</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="row">
                                        <ul>
                                            <li><a href="index.html">> Home </a></li>
                                            <li><a href="#">> Watch free movies online </a></li>
                                            <li><a href="#">> Watch free tv-series online </a></li>
                                            <li><a href="dmca.html">> DMCA </a></li>
                                            <li><a href="advertising.html">> Advertising </a></li>
                                            <li><a href="movies-request.html">> Movies Request </a></li>
                                            <li><a href="contact.html">> Contact </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1-4">
                        <div class="wrap-col">
                            <div class="widget wid-report">
                                <div class="wid-header">
                                    <h5>Disclaimer</h5>
                                </div>
                                <div class="wid-content">
                                    <p>Disclaimer: Smovies.tv is absolutely legal and contain only links to other sites on the Internet : (dailymotion.com, filefactory.com, myspace.com, mediafire.com, sevenload.com, zshare.net, stage6.com, tudou.com, crunchyroll.com, veoh.com, peteava.ro, 2shared.com, 4shared.com, uploaded.net, youku.com, youtube.com and many others… ) We do not host or upload any video, films, media files (avi, mov, flv, mpg, mpeg, divx, dvd rip, mp3, mp4, torrent, ipod, psp), Smovies.tv is not responsible for the accuracy, compliance, copyright, legality, decency, or any other aspect of the content of other linked sites. If you have any legal issues please contact the appropriate media file owners or host sites.
                                        <br/>
                                        Disclaimer: This site does not store any files on its server. All contents are provided by non-affiliated third parties.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1-4">
                        <div class="wrap-col">
                            <div class="widget wid-meta">
                                <div class="wid-header">
                                    <h5>Follow Us Facebook</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="row">
                                        <div class="fb-page" data-href="https://www.facebook.com/imdb" data-width="340" data-hide-cover="false" data-show-facepile="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="wrap-bottom">
                <div class="copyright">
                    <p>Copyright © 2016. All Rights Reserved - <a href="http://smovies.tv">Smovies.tv</a></p>
                    <div class="back-to-top"><a href="#logo"><img src="{{ url('images/Back-To-Top.png') }}" alt="Back to top Smovies.tv" title="Back to top Smovies.tv"/></a></div>
                </div>
            </div>
        </div>
        <div class="last-footer"><h3>Watch Free Movies Online & TV Series Online at Smovies.tv</h3></div>
    </footer>


</div>
<div id="shadow"></div>
<script src="{{ asset('js/css3-mediaqueries.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/glide.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-578761e96a1a3518"></script>
</body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80907111-1', 'auto');
    ga('send', 'pageview');

</script>
</html>