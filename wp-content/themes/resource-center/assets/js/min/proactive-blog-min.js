!function($){$(function(){$("#modal-1").on("change",function(){$(this).is(":checked")?$("body").addClass("modal-open"):$("body").removeClass("modal-open")}),$(".modal-fade-screen, .modal-close").on("click",function(){$(".modal-state:checked").prop("checked",!1).change()}),$(".modal-inner").on("click",function(e){e.stopPropagation()})});var e=$(".grid").isotope({itemSelector:".grid-item",percentPosition:!0,masonry:{columnWidth:".grid-sizer",gutter:35}});$(".filters-button-group").on("click","button",function(){var t=$(this).attr("data-filter");e.isotope({filter:t})}),$(".button-group").each(function(e,t){var o=$(t);o.on("click","button",function(){o.find(".is-checked").removeClass("is-checked"),$(this).addClass("is-checked")})}),$(window).on("scroll",function(){$(window).scrollTop()>50?($(".site-header").addClass("site-header-active"),$(".site-branding img").attr("src","/wp-content/themes/resource-center/assets/img/proactive-logo.svg")):($(".site-header").removeClass("site-header-active"),$(".site-branding img").attr("src","/wp-content/themes/resource-center/assets/img/proactive-logo-white.svg"))})}(jQuery);