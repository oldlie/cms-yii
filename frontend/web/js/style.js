$(function(){
	$(".fullSlide").hover(function(){
		    $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
		},
		function(){
		    $(this).find(".prev,.next").fadeOut()
		});
	$(".fullSlide").slide({
	    titCell: ".hd ul",
	    mainCell: ".bd ul",
	    effect: "fold",
	    autoPlay: true,
	    autoPage: true,
	    trigger: "click",
	    startFun: function(i) {
	        var curLi = jQuery(".fullSlide .bd li").eq(i);
	        if ( !! curLi.attr("_src")) {
	            curLi.css("background-image", curLi.attr("_src")).removeAttr("_src");
	            curLi.css("background-position","center center");
	        }
	    }
	});
	// 提货三步骤
	$("#stepBtn01").click(function(){
		$(this).parent("li").css('display','none');
		$(".stepCon02").css("display","block");
		$(".steptit .step02 a").addClass("backpos").parent().siblings().children().removeClass("backpos");
	})
	$("#stepBtn02").click(function(){
		$(this).parent("li").css('display','none');
		$(".stepCon03").css("display","block");
		$(".steptit .step03 a").addClass("backpos").parent().siblings().children().removeClass("backpos");
	})

})