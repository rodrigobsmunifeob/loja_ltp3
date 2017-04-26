<?php include("header.php"); ?>


<div id="myCarousel" class="carousel slide carousel-home" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<div style="background: url('assets/banners/1.png');"
			class="item active"></div>

		<div style="background: url('assets/banners/2.png');" class="item"></div>

		<div style="background: url('assets/banners/3.png');" class="item"></div>

		<div style="background: url('assets/banners/4.png');" class="item"></div>
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" role="button"
		data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
		aria-hidden="true"></span> <span class="sr-only">Previous</span>
	</a> <a class="right carousel-control" href="#myCarousel" role="button"
		data-slide="next"> <span class="glyphicon glyphicon-chevron-right"
		aria-hidden="true"></span> <span class="sr-only">Next</span>
	</a>

</div>

<div class="container">
	
	<div class="row">
	
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="assets/produtos/1.png">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	  
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="..." alt="...">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	  
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="..." alt="...">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	  
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="..." alt="...">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	  
	</div>
	
</div>

<?php include("footer.php"); ?>