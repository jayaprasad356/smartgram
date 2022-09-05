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
$sql = "SELECT * FROM orders WHERE user_id='$user_id'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if ($num >= 1){
    
        $sql = "SELECT *,products.image AS image,orders.id AS id FROM orders,products,users,addresses WHERE orders.product_id = products.id AND orders.user_id=users.id AND addresses.user_id=users.id AND orders.user_id='$user_id'";
        $db->sql($sql);
        $res = $db->getResult();
        $num = $db->numRows($res);
        
            foreach ($res as $row) {
                $temp['id'] = $row['id'];
                $temp['mobile'] = $row['mobile'];
                $temp['name'] =$row['name'];
                $temp['product_name'] = $row['product_name'];
                $temp['brand'] = $row['brand'];
                $temp['address'] = $row['address'];
                $temp['landmark'] = $row['landmark'];
                $temp['city'] = $row['city'];
                $temp['district'] = $row['district'];
                $temp['pincode'] = $row['pincode'];
                $temp['state'] = $row['state'];
                $temp['country'] = $row['country'];
                $temp['image'] = DOMAIN_URL . $row['image'];
                $rows[] = $temp;
                
            }
        
            $response['success'] = true;
            $response['message'] = "Orders listed Successfully";
            $response['data'] = $rows;
            print_r(json_encode($response));
 }

else {
    $response['success'] = false;
    $response['message'] = "No Orders Found";
    print_r(json_encode($response));

}

?>