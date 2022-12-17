<?php
include_once('../includes/functions.php');
$function = new functions;
include_once('../includes/custom-functions.php');
$fn = new custom_functions;

$doctor_id = $_SESSION['doctor_id'];

?>
<?php
if (isset($_POST['btnAdd'])) {


        $date = $db->escapeString($_POST['date']);
        $start_time = $db->escapeString($_POST['start_time']);
        $end_time = $db->escapeString($_POST['end_time']);
        $error = array();

        if (empty($date)) {
            $error['date'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($start_time)) {
            $error['start_time'] = " <span class='label label-danger'>Required!</span>";
        }
        if (empty($end_time)) {
            $error['end_time'] = " <span class='label label-danger'>Required!</span>";
        }
      

        if (!empty($date) && !empty($start_time) && !empty($end_time)) {
           
            $sql_query = "INSERT INTO timeslots (date,start_time,end_time) VALUES ('$date','$start_time','$end_time')";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {

                $error['add_timeslot'] = " <section class='content-header'><span class='label label-success'>Timeslot Added Successfully</span></section>";
            } 
            else {
                $error['add_timeslot'] = " <span class='label label-danger'>Failed!</span>";
            }
            }
        }
?>
<section class="content-header">
    <h1>Add Timeslot <small><a href='timeslots.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Timeslots</a></small></h1>
    <?php echo isset($error['add_timeslot']) ? $error['add_timeslot'] : ''; ?>
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

                </div><!-- /.box-header -->
                <!-- form start -->
                <form name="add_timeslot_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                          <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">date</label><i class="text-danger asterik">*</i>
                                            <input type="date" id='date' name="date" class='form-control' required>
                                    </div>
                                </div>
                          </div>
                          <br>
                          <div class="row">
                               <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Start Time</label><i class="text-danger asterik">*</i><?php echo isset($error['start_time']) ? $error['start_time'] : ''; ?>
                                        <input type="time" class="form-control" name="start_time" required>
                                    </div>
                                </div>
                          </div>
                          <br>
                          <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">End Time</label><i class="text-danger asterik">*</i><?php echo isset($error['end_time']) ? $error['end_time'] : ''; ?>
                                        <input type="time" class="form-control" name="end_time" required>
                                    </div>
                                </div>
                          </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
                        <input type="reset" class="btn-warning btn" value="Clear" />
                    </div>
                </div>
                </form>
        </div>
    </div>
</section>

<div class="separator"> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
    $('#add_timeslot_form').validate({

        ignore: [],
        debug: false,
        rules: {
            date: "required",
            model: "required",
            price:"required",
            start_time:"required",
            insurance:"required",
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
<?php $db->disconnect(); ?>