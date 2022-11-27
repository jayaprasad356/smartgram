<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once('../includes/crud.php');
include('../includes/custom-functions.php');
$fn = new custom_functions();
$db = new Database();
$db->connect();

if (isset($_POST['check_deliverability']) && $_POST['check_deliverability'] == 1) {
    /*  
    6. check_deliverability
        accesskey:90336
        check_deliverability:1
        pincode_id:1 or pincode:370465
        product_id:1 or slug:test

    */
    if (isset($_POST['pincode']) && !empty($_POST['pincode'])) {
        $res = $fn->get_data($columns = ['id'], "pincode='" . $_POST['pincode'] . "'", 'deliver_pincodes');
        $num = count($res);
        if ($num >= 1) {
            $_POST['pincode_id'] = $res[0]['id'];
            
        }
        else{
            $response['success'] = false;
            $response['message'] = "Invalid pincode passed.";
            print_r(json_encode($response));
            return false;

        }

    }
    if (isset($_POST['pincode_id']) && !empty($_POST['pincode_id']) && isset($_POST['product_id']) && !empty($_POST['product_id'])) {
        $sql = "SELECT * from products where id=" . $_POST['product_id'];
        $db->sql($sql);
        $result = $db->getResult();
        $pincode = $fn->get_data($columns = ['id'], "id='" . $_POST['pincode_id'] . "'", 'deliver_pincodes');
        if (isset($pincode[0]['id']) && !empty($pincode[0]['id'])) {
            if (isset($result[0]) && !empty($result[0])) {
                $pincode_ids = explode(',', $result[0]['pincodes']);
                if ($result[0]['type'] == "all") {
                    $response['success'] = true;
                } else if ($result[0]['type'] == "included") {
                    if (in_array($_POST['pincode_id'], $pincode_ids)) {
                        $response['success'] = true;
                    } else {
                        $response['success'] = false;
                    }
                } else if ($result[0]['type'] == "excluded") {
                    if (!in_array($_POST['pincode_id'], $pincode_ids)) {
                        $response['success'] = true;
                    } else {
                        $response['success'] = false;
                    }
                }
                $response['message'] = "Deliverability checked successfully";
                print_r(json_encode($response));
                return false;
            } else {
                $response['success'] = false;
                $response['message'] = "Invalid product id passed.";
                print_r(json_encode($response));
                return false;
            }
        } else {
            $response['success'] = false;
            $response['message'] = "Invalid pincode id passed.";
            print_r(json_encode($response));
            return false;
        }
    } else {
        $response['success'] = false;
        $response['message'] = "Please pass Product id and pincode id for deliverability checking.";
        print_r(json_encode($response));
        return false;
    }
}

?>