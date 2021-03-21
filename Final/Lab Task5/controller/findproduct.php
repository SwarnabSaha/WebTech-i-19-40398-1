<?php

require_once '../model/model.php';

if (isset($_POST['findproduct'])) {
	
		//echo $_POST['product_name'];

    try {
    	
    	$allSearchedProducts = searchproduct($_POST['product_name']);
    	require_once '../searchallproduct.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

