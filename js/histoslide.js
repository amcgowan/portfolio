;(function(window) {
	"use strict";

	var histoslide = {
		stateId: 0,
		data: {},
		isListening: true,
		scrollSpeed: 1000, //pixels per second
		maxDuration: 1000, //Max duration - pixel speed will increase

		scrollTop: function() {
			return Math.max($('body').scrollTop(), $('html').scrollTop());
		},
		
		slideTo: function(row, slide) {
			var section = row.closest('section').attr('id');

			row.addClass('slide-left')
					.parent()
					.addClass('slide')
					.find('.' + slide)
					.removeClass('slide-right')
					.addClass('active');

			histoslide.runCharts(row.closest('.container').find('.' + slide + ' .chart'));

			histoslide.pushState(section, slide);
			
			setTimeout(function()  {
				$('[data-spy="scroll"]').each(function() {
	    			var $spy = $(this).scrollspy('refresh');
	    		});
			}, 1100);
		},
		
		slideBack: function(row) {
			var section = row.closest('section').attr('id');

			row.addClass('slide-right')
				.removeClass('active')
				.parent()
				.removeClass('slide')
				.find('.slide-left')
				.removeClass('slide-left');

			histoslide.pushState(section);
			
			setTimeout(function()  {
				$('[data-spy="scroll"]').each(function() {
	    			var $spy = $(this).scrollspy('refresh');
	    		});
			}, 1100);
		},
		
		scrollPage: function(target, duration, delay) {
			var fixedOffset = $('#navbar').height(),
				targetPosition = target.offset().top - fixedOffset,
				distance = Math.abs(targetPosition - histoslide.scrollTop()),
				duration;

			duration = typeof duration === "undefined" ? 
						Math.min((distance / histoslide.scrollSpeed) * 1000, 
								histoslide.maxDuration) : 
						duration;
			delay = typeof delay === "undefined" ? 0 : delay;

			histoslide.isListening = false;

    		setTimeout(function() {
    			$('html,body').animate({
			    	scrollTop: target.offset().top - fixedOffset
		    	}, duration, 'easeInOutCubic');
    		}, delay);
    		
    		setTimeout(function() {
	    		histoslide.isListening = true;
	    		histoslide.pushState(target.attr('id').replace('#',''));
    		}, delay + duration);
    		
    		return delay + duration;
		},
		
		runCharts: function(charts) {
			charts.each(function(i,o) {
		    	var chart = $(o),
		    		options = {
		    			segmentShowStroke: false,
			    		percentageInnerCutout : 90,	
		    		},
		    		data = [
		    			{
			    			value: parseInt(chart.attr('data-value'), 10),
			    			color: "#1C3A36"	    			
		    			},
		    			{
		    				value: 100 - parseInt(chart.attr('data-value'), 10),
		    				color: "#eeeeee"
		    			}

		    		],
		    		canvas = chart.find('canvas'),
		    		ctx = canvas.get(0).getContext('2d');
		    		ctx.clearRect(0, 0, canvas.width(), canvas.height());
		    		setTimeout(function() {
		    			new Chart(ctx).Doughnut(data,options);
		    		}, 1500);
	    	});

		},

		pushState: function(section, slide) {
			var excludeClasses = ['row', 'active', 'slide-right'],
				target = $('#' + section),
				active = target.find('.active'),
				isSlide = false,
				title, url, classes;
			if (histoslide.isListening) {
				if (typeof slide === 'undefined') {
					if (active.length) {
						classes = active.attr('class').split(/\s+/);
						$.each(classes, function(index, item) {
							if ($.inArray(item.trim(),excludeClasses) === -1) {
								slide = item;
								isSlide = true;
							}
						});
					}
				} else {
					isSlide = true;
				}
	
				if (isSlide) {
					title = slide;
					url = '/' + section + '/' + slide;
				} else {
					title = section;
					url = '/' + (section === 'top' ? '' : section);
				}
				if (typeof section !== 'undefined') {
					if (window.history.state === null ||
							(window.history.state.hasOwnProperty('url') &&
							window.history.state.url !== url)) {
	
						history.pushState({
							url: url
						}, title, url);
						
						histoslide.updateSEO();
						
					}
				}
			}
		},
		
		updateSEO: function() {
			var url = '/api/' + location.pathname;
			$.ajax({
				url: url,
				dataType: 'JSON',
				success: function(d) {
					document.title = d.title;
					$('meta[name=description],meta[name=keywords]').remove();
					$('head').append('<meta name="description" content="' + d.description + '">' +
									'<meta name="keywords" content="' + d.keywords + '">');		
				}
			});
		},
		
		init: function() {
			window.onpopstate = function(event) {
				var path = location.pathname.split('/'),
	    		section = path[1],
	    		slide = path.length > 2 ? path[2] : '',
	    		target = $('#' + section),
	    		active = target.find('.active'),
	    		row, scrollDuration;
		    	if (target.length) {
			    	scrollDuration = histoslide.scrollPage(target);
			    	if (slide !== '') {
				    	row = $(target.find('article.' + slide));
				    	if (row.length) {
				    		setTimeout(function() {
					    		histoslide.slideTo($(target).find('article.slider-nav'), slide);
					    		histoslide.pushState(section, slide);
					    	}, scrollDuration);
				    	}
			    	} else {
				    	if (active.length) {
					    	histoslide.slideBack(active);
				    	}
			    	}
		    	} else {
			    	histoslide.scrollPage($('#top'));
		    	}

			};
		}
	};

	if (typeof window.PortfolioJS === 'undefined') window.PortfolioJS = {};
	window.PortfolioJS.histoslide = histoslide;

	window.PortfolioJS.histoslide.init();

}(this.window || this));