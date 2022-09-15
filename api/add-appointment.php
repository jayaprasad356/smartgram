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


if (empty($_POST['user_id'])) {
    $response['success'] = false;
    $response['message'] = "User Id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['doctor_id'])) {
    $response['success'] = false;
    $response['message'] = "Doctor Id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['name'])) {
    $response['success'] = false;
    $response['message'] = "Name is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['mobile'])) {
    $response['success'] = false;
    $response['message'] = "Mobile is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['age'])) {
    $response['success'] = false;
    $response['message'] = "Age is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['disease'])) {
    $response['success'] = false;
    $response['message'] = "Disease is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['place'])) {
    $response['success'] = false;
    $response['message'] = "Place is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['history'])) {
    $response['success'] = false;
    $response['message'] = "History is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['description'])) {
    $response['success'] = false;
    $response['message'] = "Description is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id = $db->escapeString($_POST['user_id']);
$doctor_id = $db->escapeString($_POST['doctor_id']);
$name = $db->escapeString($_POST['name']);
$age = $db->escapeString($_POST['age']);
$disease = $db->escapeString($_POST['disease']);
$place = $db->escapeString($_POST['place']);
$history = $db->escapeString($_POST['history']);
$description = $db->escapeString($_POST['description']);
$appointment_date = $db->escapeString($_POST['appointment_date']);
$appointment_time = $db->escapeString($_POST['appointment_time']);

$sql = "INSERT INTO appointments(`user_id`,`doctor_id`,`name`,`age`,`disease`,`place`,`history`,`description`,`appointment_date`,`appointment_time`)VALUES('$user_id','$doctor_id','$name','$age','$disease','$place','$history','$description','$appointment_date','$appointment_time')";
$db->sql($sql);
$res = $db->getResult();
$response['success'] = true;
$response['message'] = "Appointment Requested Successfully";
print_r(json_encode($response));

?>