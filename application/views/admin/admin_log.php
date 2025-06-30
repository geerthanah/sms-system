<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Log report</h3>
                </div>

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-12">
                        <div class="card-header">
                            Our Client
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                            <div class="app-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card mb-12">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="myTable" class="table table-striped table-bordered"
                                                            style="width:100%">
                                                            <caption>Log Report Table</caption>
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Log ID</th>
                                                                    <th>Group Name</th>
                                                                    <th>Phone</th>
                                                                    <th>Log Date & Time</th>
                                                                    <th>Status</th>
                                                                    <th>User ID</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (!empty($logs)) : ?>
                                                                <?php foreach ($logs as $index => $log) : ?>
                                                                <tr>
                                                                    <td><?php echo $index + 1; ?></td>
                                                                    <td><?php echo htmlspecialchars($log['log_id'], ENT_QUOTES, 'UTF-8'); ?>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($log['group_name'], ENT_QUOTES, 'UTF-8'); ?>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($log['phone'], ENT_QUOTES, 'UTF-8'); ?>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($log['log_date_time'], ENT_QUOTES, 'UTF-8'); ?>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($log['sending_status'], ENT_QUOTES, 'UTF-8'); ?>
                                                                    </td>
                                                                    <td><?php echo htmlspecialchars($log['user_id'], ENT_QUOTES, 'UTF-8'); ?>
                                                                    </td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                                <?php else : ?>
                                                                <tr>
                                                                    <td colspan="7">No logs available.</td>
                                                                </tr>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div> <!-- /.col -->

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <!--end::App Content-->
</main>











<script type="text/javascript">
// Delete Contact Confirmation
function confirmDelete(url) {


    alertify.confirm('Are you sure you want to delete this contact?',
        function() {
            window.location.href = url; // Redirect to the delete URL if "Yes" is clicked
        },
        function() {
            alertify.error('Contact not deleted'); // Show error message if "No" is clicked
        }
    );
}
</script>