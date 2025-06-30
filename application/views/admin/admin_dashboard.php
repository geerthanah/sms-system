<main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Client</h3>
                        </div>
                       
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> 
            
            <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-12">
                                <div class="card-header">
                                Our Client
                                </div> <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>

                                            <th style="width: 10px">#</th>
                                            <th>Full Name</th>
                    <th>Company Name & Address </th>
                 
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Api key</th>
                    <th>User ID</th>
                    <th>Sender ID</th>
                    <th>Action</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        
                                     
                                        foreach ($users as $user): ?>
                <tr>
                     <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['full_name']; ?></td>
                    <td><?php echo $user['company_name']; ?><br/><?php echo $user['company_address']; ?></td>
                 
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['apiKey']; ?></td>
                    <td><?php echo $user['userID']; ?></td>
                    <td><?php echo $user['senderId']; ?></td>
                    <td>
                    <a href="<?php echo site_url('AdminDash/profile/' . $user['id']); ?>"
                    class="btn btn-warning btn-sm">Edit</a>
                    
                    <a href="<?php echo site_url();?>"    class="btn btn-primary btn-sm">Clint Login</a>
                     <a href="javascript:void(0);"
                         onclick="confirmDelete('<?php echo site_url('AdminDash/delete_contact/' . $user['id']); ?>')"
                        
                        
                      
                    class="btn btn-warning btn-sm">Delete</a>
                    
                    </td>



                </tr>
                <?php endforeach; ?>
                                       
                                           
                                        </tbody>
                                    </table>
                                </div> <!-- /.card-body -->
                               
                            </div>
                             <!-- /.card -->
                         
                        </div> <!-- /.col -->
                      
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
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



