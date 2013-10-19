<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="styles/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="styles/mcgowan.css" rel="stylesheet" media="screen">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  	  	<div class="container">
	  		<div class="navbar-header">
	  			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".am-navbar">
	  				<span class="sr-only">Toggle navigation</span>
	  				<span class="icon-bar"></span>
	  				<span class="icon-bar"></span>
	  				<span class="icon-bar"></span>
	  			</button>
	  			<a class="navbar-brand" href="#">GoonWorx</a>
	  		</div>
	  		<div class="collapse navbar-collapse am-navbar pull-right">
	  			<ul class="nav navbar-nav">
	  				<li>
	  					<a href="#">Portfolio</a>
	  				</li>
	  				<li>
	  					<a href="#">Work Eperiance</a>
	  				</li>
	  				<li>
	  					<a href="#">About</a>
	  				</li>
	  				<li>
	  					<a href="#">Contact</a>
	  				</li>
	  			</ul>
	  		</div>
  	  	</div>
  	</nav>
  	<div class="jumbotron">
  		<div class="container">
	  		<h1>Andrew Craig McGowan</h1>
	  		<p class="lead">Web developer in the Fraser Valley specializing in front end design and development</p>
	  	</div>
  	</div>
  	<div class="container technologies">
  		<div class="col-md-3 col-sm-6">
  			<div class="displays">
  				<div  class="center">
  					<i class="icon-desktop"></i>
  					<i class="icon-laptop"></i>
  					<i class="icon-mobile-phone"></i>
  				</div>
  			</div>
  			<h2>Less/CSS</h2>
  			<p>Uses Less to create clean and efficient style sheets that let your site display beautifully on any size device</p>
  		</div>
  		<div class="col-md-3 col-sm-6">
  			<i class="icon-code"></i>
  			<h2>HTML</h2>
  			<p>Your site will be developed with HTML5 to allow for a tidy site structure and rich user experience.</p>
  		</div>
  		
  		<div class="clearfix visible-sm"></div>
  		
  		<div class="col-md-3 col-sm-6">
  			<i class="icon-rocket"></i>
  			<h2>JavaScript</h2>
  			<p>JavaScript in conjunction with jQuery will provide wonderful functionality to your site.</p>
  		</div>
  		<div class="col-md-3 col-sm-6">
  			<i class="icon-cogs"></i>
  			<h2>PHP/SQL</h2>
  			<p>Not only will your site look good, but it can connect to a database do blah blh blha</p>
  		</div>
  	</div>
  	<div id="carousel-example-captions" class="carousel slide bs-docs-carousel-example">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-captions" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-captions" data-slide-to="1" class=""></li>
          <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <div class="carousel-caption">
              <h3>First slide label</h3>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="item">
            <div class="carousel-caption">
              <h3>Second slide label</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="item">
            <div class="carousel-caption">
              <h3>Third slide label</h3>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-captions" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-captions" data-slide="next">
          <span class="icon-next"></span>
        </a>
      </div>   
   <div class="container">
   		<h2>Recent Work</h2>
   		<div class="col-sm-6 col-md-3">
   			<div style="background: red; width: 100%; height: 40px;">
   			
   			</div>
   		</div>
   		<div class="col-sm-6 col-md-3">
   			<div style="background: red; width: 100%; height: 40px;">
   			
   			</div>
   		</div>
   		<div class="col-sm-6 col-md-3">
   			<div style="background: red; width: 100%; height: 40px;">
   			
   			</div>
   		</div>
   		<div class="col-sm-6 col-md-3">
   			<div style="background: red; width: 100%; height: 40px;">
   			
   			</div>
   		</div>
   </div>
   
   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(e) {
	    	$('.carousel').carousel();
    	});
    </script>
  </body>
</html>