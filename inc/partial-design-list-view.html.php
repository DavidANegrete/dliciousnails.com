<?php

/* This file displays a single product in a list view. It needs to receive
 * the following product details (as elements of an array named $product): 
 *     - sku:  Product ID, used to create the link to the Shirt Details page
 *     - img:  The web address of the main image for the product
 *     - name: The name of the 
 */

?><li class="col-sm-4 " >
        <a href="<?php echo BASE_URL; ?>gallery/designs.php/" class="img-responsive gallery-img">
            <img src="<?php echo BASE_URL . $design["img"]; ?>"  alt="<?php echo $design["details"]; ?>" class="img-responsive" >
            <p>Design Details</p>
        </a>
    </li>

