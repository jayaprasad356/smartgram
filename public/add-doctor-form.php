<?php
include_once('includes/functions.php');
$function = new functions;
include_once('includes/custom-functions.php');
$fn = new custom_functions;

?>
<?php
if (isset($_POST['btnAdd'])) {

        $name = $db->escapeString(($_POST['name']));
        $role = $db->escapeString($_POST['role']);
        $experience = $db->escapeString($_POST['experience']);
        $fees = $db->escapeString($_POST['fees']);
        
        // get image info
        $menu_image = $db->escapeString($_FILES['product_image']['name']);
        $image_error = $db->escapeString($_FILES['product_image']['error']);
        $image_type = $db->escapeString($_FILES['product_image']['type']);

        // create array variable to handle error
        $error = array();
            // common image file extensions
        $allowedExts = array("gif", "jpeg", "jpg", "png");

        // get image file extension
        error_reporting(E_ERROR | E_PARSE);
        $extension = end(explode(".", $_FILES["product_image"]["name"]));
        
        if (empty($name)) {
            $error['name'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($role)) {
            $error['role'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($experience)) {
            $error['experience'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($fees)) {
            $error['fees'] = " <span class='label label-danger'>Required!</span>";
        }
       
       
       if (!empty($name) && !empty($role) && !empty($experience) && !empty($fees)) {
            $result = $fn->validate_image($_FILES["product_image"]);
                // create random image file name
                $string = '0123456789';
                $file = preg_replace("/\s+/", "_", $_FILES['product_image']['name']);
                $menu_image = $function->get_random_string($string, 4) . "-" . date("Y-m-d") . "." . $extension;
        
                // upload new image
                $upload = move_uploaded_file($_FILES['product_image']['tmp_name'], 'upload/doctors/' . $menu_image);
        
                // insert new data to menu table
                $upload_image = 'upload/doctors/' . $menu_image;

            
           
            $sql_query = "INSERT INTO doctors (name,role,experience,fees,image)VALUES('$name','$role','$experience','$fees','$upload_image')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                
                $error['add_doctor'] = "<section class='content-header'>
                                                <span class='label label-success'>Doctor Added Successfully</span> </section>";
            } else {
                $error['add_doctor'] = " <span class='label label-danger'>Failed</span>";
            }
        }
    }
?>
<section class="content-header">
    <h1>Add New Doctor <small><a href='doctors.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Doctors</a></small></h1>

    <?php echo isset($error['add_doctor']) ? $error['add_doctor'] : ''; ?>
    <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
    </ol>
    <hr />
</section>
<section class="content">
    <div class="row">
        <div class="col-md-10">
           
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form name="add_doctor_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                           <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Name</label> <i class="text-danger asterik">*</i><?php echo isset($error['name']) ? $error['name'] : ''; ?>
                                            <input type="text" class="form-control" name="name" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Role</label> <i class="text-danger asterik">*</i><?php echo isset($error['role']) ? $error['role'] : ''; ?>
                                        <input type="text" class="form-control" name="role" required />
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Experience</label> <i class="text-danger asterik">*</i><?php echo isset($error['experience']) ? $error['experience'] : ''; ?>
                                            <input type="text" class="form-control"  name="experience" required/>
                                    </div>
                                    <div class="col-md-4">
                                            <label for="exampleInputEmail1">Fees</label> <i class="text-danger asterik">*</i><?php echo isset($error['fees']) ? $error['fees'] : ''; ?>
                                            <input type="text" class="form-control"  name="fees" required/>
                                    </div>

                                 </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-4">
                                         <label for="exampleInputFile">Profile</label> <i class="text-danger asterik">*</i><?php echo isset($error['product_image']) ? $error['product_image'] : ''; ?>
                                        <input type="file" name="product_image" onchange="readURL(this);" accept="image/png,  image/jpeg" id="product_image" required/>
                                        <img id="blah" src="#" alt="" />
                                    </div>
                                </div>

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
    $('#add_doctor_form').validate({

        ignore: [],
        debug: false,
        rules: {
            name: "required",
            role: "required",
            product_image: "required",
            fees:"required",
        }
    });
    $('#btnClear').on('click', function() {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].setData('');
        }
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

<!--code for page clear-->
<script>
    function refreshPage(){
    window.location.reload();
} 
</script>

<?php $db->disconnect(); ?>