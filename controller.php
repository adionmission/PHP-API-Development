<?php

if(isset($_POST["action"])){

    if($_POST["action"] == 'adddata'){
        $data = array(
            'first_name'     => $_POST["first_name"],
            'last_name'     => $_POST["last_name"],
            'course_name'     => $_POST["course_name"],
            'date_of_joining'      => $_POST["date_of_joining"]
        );
        $client = curl_init('http://localhost/Assignment/apiHandler.php?action=adddata');
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
    }

    if($_POST["action"] == 'updatedata'){
        $data = array(
            'first_name'     => $_POST["first_name"],
            'last_name'     => $_POST["last_name"],
            'course_name'     => $_POST["course_name"],
            'date_of_joining'      => $_POST["date_of_joining"]
        );
        $client = curl_init('http://localhost/Assignment/apiHandler.php?action=updatedata');
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($client);
        curl_close($client);
    }

    if($_POST["action"] == 'filterdata'){
        $data = array(
            'first_name'     => $_POST["first_name"],
            'last_name'     => $_POST["last_name"],
            'course_name'     => $_POST["course_name"],
            'date_of_joining'      => $_POST["date_of_joining"]
        );
        $client = curl_init('http://localhost/Assignment/apiHandler.php?action=filterdata');
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($client);
        curl_close($client);
    }

}

?>
