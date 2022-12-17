<?php
include_once('../includes/functions.php');
$function = new functions;
include_once('../includes/custom-functions.php');
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
if (isset($_POST['btnUpdate'])) {

        $date = $db->escapeString($_POST['date']);
        $start_time = $db->escapeString($_POST['start_time']);
        $end_time = $db->escapeString($_POST['end_time']);
        $error = array();



        if ( !empty($date)&& !empty($start_time) && !empty($end_time)) {
        
           
            $sql_query = "UPDATE timeslots SET date='$date',start_time='$start_time',end_time='$end_time' WHERE id =  $ID";
            $db->sql($sql_query);
            $result = $db->getResult();
            if (!empty($result)) {
                $result = 0;
            } else {
                $result = 1;
            }

            if ($result == 1) {
                $error['update_timeslot'] = " <section class='content-header'><span class='label label-success'>Timeslots Updated Successfully</span></section>";
            } else {
                $error['update_timeslot'] = " <span class='label label-danger'>Failed!</span>";
            }
            }
        }
// create array variable to store previous data
$data = array();

$sql_query = "SELECT * FROM timeslots WHERE id =$ID";
$db->sql($sql_query);
$res = $db->getResult();
?>
<section class="content-header">
    <h1>Edit Timeslot <small><a href='timeslots.php'> <i class='fa fa-angle-double-left'></i>&nbsp;&nbsp;&nbsp;Back to Timeslots</a></small></h1>
    <?php echo isset($error['update_timeslot']) ? $error['update_timeslot'] : ''; ?>
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
                <form name="edit_timeslot_form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Date</label><i class="text-danger asterik">*</i><?php echo isset($error['date']) ? $error['date'] : ''; ?>
                                    <input type="date" class="form-control" name="date" value="<?php echo $res[0]['date']; ?>">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Start Time</label><i class="text-danger asterik">*</i><?php echo isset($error['start_time']) ? $error['start_time'] : ''; ?>
                                    <input type="time" class="form-control" name="start_time" value="<?php echo $res[0]['start_time']; ?>">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">End Time</label><i class="text-danger asterik">*</i><?php echo isset($error['end_time']) ? $error['end_time'] : ''; ?>
                                    <input type="time" class="form-control" name="end_time" value="<?php echo $res[0]['end_time']; ?>">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
                    </div>

                </form>

            </div><!-- /.box -->
        </div>
    </div>
</section>

<div class="separator"> </div>
<?php $db->disconnect(); ?>