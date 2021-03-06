(function($) {

	$(document).ready( function() {

		$("#block-views-recent-products-block h2.block-title, #block-views-recent-members-block h2.block-title").addClass("lined");
		$(".view-id-members .view-content").addClass("clearfix");

		// slider
		$('.banner').unslider({
			keys: true,
			dots: true
		});


		//prettyPhoto
		$("a[rel^='prettyPhoto'], .prettyPhoto a").prettyPhoto({
			social_tools: false
		});

		// TABS

		(function() {

			$('.b-tabs').on('click', 'li', function() {
				var title  = $(this),
					tab    = title.parent().siblings().children().eq(title.index());

				if (title.parent().parent().hasClass('a-slide')) {
					var curTab = tab.siblings('.active');
					curTab.addClass('cur-tab').siblings().removeClass('cur-tab');
				}

				title.addClass('active').siblings().removeClass('active');
				tab.addClass('active').siblings().removeClass('active');
			});

		}());

		// MESSAGES

		(function() {

			$(document).on('click', '.message-close', function() {
				$(this).parent()
					.animate({'opacity':'0'}, 220, function() {
						$(this).hide(200);
					});
			})

		}());

		// SPOILER 

		$('.spoiler-title').on('click', function() {
			$(this)
				.toggleClass('active')
				.next().slideToggle(250);
		});

		$('.b-accordion .spoiler-title').on('click', function() {
			$(this).parent().siblings()
				.children('.spoiler-title').removeClass('active')
				.next('.spoiler-content').slideUp(250);
		});

		// PROGRESS BAR

		$('.b-progress-bar').each(function() {

			var cap = parseInt($(this).attr('data-capacity'), 10),
				val = parseInt($(this).attr('data-value'), 10),
				len = 100 * (val / cap) + '%';

			$(this).find('.progress-line').css('width', len);

		});

		// TEAM 

		$('.member-photo')
			.on('mouseenter', function() {
				$(this).children('.b-social').stop().fadeIn(200);
			})
			.on('mouseleave', function() {
				$(this).children('.b-social').stop().fadeOut(200);
			});

		$('.b-member.m-compact')
			.on('mouseenter', function() {
				$(this).children('.member-meta').stop().fadeIn(200);
			})
			.on('mouseleave', function() {
				$(this).children('.member-meta').stop().fadeOut(200);
			});

		// PORTFOLIO		

		$('.work-preview a').on('click', function() {
			$(this).parent().trigger('click');
		});

		// CAROUSEL

		$.fn.carousel = function(op) {
			var op, ui = {};

			op = $.extend({
				speed: 500,
				autoChange: false,
				interval: 5000
			}, op);

			ui.carousel = this;
			ui.items    = ui.carousel.find('.carousel-item');
			ui.itemsLen = ui.items.length;

			// CREATE CONTROLS

			ui.ctrl 	= $('<div />', {'class': 'carousel-control'});
			ui.prev 	= $('<div />', {'class': 'carousel-prev'});
			ui.next 	= $('<div />', {'class': 'carousel-next'});
			ui.pagList  = $('<ul />', {'class': 'carousel-pagination'});
			ui.pagItem  = $('<li></li>');

			for (var i = 0; i < ui.itemsLen; i++) {
				ui.pagItem.clone().appendTo(ui.pagList);
			}

			ui.prev.appendTo(ui.ctrl);
			ui.next.appendTo(ui.ctrl);
			ui.pagList.appendTo(ui.ctrl);
			ui.ctrl.appendTo(ui.carousel);

			ui.carousel.find('.carousel-pagination li').eq(0).addClass('active');

			ui.carousel.find('.carousel-item').each(function() {
				$(this).hide();
			});

			ui.carousel.find('.carousel-item').eq(0).show().addClass('active');


			// CHANGE ITEM

			var changeImage = function(direction, context) {
				var current = ui.carousel.find('.carousel-item.active');

				if (direction == 'index') {
					if(current.index() === context.index())
						return false;

					context.addClass('active').siblings().removeClass('active');

					ui.items.eq(context.index()).addClass('current').fadeIn(op.speed, function() {
						current.removeClass('active').hide();
						$(this).addClass('active').removeClass('current');
					});
				}

				if (direction == 'prev') {
					if (current.index() == 0) {
						ui.carousel.find('.carousel-item:last').addClass('current').fadeIn(op.speed, function() {
							current.removeClass('active').hide();
							$(this).addClass('active').removeClass('current');
						});
					}
					else {
						current.prev().addClass('current').fadeIn(op.speed, function() {
							current.removeClass('active').hide();
							$(this).addClass('active').removeClass('current');
						});
					}
				}

				if (direction == undefined) {
					if (current.index() == ui.itemsLen - 1) {
						ui.carousel.find('.carousel-item:first').addClass('current').fadeIn(300, function() {
							current.removeClass('active').hide();
							$(this).addClass('active').removeClass('current');
						});
					}
					else {
						current.next().addClass('current').fadeIn(300, function() {
							current.removeClass('active').hide();
							$(this).addClass('active').removeClass('current');
						});
					}
				}

				ui.carousel.find('.carousel-pagination li').eq( ui.carousel.find('.carousel-item.current').index() ).addClass('active').siblings().removeClass('active');
			};

			ui.carousel
				.on('click', 'li', function() {
					changeImage('index', $(this));
				})
				.on('click', '.carousel-prev', function() {
					changeImage('prev');
				})
				.on('click', '.carousel-next', function() {
					changeImage();
				});

			// AUTO CHANGE

			if (op.autoChange) {
				var changeInterval = setInterval(changeImage, op.interval);

				ui.carousel
					.on('mouseenter', function() {
						clearInterval(changeInterval);
					})
					.on('mouseleave', function() {
						changeInterval = setInterval(changeImage, op.interval);
					});
			}

			return this;
		};

		$('.b-carousel').each(function() {
			$(this).carousel({
				autoChange: true
			});
		});

		// BUTTON UP

		var btnUp = $('<div/>', {'class':'btn-up'});
		btnUp.appendTo('body');

		$(document)
			.on('click', '.btn-up', function() {
				$('html, body').animate({
					scrollTop: 0
				}, 700);
			});

		$(window)
			.on('scroll', function() {
				if ($(this).scrollTop() > 200)
					$('.btn-up').addClass('active');
				else
					$('.btn-up').removeClass('active');
			});



	});

})(jQuery);




(function ($) {
	$(document).ready(function() {

		var swap_val = [];

		$(".webform-client-form .form-text, .webform-client-form .form-textarea").each(function(i){
			swap_val[i] = $(this).val();
			$(this).focus(function(){
				if ($(this).val() == swap_val[i]) {
					$(this).val("");
				}
			}).blur(function(){
				if ($.trim($(this).val()) == "") {
					jQuery(this).val(swap_val[i]);
				}
			});
		});


	});
})(jQuery);


