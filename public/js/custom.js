$(function(){
	if(window.innerWidth > 992){
		$('.menu .wrap-nav .sub-menu-item').hover(function(){
			$('.sub-menu').slideDown();
		});
		$('.sub-menu').mouseleave(function(){
			$(this).slideUp();
		});
	}
	
	$("#shadow").css("height", $(document).height()).hide();
    $(".lightSwitcher").click(function(){
        $("#shadow").toggle();
        if ($("#shadow").is(":hidden"))
            $(this).html('<i class="fa fa-lightbulb-o"></i> Turn off the lights').removeClass("turnedOff");
        else
            $(this).html('<i class="fa fa-lightbulb-o"></i> Turn on the lights').addClass("turnedOff");
    });
	$("#Glide").glide({
        type: "carousel"
    });
	
	/*menu-server*/
	$('.menu-server .play-server2').click(function(){
		document.getElementById('frame-player').src = 'https://redirector.googlevideo.com/videoplayback?requiressl=yes&id=198858db88f52ad5&itag=22&source=webdrive&ttl=transient&app=texmex&ip=2a05:840::e098&ipbits=32&expire=1468647885&sparams=requiressl%2Cid%2Citag%2Csource%2Cttl%2Cip%2Cipbits%2Cexpire&signature=86C1E629C9D43BA05C6FE42803566F1893D13621.326AAA76323BE3C771F6F93C7AFD1760BCD85B61&key=ck2&mm=30&mn=sn-5hne6n7z&ms=nxu&mt=1468632808&mv=u&nh=IgpwcjA0LmFtczE1KgkxMjcuMC4wLjE&pl=48';
	});
	$('.menu-server .play-server1').click(function(){
		document.getElementById('frame-player').src = 'https://redirector.googlevideo.com/videoplayback?requiressl=yes&id=198858db88f52ad5&itag=22&source=webdrive&ttl=transient&app=texmex&ip=2a05:840::e098&ipbits=32&expire=1468647885&sparams=requiressl%2Cid%2Citag%2Csource%2Cttl%2Cip%2Cipbits%2Cexpire&signature=86C1E629C9D43BA05C6FE42803566F1893D13621.326AAA76323BE3C771F6F93C7AFD1760BCD85B61&key=ck2&mm=30&mn=sn-5hne6n7z&ms=nxu&mt=1468632808&mv=u&nh=IgpwcjA0LmFtczE1KgkxMjcuMC4wLjE&pl=48';
	});
	
});
$( window ).scroll(function() {
  /*fix menu*/
	if($(window).scrollTop()>250){
		$('#menu-top').addClass('fix-menu-top');
	}
	else{
		$('#menu-top').removeClass('fix-menu-top');
	}
});