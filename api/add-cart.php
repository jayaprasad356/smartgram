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
if (empty($_POST['product_id'])) {
    $response['success'] = false;
    $response['message'] = "Product Id is Empty";
    print_r(json_encode($response));
    return false;
}
$user_id = $db->escapeString($_POST['user_id']);
$product_id = $db->escapeString($_POST['product_id']);

$sql = "SELECT * FROM cart WHERE user_id='$user_id' AND product_id='$product_id'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);

if($num==1){
    $ID = $res[0]['id'];
    $sql = "UPDATE cart SET user_id='$user_id',product_id='$product_id' WHERE id='$ID'";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = " Successfully Updated to Cart";
    print_r(json_encode($response));
}
else{
    $sql = "INSERT INTO cart (`user_id`,`product_id`)VALUES('$user_id','$product_id')";
    $db->sql($sql);
    $res = $db->getResult();
    $response['success'] = true;
    $response['message'] = "Successfully Added to Cart ";
    print_r(json_encode($response));
}




?>