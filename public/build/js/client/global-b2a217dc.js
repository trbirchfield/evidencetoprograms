!function(){for(var e,n=function(){},o=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],t=o.length,i=window.console=window.console||{};t--;)e=o[t],i[e]||(i[e]=n)}(),function(e){e.growl=function(n){var o={title:"Please enter a title.",message:"Please enter a message.",type:"",target:".growls"},t=e.extend({},o,n||{}),i=e("<li></li>").addClass("growl").addClass(t.type),s=e("<div></div>").addClass("growl-title").html(t.title),a=e("<div></div>").addClass("growl-message").html(t.message);i.on("click",function(){e(this).remove()}),e(t.target).append(i.append(s).append(a))},e.fn.growl=function(){this.find(".growl:not([ng-click])").on("click",function(){e(this).remove()})}}(jQuery),$(document).foundation(),$(".growls").growl(),function(e){function n(){e(window).width()>800?e("#header").addClass("fade"):e("#header").removeClass("fade")}function o(){var n;e(window).width()>800&&(n=e(this).scrollTop(),e(".welcome").css({opacity:1-n/300}))}function t(){var n=e(window).height()-i;e(".info-menu-horizontal").css("height",n),e(".info-menu-bottom").css("bottom",-1*n),e(".info-menu-bottom2").css("bottom",-1*n),e(".info-menu-open").css("bottom",0)}n(),e(".scroll").localScroll(),e(window).on("scroll",function(){o()}),e(".news-carousel").slick({prevArrow:'<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',nextArrow:'<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>'}),e(".accordion").on("click","dd > a",function(n){n.preventDefault(),e(this).siblings(".content").slideToggle(300),e(this).parent().hasClass("active")?e(this).parent().removeClass("active"):e(this).parent().addClass("active")}),e(".toggle-all > a").on("click",function(n){n.preventDefault(),e(this).hasClass("active")?(e(".accordion-navigation").removeClass("active"),e(".accordion-navigation .content").slideUp(300),e(this).text("[ Open All ]"),e(this).removeClass("active")):(e(".accordion-navigation").addClass("active"),e(".accordion-navigation .content").slideDown(300),e(this).text("[ Close All ]"),e(this).addClass("active"))}),e(document).on("ready",function(){e("#selection-door .accordion").on("click",function(n){n.preventDefault(),e(this).closest("li").find(".content").not(":animated").slideToggle(),e(this).toggleClass("entry entry-open"),e(".final-marker").toggleClass("final-marker final-marker-extended")}),e("#selection-door .accordion2").on("click",function(n){n.preventDefault(),e(this).closest("li").find(".content").not(":animated").slideToggle(),e(this).toggleClass("entry entry-open"),e(".marker-end").toggleClass("marker-end marker-end-extended"),e(this).toggleClass("green green-no-margin")})});var i=e(".document header").height();t(),e(window).on("resize",function(){t(),n()});var s=e("#info-menu-tc"),a=e("#info-menu-btn"),l=e("#info-menu-gt"),c=e("#info-menu-btn2");a.on("click",function(n){n.preventDefault(),e(".info-menu-bottom").css("bottom",-1*(e(window).height()-i)),e("#info-menu-gt").removeClass("info-menu-open"),classie.toggle(this,"active"),classie.toggle(s[0],"info-menu-open"),e(".info-menu-open").css("bottom",0)}),c.on("click",function(n){n.preventDefault(),e(".info-menu-bottom").css("bottom",-1*(e(window).height()-i)),e("#info-menu-tc").removeClass("info-menu-open"),classie.toggle(this,"active"),classie.toggle(l[0],"info-menu-open"),e(".info-menu-open").css("bottom",0)})}(jQuery);