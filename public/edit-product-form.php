<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;
?>
<?php

if (isset($_GET['id'])) {
    $ID = $db->escapeString($_GET['id']);
} else {
    // $ID = "";
    return false;
    exit(0);
}
if (isset($_POST['btnEdit'])) {


			$pincode_type = (isset($_POST['product_pincodes']) && $_POST['product_pincodes'] != '') ? $db->escapeString($fn->xss_clean($_POST['product_pincodes'])) : "";
			if ($pincode_type == "all") {
				$pincode_ids = NULL;
			} else {
				if (empty($_POST['pincode_ids_exc'])) {
					$error['pincode_ids_exc'] = "<label class='alert alert-danger'>Select pincodes!.</label>";
				} else {
					$pincode_ids = $fn->xss_clean_array($_POST['pincode_ids_exc']);
					$pincode_ids = implode(",", $pincode_ids);
				}
			}

	    $category = $db->escapeString(($_POST['category']));
	    $product_name = $db->escapeString($_POST['product_name']);
        $brand = $db->escapeString($_POST['brand']);
		$price = $db->escapeString($_POST['price']);
        $description = $db->escapeString($_POST['description']);
		$error = array();

		if (empty($category)) {
            $error['category'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($product_name)) {
            $error['product_name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($brand)) {
            $error['brand'] = " <span class='label label-danger'>Required!</span>";
        }
		if (empty($price)) {
            $error['price'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($description)) {
            $error['description'] = " <span class='label label-danger'>Required!</span>";
        }

		

		if ( !empty($category) && !empty($product_name) && !empty($brand) && !empty($price) && !empty($description)) 
		{
			if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] == 0 && !empty($_FILES['image'])) {
				//image isn't empty and update the image
				$old_image = $db->escapeString($_POST['old_image']);
				$extension = pathinfo($_FILES["image"]["name"])['extension'];
		
				$result = $fn->validate_image($_FILES["image"]);
				$target_path = 'upload/products/';
				
				$filename = microtime(true) . '.' . strtolower($extension);
				$full_path = $target_path . "" . $filename;
				if (!move_uploaded_file($_FILES["image"]["tmp_name"], $full_path)) {
					echo '<p class="alert alert-danger">Can not upload image.</p>';
					return false;
					exit();
				}
				if (!empty($old_image)) {
					unlink($old_image);
				}
				$upload_image = 'upload/products/' . $filename;
				$sql = "UPDATE products SET `image`='" . $upload_image . "' WHERE `id`=" . $ID;
				$db->sql($sql);
			}
			
             $sql_query = "UPDATE products SET category_id='$category',product_name='$product_name',brand='$brand',price='$price',type= '$pincode_type',pincodes = '$pincode_ids',description='$description' WHERE id =  $ID";
			 $db->sql($sql_query);
			 $res = $db->getResult();
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}

			// check update result
			if ($update_result == 1) {
			    $error['update_product'] = " <section class='content-header'><span class='label label-success'>Product updated Successfully</span></section>";
			} else {
				$error['update_product'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT *,products.type AS d_type FROM products WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "products.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Product<small><a href='products.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Products</a></small></h1>
	<small><?php echo isset($error['update_product']) ? $error['update_product'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-12">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->
				<!-- form start -->
				<form id="edit_product_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
					    <input type="hidden" id="old_image" name="old_image"  value="<?= $res[0]['image']; ?>">
						   <div class="row">
							    <div class="form-group">
									<div class='col-md-4'>
									          <label for="exampleInputEmail1">Category</label> <i class="text-danger asterik">*</i>
												<select id='category' name="category" class='form-control' required>
                                                <option value="none">Select</option>
                                                            <?php
                                                            $sql = "SELECT * FROM `categories`";
                                                            $db->sql($sql);

                                                            $result = $db->getResult();
                                                            foreach ($result as $value) {
                                                            ?>
															 <option value='<?= $value['id'] ?>' <?= $value['id']==$res[0]['category_id'] ? 'selected="selected"' : '';?>><?= $value['name'] ?></option>
                                                               
                                                            <?php } ?>
                                                </select>
									</div>
									 <div class="col-md-4">
										<label for="exampleInputEmail1">Product Name</label><i class="text-danger asterik">*</i><?php echo isset($error['product_name']) ? $error['product_name'] : ''; ?>
										<input type="text" class="form-control" name="product_name" value="<?php echo $res[0]['product_name']; ?>">
									 </div>
								</div>
						   </div>
						   <hr>
						   <div class="row">
								<div class="form-group">
								    <div class="col-md-4">
										<label for="exampleInputEmail1">Brand</label><i class="text-danger asterik">*</i><?php echo isset($error['brand']) ? $error['brand'] : ''; ?>
										<input type="text" class="form-control" name="brand" value="<?php echo $res[0]['brand']; ?>">
									 </div>
									 <div class="col-md-4">
										<label for="exampleInputEmail1">Price</label><i class="text-danger asterik">*</i><?php echo isset($error['price']) ? $error['price'] : ''; ?>
										<input type="text" class="form-control" name="price" value="<?php echo $res[0]['price']; ?>">
									 </div>
									
								</div>
						   </div>
						   <hr>
						   <div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="product_pincodes">Delivery Places :</label><i class="text-danger asterik">*</i>
										<select name="product_pincodes" id="product_pincodes" class="form-control" required>
											<option value="">Select Option</option>
											<option value="included" <?= (!empty($res[0]['d_type']) && $res[0]['d_type'] == "included") ? 'selected' : ''; ?>>Pincode Included</option>
											<option value="excluded" <?= (!empty($res[0]['d_type']) && $res[0]['d_type'] == "excluded") ? 'selected' : ''; ?>>Pincode Excluded</option>
											<option value="all" <?= (!empty($res[0]['d_type']) && $res[0]['d_type'] == "all") ? 'selected' : ''; ?>>Includes All</option>
										</select>
										<br />
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for='pincode_ids_exc'>Selected Pincodes <small>( Ex : 100,205, 360 <comma separated>)</small></label>
										<select name='pincode_ids_exc[]' id='pincode_ids_exc' class='form-control' placeholder='Enter the pincode you want to allow delivery this product' multiple="multiple">
											<?php $sql = 'select id,pincode from `deliver_pincodes` order by id desc';
											// echo $sql;
											$db->sql($sql);
											$result = $db->getResult();
											// print_r($result);
											// return false;
											if ($res[0]['pincodes'] != "") {
												$pincodes = explode(",", $res[0]['pincodes']);
												foreach ($result as $value) {
											?>
													<option value='<?= $value['id'] ?>' <?= (in_array($value['id'], $pincodes)) ? 'selected' : ''; ?>><?= $value['pincode']  ?></option>
												<?php }
											} else {
												foreach ($result as $value) { ?>
													<option value='<?= $value['id'] ?>'><?= $value['pincode']  ?></option>

											<?php }
											} ?>

										</select>
									</div>
								</div>

                            </div>
							<br>
						  <div class="row">
							    <div class="form-group">
									 <div class="col-md-4">
										<label for="exampleInputEmail1">Description</label><i class="text-danger asterik">*</i><?php echo isset($error['description']) ? $error['description'] : ''; ?>
										<input type="text" class="form-control" name="description" value="<?php echo $res[0]['description']; ?>">
									 </div>
									 <div class="col-md-4">
									     <label for="exampleInputFile">Image</label><i class="text-danger asterik">*</i>
                                        
                                        <input type="file" accept="image/png,  image/jpeg" onchange="readURL(this);"  name="image" id="image">
                                        <p class="help-block"><img id="blah" src="<?php echo $res[0]['image']; ?>" style="height:100px;max-width:100%" /></p>
									 </div>
								</div>
						   </div>
						   
					
						</div><!-- /.box-body -->
                       
					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="btnEdit">Update</button>
					
					</div>
				</form>
			</div><!-- /.box -->
		</div>
	</div>
</section>

<div class="separator"> </div>
<script>
	$('#pincode_ids_inc').select2({
        width: 'element',
        placeholder: 'type in pincode to search',

    });

    $(document).ready(function() {
        var val = $('#product_pincodes').val();
        if (val == "all") {
            $('#pincode_ids_exc').prop('disabled', true);
        } else {
            $('#pincode_ids_exc').prop('disabled', false);
        }
    });

    $('#product_pincodes').on('change', function() {
        var val = $('#product_pincodes').val();
        if (val == "included" || val == "excluded") {
            $('#pincode_ids_exc').prop('disabled', false);
        } else {
            $('#pincode_ids_exc').prop('disabled', true);
        }
    });
    $('#pincode_ids_exc').select2({
        width: 'element',
        placeholder: 'type in pincode to search',

    });
</script>
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?php $db->disconnect(); ?>
