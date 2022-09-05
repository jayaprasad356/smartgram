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
$user_id = $db->escapeString($_POST['user_id']);

$sql = "SELECT * FROM cart,users,products WHERE cart.user_id=users.id AND cart.product_id=products.id AND user_id='$user_id'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);

if($num>=1){
        
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['name'] = $row['name'];
        $temp['mobile'] = $row['mobile'];
        $temp['email'] = $row['email'];
        $temp['occupation'] = $row['occupation'];
        $temp['gender'] = $row['gender'];
        $temp['product_name'] = $row['product_name'];
        $temp['brand'] = $row['brand'];
        $temp['description'] = $row['description'];
        $temp['image'] = DOMAIN_URL . $row['image'];
        $rows[] = $temp;
    }
        
    $response['success'] = true;
    $response['message'] = "Address listed Successfully";
    $response['data'] = $res;
    print_r(json_encode($response));
}
else{
    $response['success'] = false;
    $response['message'] = "Address Not Found";
    print_r(json_encode($response));
}


?>