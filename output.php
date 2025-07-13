<?php

$client = curl_init('http://localhost/Assignment/apiHandler.php?action=outputData');   // link returns json text (api)
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);


$output = '';


if(count($result) > 0){
    foreach($result as $row){
        $output .= '
            <tr>
                <td>'.$row->id.'</td>
                <td>'.$row->first_name.'</td>
                <td>'.$row->last_name.'</td>
                <td>'.$row->course_id.'</td>
                <td>'.$row->date_of_joining.'</td>
                <td>'.$row->course_name.'</td>
            </tr>
        ';
    }
}else{
    $output .= '<tr><td colspan="3" align="center">Not found!</td></tr>';
}

echo $output;

?>
