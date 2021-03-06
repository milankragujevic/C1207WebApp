/**
 * Created by Viet Bac on 7/21/2016.
 */
function ajaxGetContent(e) {
    console.log(e);
    $.ajax({
        url:"ajax/movie/"+e,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            var html = '';
            html += '<div class="row">';
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
                case "feature":
                    html += '<li class="active"><a onclick="ajaxGetContent(\'feature\')" id="feature">Featured</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'toptoday\')" id="toptoday">Top viewed today</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topmonth\')" id="topmonth">Top Month</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topweek\')" id="topweek">Top Rating</a></li>';
                    break;
                case "toptoday":
                    html += '<li><a onclick="ajaxGetContent(\'feature\')" id="feature">Featured</a></li>';
                    html += '<li class="active"><a onclick="ajaxGetContent(\'toptoday\')" id="toptoday">Top viewed today</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topmonth\')" id="topmonth">Top Month</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topweek\')" id="topweek">Top Rating</a></li>';
                    break;
                case "topmonth":
                    html += '<li><a onclick="ajaxGetContent(\'feature\')" id="feature">Featured</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'toptoday\')" id="toptoday">Top viewed today</a></li>';
                    html += '<li class="active"><a onclick="ajaxGetContent(\'topmonth\')" id="topmonth">Top Month</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topweek\')" id="topweek">Top Rating</a></li>';
                    break;
                case "topweek":
                    html += '<li><a onclick="ajaxGetContent(\'feature\')" id="feature">Featured</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'toptoday\')" id="toptoday">Top viewed today</a></li>';
                    html += '<li><a onclick="ajaxGetContent(\'topmonth\')" id="topmonth">Top Month</a></li>';
                    html += '<li class="active"><a onclick="ajaxGetContent(\'topweek\')" id="topweek">Top Rating</a></li>';
                    break;
            }
            html += '</ul>';
            html += '</div>';
            html += '</div>';
            var i=1;
            $.each(result, function (key, item) {
                if ((i===1) || (i===7)) {
                    html += '<div class="row" id="suggestion-content">';
                }
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
                if (i===6) {
                    html += '</div>';
                }
                i++;
            });
            if (i!=7) {
                html += '</div>';
            }
            $('.suggestion').html(html);
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
                success: function (result) {
                    if (result.length === 1 && result[0].length === 0) {
                        $("#suggesstion-box").hide();
                    } else {
                        $("#suggesstion-box").show();
                        var html = '';
                        html += '<ul id="film-list">';
                        $.each(result, function (key, item) {
                            html += '<a href="/movie/' + item['slug'] + '"><li onClick="selectFilm(\'' + item['name'] + '\');">' + item['name'] + '</li></a>';
                        });
                        html += '</ul>';
                        $("#suggesstion-box").html(html);
                        $("#search-box").css("background", "#FFF");
                        $("#suggesstion-box").css("background-color", "#FFF");
                        $("#suggesstion-box").css("position", "absolute");
                        $("#suggesstion-box").css("z-index", "999");
                        $("#suggesstion-box").css("width", "290px");
                        $("#suggesstion-box").css("font", "14px Arial, Helvetica, Sans-serif");
                        $("#suggesstion-box").css("color", "#777");
                        $("#suggesstion-box").css("padding", "5px");
                        $("#suggesstion-box").css("border-radius", "5px");
                    }
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