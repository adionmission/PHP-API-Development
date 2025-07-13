<?php

include("api.php");

$apiObject = new API();


if($_GET["action"] == 'outputData'){

    $data = $apiObject->outputData();
}

if($_GET["action"] == 'adddata'){

    $data = $apiObject->adddata();
}

if($_GET["action"] == 'updatedata'){
    
    $data = $apiObject->updatedata();
}

if($_GET["action"] == 'filterdata'){
    
    $data = $apiObject->filterdata();
}


echo json_encode($data);

?>
