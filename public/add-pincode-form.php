<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $pincode = $db->escapeString(($_POST['pincode']));
      
        if (empty($pincode)) {
            $error['pincode'] = " <span class='label label-danger'>Required!</span>";
        }
       
       if (!empty($pincode)) 
       {
            $sql_query = "INSERT INTO deliver_pincodes (pincode)VALUES('$pincode')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_pincode'] = "<section class='content-header'>
                                                <span class='label label-success'>Pincode Added Successfully</span> </section>";
            } else {
                $error['add_pincode'] = " <span class='label label-danger'>Failed</span>";
            }
        }
    }
?>
<section class="content-header">
    <h1>Add New Pincode <small><a href='pincodes.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Pincodes</a></small></h1>

    <?php echo isset($error['add_pincode']) ? $error['add_pincode'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-6">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_pincode_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                                <div class="form-group">
                                            <label for="exampleInputEmail1">Pincode</label> <i class="text-danger asterik">*</i><?php echo isset($error['pincode']) ? $error['pincode'] : ''; ?>
                                            <input type="number" class="form-control" name="pincode" required>
                                </div>
                    </div>
                  
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                        <input type="reset" onClick="refreshPage()" class="btn-warning btn" value="Clear" />
                    </div>

                </form>

            </div><!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_pincode_form').validate({

        ignore: [],
        debug: false,
        rules: {
            pincode: "required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
    });
</script>
<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>