<?php

	require_once("../inc/config.php");
	require_once(ROOT_PATH . "inc/designs.php");

	// retrieve current page number from query string; set to 1 if blank
	if (empty($_GET["pg"])) {
		$current_page = 1;
	} else {
		$current_page = $_GET["pg"];
	}

	// set strings like "frog" to 0; remove decimals
	$current_page = intval($current_page);

	$total_products = get_designs_count();
	$products_per_page = 8;
	$total_pages = ceil($total_products / $products_per_page);

	// redirect too-large page numbers to the last page
	if ($current_page > $total_pages) {
		header("Location: ./?pg=" . $total_pages);
	}

	// redirect too-small page numbers (or strings converted to 0) to the first page
	if ($current_page < 1) {
		header("Location: ./");
	}

	// determine the start and end shirt for the current page; for example, on
	// page 3 with 8 shirts per page, $start and $end would be 17 and 24
	$start = (($current_page - 1) * $products_per_page) + 1;
	$end = $current_page * $products_per_page;
	if ($end > $total_products) {
		$end = $total_products;
	}

	$designs_list =  get_designs_subset($start,$end);

	$good_search = "pink";


	//Looking for a search term

/* This following contains instructions for three different states:
 *   - Displaying the initial search
 *   - Handling a form submission and ...
 *       - ... displaying the results if matches are found.
 *       - ... displaying a "no results found" message if necessary.
 */

// if a non-blank search term is specified in
// the query string, perform a search
$search_term = "";
if (isset($_GET["s"])) {
	$search_term = trim($_GET["s"]);
	if ($search_term != "") {
		require_once(ROOT_PATH . "inc/designs.php");
		$searched_designs = get_designs_search($search_term);

	}
} else {
		 $_GET["s"]= $search_term;
		 $all = TRUE;
}


?><?php 
$pageTitle = "D'Licious Designs";
$section = "gallery";
include(ROOT_PATH . 'inc/head.php');
include(ROOT_PATH . 'inc/header.php'); ?>

<div class="jumbotron main-jumbo">

<div class="main-gallery">	
		<div class="row">
				<div class= "col-sm-6 hidden-smallget" >
				<p>Our art is displayed in the order it was created.
				Find out how long it took to finish a peice of nail art
				and the materials used to complete it by clicking on the
				<kbd>design details</kbd> link. 
				</p>
				<p >Certain services are more expensive than others and this is partialy
				based on the products used. Knowing the differences between the products, as a nail art 
				enthusiast will help you determine what you are willing to pay for a set of nails. 
				Knowing why it costs more will help you understand why there is a difference and 
				you will end up with a set you trully love.
				</p>
				<p><a class="btn btn-primary" href="<?php echo BASE_URL; ?>about/services.php" 
					class="btn btn-primary btn-large">Learn about the services »
				</a></p>
			</div>
			<div class="col-sm-6">
				<form method="get" action="./">
					<h4>Search our nail art</h4>
				    <div class="input-group lead">
				      <span class="input-group-btn">
				      	<button class="btn btn-default" type="submit"id="myButton"data-loading-text"Searching..." autocomplete="off">Go!</button>
				      </span>
				      <input type="text" class="form-control" name="s" value="<?php echo htmlspecialchars($search_term); ?>">
				    </div>
				    <h6>Click on <kbd>'Go!'</kbd> to search. 
				    	Use key words such as <?php echo $good_search; ?></h6>
				<form>
			</div>

		</div>
	

	</div>
</div>
</div>
<!--if else to check if a search value exitst -->
<?php if ($search_term != "") : ?>

	<?php // if there are products found that match the search term, display them; ?>
	<?php // otherwise, display a message that none were found ?>
	<?php if (!empty($searched_designs)) : ?>
	<div class="jumbotron">
		<?php //Checking to see if total products is greater than 8 to show the pagination ?>
		<?php if($total_pages  > 8 ) : ?>
		<?php include(ROOT_PATH . "inc/partial-list-navigation.html.php"); ?>
		<?php endif; ?>

			<ul class="designs">

				<?php
					foreach ($searched_designs  as $design) {
                    include(ROOT_PATH . "inc/partial-design-list-view.html.php");
					}
				?>
			</ul>
		<?php else: ?>
			<p>None were found try using different words in your search!</p>
	<?php endif; ?>
<?php endif; ?>
</div><!-- End Jumbotron -->
<script>
  $('#myButton').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })
</script>
<?php include(ROOT_PATH . 'inc/scripts.php') ?>	
<?php include(ROOT_PATH . 'inc/footer.php') ?>
	