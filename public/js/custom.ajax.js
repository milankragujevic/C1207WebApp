/**
 * Created by Viet Bac on 7/21/2016.
 */
function ajaxGetContent(e) {
    $.ajax({
        url:"ajax/movie/feature",
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            var html = '';
            html += '<div class="suggestion">';
            html += '        <div class="row">';
            html += '<div class="title">';
            html += '<center>';
            html += '<h2>SUGGESTION</h2>';
            html += '</center>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
            html += '<ul class="nav nav-pills">';
            switch (e) {
                case "featured":
                    html += '<li class="active"><a onclick="ajaxGetContent(\'featured\')" id="featured">Featured</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topToday\')" id="topToday">Top viewed today</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'mostFavorite\')" id="mostFavorite">Most Favorite</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topRat\')" id="topRat">Top Rating</a></li>';
                    break;
                case "topToday":
                    html += '<li><a onclick="ajaxGetContent(\'featured\')" id="featured">Featured</a></li>';
                    html += '<li class="active"><a onclick="ajaxGetContent(\'topToday\')" id="topToday">Top viewed today</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'mostFavorite\')" id="mostFavorite">Most Favorite</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topRat\')" id="topRat">Top Rating</a></li>';
                    break;
                case "mostFavorite":
                    html += '<li><a onclick="ajaxGetContent(\'featured\')" id="featured">Featured</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topToday\')" id="topToday">Top viewed today</a></li>';
                    html += '<li class="active"><a onclick="ajaxGetContent(\'mostFavorite\')" id="mostFavorite">Most Favorite</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topRat\')" id="topRat">Top Rating</a></li>';
                    break;
                case "topRat":
                    html += '<li><a onclick="ajaxGetContent(\'featured\')" id="featured">Featured</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topToday\')" id="topToday">Top viewed today</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'mostFavorite\')" id="mostFavorite">Most Favorite</a></li>';
                    html += '<li class="active"><a onclick="ajaxGetContent(\'topRat\')" id="topRat">Top Rating</a></li>';
                    break;
            }
            html += '</ul>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row" id="suggestion-content">';
            $.each(result, function (key, item) {
                html += '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">';
                html += '<div class="post">';
                html += '<div class="view effect">';
                html += '<img class="thumb" src="images/poster/'+ item['poster'] +'" alt="Watch Free Film_Name Online" title="Watch Free Film_Name Online"/>';
                html += '<div class="mask">';
                html += '<a href="/movie/'+item['slug']+'" class="info" title="Click to watch free Film_Name online"><img src="images/play_button_64.png" alt="Click to watch free Film_Name online"/></a>';
                html += '</div>';
                html += '</div>';
                html += '<div class="clear"></div>';
                html += '<a href="/movie/'+item['slug']+'">';
                html += '<h3>'+item['name']+'</h3>';
                html += '</a>';
                html += '<div class="please-vote-star">';
                html += '<i class="fa fa-star"></i>';
                html += '<i class="fa fa-star"></i>';
                html += '<i class="fa fa-star"></i>';
                html += '<i class="fa fa-star"></i>';
                html += '<i class="fa fa-star"></i>';
                html += '</div>';
                html += '<span>IMDB: '+item['rating']+'</span>';
                html += '</div>';
                html += '</div>';
            });
            html += '</div>';
            $('#main-content').html(html);
        }
    });
}
$(document).ready(function(){
    $("#search-box").keyup(function(){
        if ($(this).val()!='') {
            $.ajax({
                type: 'GET',
                url: 'ajax/search/' + $(this).val(),
                dataType: 'json',
                beforeSend: function () {
                    $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function (result) {
                    $("#suggesstion-box").show();
                    var html = '';
                    html += '<ul id="film-list">';
                    $.each(result, function (key, item) {
                        html += '<li onClick="selectFilm(\'' + item['name'] + '\');"><a href="/movie/'+item['slug']+'">' + item['name'] + '</a></li>';
                    });
                    html += '</ul>';
                    $("#suggesstion-box").html(html);
                    $("#search-box").css("background", "#FFF");
                }
            });
        } else {
            $("#suggesstion-box").hide();
        }
    });
});

function selectFilm(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
}