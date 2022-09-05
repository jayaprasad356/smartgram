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

$sql = "SELECT *,doctors.name AS doctor_name,appointments.name AS name FROM `appointments`,`doctors` WHERE appointments.doctor_id = doctors.id";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1) {
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['name'] = $row['name'];
        $temp['mobile'] = $row['mobile'];
        $temp['age'] = $row['age'];
        $temp['disease'] = $row['disease'];
        $temp['place'] = $row['place'];
        $temp['description'] = $row['description'];
        $temp['doctor_name'] = $row['doctor_name'];
        $temp['role'] = $row['role'];
        $temp['experience'] = $row['experience'];
        $temp['fees'] = $row['fees'];
        $temp['image'] = DOMAIN_URL . $row['image'];
        $rows[] = $temp;
        
    }
    
    $response['success'] = true;
    $response['message'] = "Appointments listed Successfully";
    $response['data'] = $rows;
    print_r(json_encode($response));
    

}else{
    $response['success'] = false;
    $response['message'] = "No Appointments Found";
    print_r(json_encode($response));

}

?>