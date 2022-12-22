<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once('../includes/crud.php');

$db = new Database();
$db->connect();
if (empty($_POST['doctor_id'])) {
    $response['success'] = false;
    $response['message'] = "Doctor Id is Empty";
    print_r(json_encode($response));
    return false;
}
$doctor_id = $db->escapeString($_POST['doctor_id']);

$sql = "SELECT * FROM `timeslots` WHERE doctor_id= $doctor_id";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1) {
    
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['date'] = $row['date'];
        $temp['start_time'] = $row['start_time'];
        $temp['end_time'] = $row['end_time'];
        $rows[] = $temp;
        
    }

    $response['success'] = true;
    $response['message'] = "Timeslots listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));

}else{
    $response['success'] = false;
    $response['message'] = "Timeslots Not Found";
    print_r(json_encode($response));

}

?>