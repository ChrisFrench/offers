a:3:{i:0;s:2521:"(function($){$.fn.extend({alphascroll:function(){return this.each(function(){var content=$(this),alphabet=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'],shortAlphabet=['a','d','g','j','m','p','s','w','z'],dividers=[],dividerClass,scrollbar='';$(content).find('.ui-li-divider').each(function(){dividerClass=$(this).html().toLowerCase();dividers.push(dividerClass);$(this).addClass(dividerClass);});function createScrollbar(){$(alphabet).each(function(index,value){if($.inArray(value,dividers)>-1){scrollbar+='<li id="alphascroll-'+value+'" class="alphascroll-item" unselectable="on">'+value.toUpperCase()+'</li>';}else{scrollbar+='<li id="alphascroll-'+value+'" unselectable="on">'+value.toUpperCase()+'</li>';}});$(content).wrap('<div />');var wrapper=$(content).parent();$(wrapper).prepend('<ul class="alphascroll">'+scrollbar+'</ul>');var alphascroll=$(content).closest('div').children('.alphascroll');$(alphascroll).live('touchmove',function(event){event.preventDefault();var touch=event.originalEvent.touches[0]||event.originalEvent.changedTouches[0];alphaScroll(touch.pageY);console.log('scroll!');});$(alphascroll).live('mousedown',function(){$('.ui-page-active').bind('mousemove',function(event){$(this).css({"-webkit-user-select":"none","-moz-user-select":"none","-ms-user-select":"none","user-select":"none"});alphaScroll(event.pageY);});$('.ui-page-active').live('mouseup',function(){$('.ui-page-active').unbind('mousemove');$(this).css({"-webkit-user-select":"text","-moz-user-select":"text","-ms-user-select":"text","user-select":"text"});});});if($(window).height()<=320){truncateScrollbar();}}$(window).bind('orientationchange',function(){if($('.alphascroll').length>0){$('.alphascroll').unwrap().remove();scrollbar='';createScrollbar();}});function truncateScrollbar(){$('.alphascroll li').each(function(index,value){if($.inArray($(this).html().toLowerCase(),shortAlphabet)<0){$(this).html('&#183;').addClass('truncated');}});}function alphaScroll(y){$('.alphascroll-item').each(function(){if(!(y<=$(this).offset().top||y>=$(this).offset().top+$(this).outerHeight())){var scroll_id=$(this).attr('id'),letter=scroll_id.split('-'),target=$('.'+letter[1]),position=target.position(),header_height;if($('.ui-page-active [data-role="header"]').hasClass('ui-fixed-hidden')){header_height=0;}else{header_height=$('.ui-page-active [data-role="header"]').height();}$.mobile.silentScroll(position.top-header_height);}});}createScrollbar();});}});})(jQuery);";i:1;d:1391716837.0862529277801513671875;i:2;i:0;}