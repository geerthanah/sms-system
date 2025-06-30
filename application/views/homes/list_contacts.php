<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Contact List</h3>
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
                            <a href="<?php echo site_url('dashboard/add_contacts_all'); ?>"
                                class="btn btn-primary mb-3">Add New Contact</a>


                        </div> <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Language</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>E-Mail</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    <?php foreach ($contacts as $contact): ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>

                                        <?php
  $select_list = json_decode("[" . $contact['language'] . "]");
                                                ?>
                                        <td><?php if (in_array(1, $select_list)) {
                                        echo "Tamil";
                                    } ?>

                                            <?php if (in_array(2, $select_list)) {
                                        echo "Sinhala";
                                    } ?>

                                            <?php if (in_array(3, $select_list)) {
                                        echo "All Language";
                                    } ?>
                                        </td>
                                        <td><?php echo $contact['name']; ?></td>
                                        <td><?php echo $contact['phone']; ?></td>
                                        <td><?php echo $contact['emailaddress']; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('dashboard/edit_contact/' . $contact['id']); ?>"
                                                class="btn btn-warning">Edit</a>
                                            <!-- <a href="<?php echo site_url('dashboard/delete_contact/' . $contact['id']); ?>"
                                                class="btn btn-danger">Delete</a> -->
                                            <a href="javascript:void(0);"
                                                onclick="confirmDelete('<?php echo site_url('dashboard/delete_contact/' . $contact['id']); ?>')"
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