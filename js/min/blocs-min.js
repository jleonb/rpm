function getHeroHeight(){var t=$(window).height();return t<heroBodyH&&(t=heroBodyH+100),t}function checkHero(){$("#hero-bloc").length&&(P=2*parseInt($(".hero-nav").css("padding-top")),window.heroBodyH=$(".hero-nav").outerHeight()+P+$(".vc-content").outerHeight()+50,$(".hero").css("height",getHeroHeight()+"px"))}function scrollToTarget(t){1==t?t=0:2==t?t=$(document).height():(t=$(t).offset().top,$(".sticky-nav").length&&(t-=100)),$("html,body").animate({scrollTop:t},"slow")}function animateWhenVisible(){hideAll(),inViewCheck(),$(window).scroll(function(){inViewCheck(),scrollToTopView(),stickyNavToggle()})}function stickyNavToggle(){var t=0,o="sticky";$(".sticky-nav").parent().is("#hero-bloc")&&(t=$(".sticky-nav").height(),o="sticky animated fadeInDown"),$(window).scrollTop()>t?($(".sticky-nav").addClass(o),"sticky"==o&&$(".page-container").css("padding-top",$(".sticky-nav").height())):($(".sticky-nav").removeClass(o),$(".page-container").removeAttr("style"))}function hideAll(){$(".animated").each(function(t){$(this).closest(".hero").length||$(this).removeClass("animated").addClass("hideMe")})}function inViewCheck(){$($(".hideMe").get().reverse()).each(function(t){var o=jQuery(this),i=o.offset().top+o.height(),e=$(window).scrollTop()+$(window).height();if(o.height()>$(window).height()&&(i=o.offset().top),e>i){var a=o.attr("class").replace("hideMe","animated");o.css("visibility","hidden").removeAttr("class"),setTimeout(function(){o.attr("class",a).css("visibility","visible")},.01)}})}function scrollToTopView(){$(window).scrollTop()>$(window).height()/3?$(".scrollToTop").hasClass("showScrollTop")||$(".scrollToTop").addClass("showScrollTop"):$(".scrollToTop").removeClass("showScrollTop")}function setUpLightBox(){window.targetLightbox,$(document).on("click","[data-lightbox]",function(t){t.preventDefault(),targetLightbox=$(this);var o='<p class="lightbox-caption">'+$(this).attr("data-caption")+"</p>";$(this).attr("data-caption")||(o="");var i=$('<div id="lightbox-modal" class="modal fade"><div class="modal-dialog"><div class="modal-content '+$(this).attr("data-frame")+'"><button type="button" class="close close-lightbox" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><div class="modal-body"><a href="#" class="prev-lightbox" aria-label="prev"></a><a href="#" class="next-lightbox" aria-label="next"></a><img id="lightbox-image" class="img-responsive" src="'+$(this).attr("data-lightbox")+'">'+o+"</div></div></div></div>");$("body").append(i),$("#lightbox-modal").modal("show"),0==$("a[data-lightbox]").index(targetLightbox)&&$(".prev-lightbox").hide(),$("a[data-lightbox]").index(targetLightbox)==$("a[data-lightbox]").length-1&&$(".next-lightbox").hide()}).on("hidden.bs.modal","#lightbox-modal",function(){$("#lightbox-modal").remove()}),$(document).on("click",".next-lightbox, .prev-lightbox",function(t){t.preventDefault();var o=$("a[data-lightbox]").index(targetLightbox),i=$("a[data-lightbox]").eq(o+1);$(this).hasClass("prev-lightbox")&&(i=$("a[data-lightbox]").eq(o-1)),$("#lightbox-image").attr("src",i.attr("data-lightbox")),$(".lightbox-caption").html(i.attr("data-caption")),targetLightbox=i,$(".next-lightbox, .prev-lightbox").hide(),$("a[data-lightbox]").index(i)!=$("a[data-lightbox]").length-1&&$(".next-lightbox").show(),$("a[data-lightbox]").index(i)>0&&$(".prev-lightbox").show()})}$(window).load(function(){checkHero(),animateWhenVisible()}),$(document).ready(function(){$(".hero").css("height",$(window).height()+"px"),$("#scroll-hero").click(function(){$("html,body").animate({scrollTop:$("#hero-bloc").height()},"slow")}),setUpLightBox()}),$(window).resize(function(){$(".hero").css("height",getHeroHeight()+"px")}),$(function(){$('[data-toggle="tooltip"]').tooltip()});