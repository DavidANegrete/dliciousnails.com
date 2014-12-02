<?php



<div class="row">
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control">
    </div>
   </div>
  </div>

  	<div class="container">
		<div class="row">
			<h1 class = "lead">Some of our art.</h1>
			<p class="lead">You can learn more about the designs and get an estimate of how long they take to complete by goung over the details.</p>
			<?php include(ROOT_PATH . "inc/partial-list-navigation.html.php"); ?>
			<ul class="col-sm-4">
			<?php
				foreach($designs_list as $design) {
				include(ROOT_PATH . "inc/partial-design-list-view.html.php");
				}
			?>
		</ul>
		</div>
	</div>