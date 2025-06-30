<style>
    
    .dt-search{
    
    display: none;
    
}
</style>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Contact With Group</h3>
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



                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row" style="margin-bottom:20px;">

                                <div class="col-md-3">
                                    <select class="form-control " name="contact_id" id="contact_id" >
                                        <option value="">Name</option>
                                        <?php foreach ($contacts as $contact) { ?>

                                            <option value="<?php echo $contact['id']; ?>"><?php echo $contact['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <select class="form-control " name="group_id" id="group_id">
                                        <option value="">Group Name</option>
                                        <?php foreach ($groups as $group) { ?>

                                            <option value="<?php echo $group['id']; ?>"><?php echo $group['group_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                 <div class="col-md-3">
                                     
                                     <input type="text" class="form-control " placeholder="Phone Number" name="serach_id" id="serach_id"/>
                                    
                                </div>
                                
                            </div>
                            
                               <table  id="empTable" class="table table-striped table-bordered" style="width:100%" >
                         
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Group </th>
                                    </tr>
                                </thead>
                                <tbody>

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
                function () {
                    window.location.href = url; // Redirect to the delete URL if "Yes" is clicked
                },
                function () {
                    alertify.error('Contact not deleted'); // Show error message if "No" is clicked
                }
        );
    }
</script>