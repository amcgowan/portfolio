<!DOCTYPE html>
<html>
  <head>
    <title>Andrew McGowan | Web Developer | Portfolio
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="I am Andrew McGowan, a web developer in the Fraser Valley, BC, I specialize in front end development, however I also am a solid programmer for backend work and game development. Canadian lower mainland abbotsford web developer.">
    <meta name="keywords" content="Andrew McGowan, Andrew, McGowan, Web Developer, Fraser Valley, Abbotsford, Lower Mainland, Canada, Canadian, BC, British Columbia, Programmer, HTML5, CSS3, JavaScript, PHP, MySQL, Designer, Design">
    <meta name="author" content="Andrew McGowan">
    <!-- Bootstrap -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="styles/mcgowan.css" rel="stylesheet" media="screen">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	 
  	<div class="container">
  		<div class="masthead">
  			<h3 class="text-muted">Andrew C. McGowan</h3>
  		</div>
  		<div class="jumbotron">
  			
	  		<h1>Hello!</h1>
	  		<p class="lead">
		  		Welcome to my portfolio. There is nothing here yet, but there will be lots to display real soon. If you are interested in seeing some samples of my work right away feel free to get in touch with me. 
	  		</p>
	  		<a class="btn btn-lg btn-success" href="mailto:andrew@goonworx.com">Contact Me</a>
	  	</div>
	  	<div class="row">
	  		<div class="col-md-4">
	  			<a target="_blank" href="http://www.facebook.com/andrew.mcgowan.90"><i class="fa fa-facebook-square"></i></a>
	  		</div>
	  		<div class="col-md-4">
	  			<a target="_blank" href="http://www.linkedin.com/pub/andrew-mcgowan/14/7b/ab1"><i class="fa fa-linkedin-square"></i></a>
	  		</div>
	  		<div class="col-md-4">
	  			<a target="_blank" href="http://vimeo.com/channels/615719"><i class="fa fa-vimeo-square"></i></a>
	  		</div>
	  	</div>
	  	<div class="footer">
	  		<p>&copy; <a href="http://www.goonworx.com/" target="_blank">GoonWorx</a> <?= date('Y'); ?></p>
	  	</div>
  	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	function runCharts(charts) {
	    	charts.each(function(i,o) {
		    	var chart = $(o),
		    		options = {
		    			segmentShowStroke: false,
			    		percentageInnerCutout : 90,	
		    		},
		    		data = [
		    			{
			    			value: parseInt(chart.attr('data-value'), 10),
			    			color: "red"	    			
		    			},
		    			{
		    				value: 100 - parseInt(chart.attr('data-value'), 10),
		    				color: "silver"
		    			}

		    		],
		    		canvas = chart.find('canvas'),
		    		ctx = canvas.get(0).getContext('2d');
		    		ctx.clearRect(0, 0, canvas.width(), canvas.height());
		    		setTimeout(function() {
		    			new Chart(ctx).Doughnut(data,options);
		    		}, 1500);
	    	});
    	}
    	function scrollTo(element) {
	    	$('html, body').animate({
		    	scrollTop: element.offset().top - 50
	    	}, 500);
    	}
    	$(document).ready(function(e) {
	    	$('.btn.slide').click(function() {
		    	var btn = $(this),
		    		slider = btn.closest('.slider');
		    	btn.closest('.row')
		    		.addClass('slide-left')
		    		.parent()
		    		.addClass('slide')
		    		.find('.' + btn.attr('data-target'))
		    		.removeClass('slide-right');
		    	runCharts(btn.closest('.container').find('.' + btn.attr('data-target') + ' .chart'));
		    	
		    	setTimeout(function() {
		    		scrollTo(slider);
		    	}, 500);
	    	});
	    	$('a.slide-back').click(function() {
		    	var btn = $(this);
		    	btn.tooltip('hide');
		    	btn.closest('.row')
		    		.addClass('slide-right')
		    		.parent()
		    		.removeClass('slide')
		    		.find('.slide-left')
		    		.removeClass('slide-left');
	    	});
	    	$('.hint').tooltip({
		    	container: 'body'
	    	});
    	});
    </script>
  </body>
</html>