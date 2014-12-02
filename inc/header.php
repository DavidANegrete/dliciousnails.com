<nav class="navbar navbar-default" role="navigation group">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-button-group">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="#"></a>
	    </div>

	  <div class="collapse navbar-collapse" id="main-button-group">
      <ul class="nav navbar-nav">
       <li class="<?php if($section == "about") { echo "active"; }  ?>"><a href="<?php echo BASE_URL; ?>about/index.php">About <span class="sr-only">About</span></a></li>
       <li class="<?php if($section == "contact") { echo "active"; }  ?>"><a href="<?php echo BASE_URL; ?>contact/index.php">Contact<span class="sr-only">Contact</span></a></li>
       <li class="<?php if($section == "gallery") { echo "active"; }  ?>"><a href="<?php echo BASE_URL; ?>gallery/index.php">Gallery<span class="sr-only">Gallery</span></a></li>
 	</div>
</nav>
	



