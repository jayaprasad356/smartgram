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

	    $pincode = $db->escapeString(($_POST['pincode']));
		$error = array();

		if (empty($pincode)) {
            $error['pincode'] = " <span class='label label-danger'>Required!</span>";
        }
        

		

		if ( !empty($pincode)) 
		{
             $sql_query = "UPDATE deliver_pincodes SET pincode='$pincode' WHERE id =  $ID";
			 $db->sql($sql_query);
             $update_result = $db->getResult();
			if (!empty($update_result)) {
				$update_result = 0;
			} else {
				$update_result = 1;
			}

			// check update result
			if ($update_result == 1) {
			    $error['update_pincode'] = " <section class='content-header'><span class='label label-success'>Pincode updated Successfully</span></section>";
			} else {
				$error['update_pincode'] = " <span class='label label-danger'>Failed to update</span>";
			}
		}
	} 


// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM deliver_pincodes WHERE id =" . $ID;
$db->sql($sql_query);
$res = $db->getResult();

if (isset($_POST['btnCancel'])) { ?>
	<script>
		window.location.href = "pincodes.php";
	</script>
<?php } ?>
<section class="content-header">
	<h1>
		Edit Pincode<small><a href='pincodes.php'><i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Pincodes</a></small></h1>
	<small><?php echo isset($error['update_pincode']) ? $error['update_pincode'] : ''; ?></small>
	<ol class="breadcrumb">
		<li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
	</ol>
</section>
<section class="content">
	<!-- Main row -->

	<div class="row">
		<div class="col-md-6">
		
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->
				<!-- form start -->
				<form id="edit_pincode_form" method="post" enctype="multipart/form-data">
					<div class="box-body">
							<div class="form-group">
											<label for="exampleInputEmail1">Pincode</label> <i class="text-danger asterik">*</i>
											<input type="number" class="form-control" name="pincode" value="<?php echo $res[0]['pincode']; ?>">
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
<?php $db->disconnect(); ?>


