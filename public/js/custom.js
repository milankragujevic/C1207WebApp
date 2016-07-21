$(function(){
	
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
		document.getElementById('frame-player').src = 'https://redirector.googlevideo.com/videoplayback?requiressl=yes&id=88dd5bd1c35e4774&itag=22&source=webdrive&ttl=transient&app=texmex&ip=2a05:840::e098&ipbits=32&expire=1469025121&sparams=requiressl%2Cid%2Citag%2Csource%2Cttl%2Cip%2Cipbits%2Cexpire&signature=326958655B8B48173A4065F2EE418D65B3ACC80D.B71CD4BD9C96A1376340E7145ADA9B7AB406D503&key=ck2&mm=30&mn=sn-5hne6nl7&ms=nxu&mt=1469010086&mv=u&nh=IgpwcjA0LmFtczE2KgkxMjcuMC4wLjE&pl=48';
	});
	$('.menu-server .play-server1').click(function(){
		document.getElementById('frame-player').src = 'https://redirector.googlevideo.com/videoplayback?requiressl=yes&id=88dd5bd1c35e4774&itag=22&source=webdrive&ttl=transient&app=texmex&ip=2a05:840::e098&ipbits=32&expire=1469025121&sparams=requiressl%2Cid%2Citag%2Csource%2Cttl%2Cip%2Cipbits%2Cexpire&signature=326958655B8B48173A4065F2EE418D65B3ACC80D.B71CD4BD9C96A1376340E7145ADA9B7AB406D503&key=ck2&mm=30&mn=sn-5hne6nl7&ms=nxu&mt=1469010086&mv=u&nh=IgpwcjA0LmFtczE2KgkxMjcuMC4wLjE&pl=48';
	});
	
});
$( window ).scroll(function() {
	if($(window).scrollTop()>500){
		$('footer .back-to-top').show();
	}
	else{
		$('footer .back-to-top').hide();
	}
});