<section class="content-header">
    <h1>
        Appointments <small><a href="home.php"><i class="fa fa-home"></i> Home</a></small>
    </h1>
   
    
</section>
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-xs-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id='users_table' class="table table-hover" data-toggle="table" data-url="get-bootstrap-table-data.php?table=appointments" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true" data-show-columns="true" data-side-pagination="server" data-pagination="true" data-search="true" data-trim-on-search="false" data-filter-control="true" data-query-params="queryParams" data-sort-name="id" data-sort-order="desc"  data-export-options='{
                            "fileName": "users-list-<?= date('d-m-Y') ?>",
                            "ignoreColumn": ["operate"] 
                        }'>
                            <thead>
                                <tr>
                                <th  data-field="id" data-sortable="true">ID</th>
                                    <th  data-field="doctor_id" data-sortable="true">Doctor Id</th>
                                    <th data-field="name" data-sortable="true">Name</th>
                                    <th  data-field="mobile" data-sortable="true">Mobile Number</th>
                                    <th  data-field="age" data-sortable="true"> Age</th>
                                    <th  data-field="disease" data-sortable="true">Disease</th>
                                    <th  data-field="place" data-sortable="true"> Place</th>
                                    <th  data-field="description" data-sortable="true">Description</th>
                                    <th  data-field="appointment_date" data-sortable="true">Appointment Date</th>
                                    <th  data-field="appointment_time" data-sortable="true">Appointment Time</th>  
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="separator"> </div>
        </div>
        <!-- /.row (main row) -->
    </section>
<script>
    function queryParams(p) {
        return {
            "category_id": $('#category_id').val(),
            "seller_id": $('#seller_id').val(),
            "community": $('#community').val(),
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>

