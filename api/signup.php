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

if (empty($_POST['name'])) {
    $response['success'] = false;
    $response['message'] = "Name is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['mobile'])) {
    $response['success'] = false;
    $response['message'] = "Mobilenumber is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['password'])) {
    $response['success'] = false;
    $response['message'] = "Password is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['occupation'])) {
    $response['success'] = false;
    $response['message'] = "Occupation is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['gender'])) {
    $response['success'] = false;
    $response['message'] = "Gender is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['email'])) {
    $response['success'] = false;
    $response['message'] = "Email is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['address'])) {
    $response['success'] = false;
    $response['message'] = "Address is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['village'])) {
    $response['success'] = false;
    $response['message'] = "Village is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['pincode'])) {
    $response['success'] = false;
    $response['message'] = "Pincode is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['district'])) {
    $response['success'] = false;
    $response['message'] = "District is Empty";
    print_r(json_encode($response));
    return false;
}
$name = $db->escapeString($_POST['name']);
$mobile = $db->escapeString($_POST['mobile']);
$password = $db->escapeString($_POST['password']);
$occupation = $db->escapeString($_POST['occupation']);
$gender = $db->escapeString($_POST['gender']);
$email = $db->escapeString($_POST['email']);
$address = $db->escapeString($_POST['address']);
$village = $db->escapeString($_POST['village']);
$pincode = $db->escapeString($_POST['pincode']);
$district = $db->escapeString($_POST['district']);

$sql = "SELECT * FROM users WHERE mobile = '$mobile' AND password='$password'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num == 1) {
    $response['success'] = false;
    $response['message'] ="Mobile Number Already Exists";
    print_r(json_encode($response));
    return false;
}
else{
    $sql = "INSERT INTO users (`name`,`mobile`,`password`,`occupation`,`gender`,`email`,`address`,`village`,`pincode`,`district`,`balance`)VALUES('$name','$mobile','$password','$occupation','$gender','$email','$address','$village','$pincode','$district',0)";
    $db->sql($sql);
    $sql = "SELECT * FROM users WHERE mobile = '$mobile' AND password='$password'";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = "Registered Successfully";
    $response['data'] = $res;

    print_r(json_encode($response));

}

?>