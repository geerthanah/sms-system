<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">SMS SENDER</h3>
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
                            <a href="<?php echo site_url('Smssender/add_list_all'); ?>" class="btn btn-primary mb-3">Add
                                New SMS</a>
                        </div> <!-- /.card-header -->
                        <div class="card-body">

                         
                              <table  id="myTable" class="table table-striped table-bordered" style="width:100%" >
                                <thead>
                                    <tr>

                                        <th style="width: 10px">#</th>
                                        <th>Group Name</th>
                                        <th>Language</th>
                                        <th>Title</th>
                                        <th>SMS Text</th>
                                        <th>Date</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($groups as $key => $group): ?>
                                    <tr class="align-middle">
                                        <td><?php echo $key + 1; ?></td>
                                        <td>
                                            
                                        
                                        
                                        <?php 
                                        
                                        if(!empty($group['group_name'])){
                                        
                                        echo $group['group_name'];
                                        }else{

echo  "All Group";

                                        
                                        }

                                        ?>
                                        
                                    
                                    </td>
                                        <td>
                                            <?php if($group['sms_language']==1){ echo "Tamil";}; ?>
                                            <?php if($group['sms_language']==2){ echo "Sinhala";}; ?>
                                            <?php if($group['sms_language']==3){ echo "All";}; ?>
                                        </td>
                                        <td><?php echo $group['sms_title']; ?></td>
                                        <td><?php echo $group['sms_message']; ?></td>
                                        <td><?php echo $group['send_date']; ?></td>
                                        <td>


                                            <!-- <a href="<?php echo site_url('Smssender/edit_groupText/' . $group['sms_list_id']); ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?php echo site_url('Smssender/delete_group/' . $group['sms_list_id']); ?>"
                                                class="btn btn-danger">Delete</a>
                                            <?php if($group['send_status']==0){?>
                                            <a href="<?php echo site_url('Smssender/sendtext_group/' . $group['sms_list_id']); ?>"
                                                class="btn btn-danger">Send</a>

                                            <?php }?> -->

                                            <a href="<?php echo site_url('Smssender/edit_groupText/' . $group['sms_list_id']); ?>"
                                               
                                                class="btn btn-warning">Edit</a>

                                            <a href="javascript:void(0);"
                                                onclick="confirmDelete('<?php echo site_url('Smssender/delete_group/' . $group['sms_list_id']); ?>')"
                                                class="btn btn-danger">Delete</a>

                                            <?php if($group['send_status']==0){ ?>
                                            <a href="javascript:void(0);"
                                                onclick="confirmSend('<?php echo site_url('Smssender/sendtext_group/' . $group['sms_list_id']); ?>')"
                                                class="btn btn-danger">Send</a>
                                            <?php } ?>

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
        );
    }

    // Send Message Success Confirmation
    function confirmSend(url) {
        alertify.success('Message sent successfully!'); // Show success message immediately
        window.location.href = url; // Redirect to the send URL
    }
</script>


