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

                            <h6>Assign Group Name: <b><?php echo $glist['group_name'];?></b>
                                <p id="response"></p>
                            </h6> <button type="button" id="assignList" class="btn btn-warning">Update List</button>


 <?php
 

 
                                           $selectlist = json_decode("[" . $assignlist[0]->conatct_list . "]");
                                         
  
                                            ?>
                                            


                        </div> <!-- /.card-header -->
                        <div class="card-body">

                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Language</th>
                                        <th>Name</th>
                                        <th>Phone</th>
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
                                        <td>


                                            <input type="hidden" name="group_id" id="group_id" class="form-control"
                                                value="<?php echo $glist['id']; ?>">
                                            
                                           
                                            
                                            <input class="form-check-input"  <?php if (in_array($contact['id'], $selectlist)) {
                                                                                                    echo "checked";
                                                                                                } ?> name="contact_id[]" type="checkbox"
                                                value="<?php echo $contact['id']; ?>" id="invalidCheck"> 
                                                    
                                                

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