<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Assign List</h3>
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
                            <a href="<?php echo site_url('dashboard/add_groups_all'); ?>"
                                class="btn btn-primary mb-3">Add New Group</a>

                            <a href="<?php echo site_url('dashboard/import_contacts'); ?>"
                                class="btn btn-primary mb-3">Import List to Group</a>
                                  <a href="<?php echo site_url('dashboard/ListOnContact'); ?>"
                                class="btn btn-primary mb-3">Group With Contact</a>
                                
                        </div> <!-- /.card-header -->
                        <div class="card-body">
                          
                      <table  id="myTable" class="table table-striped table-bordered" style="width:100%" >
                                <thead>
                                    <tr>

                                        <th style="width: 10px">#</th>
                                        <th>Group Name</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($groups as $key => $group): ?>
                                    <tr class="align-middle">
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $group['group_name']; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('dashboard/edit_contactAssign/' . $group['id']); ?>"
                                                class="btn btn-warning">Assign</a>
                                            <!-- <a href="<?php echo site_url('dashboard/delete_group/' . $group['id']); ?>"
                                                class="btn btn-danger">Delete</a> -->

                                            <a href="javascript:void(0);"
                                                onclick="confirmDelete('<?php echo site_url('dashboard/delete_group/' . $group['id']); ?>')"
                                                class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
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

<script>
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
        tr[i].style.display = "none"; // Hide row by default
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) { // Loop through all columns
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = ""; // Show row if match is found
                    break;
                }
            }
        }
    }
}
</script>


<script type="text/javascript">
// Delete Group Confirmation
function confirmDelete(url) {
    alertify.confirm('Are you sure you want to delete this group?',
        function() {
            window.location.href = url; // Redirect to the delete URL if "Yes" is clicked
        },
        function() {
            alertify.error('Group not deleted'); // Show error message if "No" is clicked
        }
    ).set({
        'labels': {
            ok: 'Yes',
            cancel: 'No'
        }, // Custom button labels
        'padding': false, // Optional: Remove padding
        'transition': 'zoom', // Optional: Animation effect
        'closable': false, // Optional: Disable close button
    });
}
</script>