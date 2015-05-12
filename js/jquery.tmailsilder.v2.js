(function($) {
	$.fn.Z_TMAIL_SIDER_V2 = function(options) {
		var opts = $.extend( {}, $.fn.Z_TMAIL_SIDER_V2.defaults, options);
		var base = this;
		var thisTitle = $(base).find('.allcategorys');
		var Z_SubList = $(base).find('.sublist');
		if($(base).offset() == undefined){
			return false;
		}
		var navPosTop = $(base).offset().top;
		var timeOut = null;

		$(thisTitle).find('.title-item-hd a').hover(function(e) {
			clearTimeout(timeOut);
			var thisLi = this;
			if($(Z_SubList).is(':visible')) return;
			showSubList(thisLi);
			e.stopPropagation();
		}, function(e) {
			var thisLi = this;
			timeOut = setTimeout(function() {
				hideSubList(thisLi);
			}, 100);
			
			$(Z_SubList).hover(function(e){
				clearTimeout(timeOut);
			}, function() {
				clearTimeout(timeOut);
				timeOut = setTimeout(function() {
					hideSubList(thisLi);
				}, 100);
			});
			e.stopPropagation();
		});
		
		var showSubList = function(thisli) {
			var top = $(thisli).height() - opts.slideHeight;
			$(thisli).addClass('curr').find('s').addClass('curr');
			$(Z_SubList).css({top: top, opacity: 0}).show().stop().animate({top: $(thisli).height(), opacity : 1});
		};
		
		var hideSubList = function(thisli) {
			$(thisli).removeClass('curr').find('s').removeClass('curr');
			$(Z_SubList).hide();
		};
		
		$(window).resize(function() {
			var sTop = $(window).scrollTop();
			
			if(sTop >= navPosTop) {
				if($.browser.msie && $.browser.version < 7){
					$(base).css({position: 'absolute', top: sTop});
				}else {
					// $(base).css({position: 'fixed', top: 0});
				}
			}else {
				$(base).css({position: 'relative', top: 0});
			}
		});
		
		$(window).scroll(function() {
			var sTop = $(window).scrollTop();
			
			if(sTop >= navPosTop) {
				if($.browser.msie && $.browser.version < 7){
					$(base).css({position: 'absolute', top: sTop});
				}else {
					// $(base).css({position: 'fixed', top: 0});
				}
			}else {
				$(base).css({position: 'relative', top: 0});
			}
		});
	};
	
	$.fn.Z_TMAIL_SIDER_V2.defaults = {
		slideHeight : 8
	};
})(jQuery);