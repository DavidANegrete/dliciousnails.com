<?php

function get_designs_all(){

	require(ROOT_PATH . "inc/database.php");
  
	try {
	  $results = $db->query("SELECT design_id, details, img FROM designs ORDER BY design_id");
	  echo "It Ran OK";

	} catch (Exception $e) {
	  echo "Did not run";
	  exit;

	}

	$designs = $results->fetchAll(PDO::FETCH_ASSOC);

	return $designs;
}

/*
 * Looks for a search term in the designs details of the db
 * @param    string    $s               the search term
 * @param    array     $values          Returns an array of strings created by splitting the string parameter on boundaries formed by the delimiter. 
 * @param    int       $values_length   returns the size of the $values array. 
 *@return   array                       a list of the designs that contain the search term in their details discriptionon
 *
 */
function get_designs_search($s) {

    require(ROOT_PATH . "inc/database.php");

    $matches = array();

    $values = explode(" ", $s);

    $values_length = count($values);


        for($i=0; $i<$values_length; $i++){
            try {
                $results = $db->prepare("
                SELECT design_id, details, img
                FROM designs
                WHERE details LIKE ?
                ORDER BY design_id");
            $results->bindValue(1,"%" . $values[$i] . "%");
            $results->execute();
            } catch (Exception $e) {
            echo "Data could not be retrieved from the database.";
            exit;
            }     
        }
        $matches = $results->fetchAll(PDO::FETCH_ASSOC); //End For Loop

    return $matches;

}




/*
 * Counts the total number of designs
 * @return   int             the total number of products
 */
function get_designs_count() {
    
    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->query("
            SELECT COUNT(design_id)
            FROM designs");
    } catch (Exception $e) {
        echo "Data could not be retrieved from the designs database.";
        exit;
    }

    return intval($results->fetchColumn(0));
}
/*
 * Returns a specified subset of products, based on the values received,
 * using the order of the elements in the array .
 * @param    int             the position of the first product in the requested subset 
 * @param    int             the position of the last product in the requested subset 
 * @return   array           the list of products that correspond to the start and end positions
 */
function get_designs_subset($positionStart, $positionEnd) {

    $offset = $positionStart - 1;
    $rows = $positionEnd - $positionStart + 1;

    require(ROOT_PATH . "inc/database.php");

    try {
        $results = $db->prepare("
                SELECT design_id, details, img
                FROM designs
                ORDER BY design_id
                LIMIT ?, ?");
        $results->bindParam(1,$offset,PDO::PARAM_INT);
        $results->bindParam(2,$rows,PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $subset = $results->fetchAll(PDO::FETCH_ASSOC);

    return $subset;
}