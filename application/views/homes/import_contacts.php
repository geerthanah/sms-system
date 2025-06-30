<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Import Form</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Import
                        </li>
                    </ol>
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
            <div class="row g-4">



                <!--begin::Col-->
                <div class="col-md-6">
                    <!--begin::Quick Example-->
                    <!--begin::Horizontal Form-->
                    <div class="card card-warning card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Import Contacts</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->






                        <form action="<?php echo base_url(); ?>index.php/dashboard/handle_import_contacts"
                            enctype="multipart/form-data" method="post">

                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="row mb-4">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Language</label>
                                    <div class="col-sm-8">

                                        <select class="form-control" name="sms_language">
                                            <option value="1">Tamil
                                            </option>
                                            <option value="2">Sinhala
                                            </option>
                                            <option value="3">All
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Group Name</label>
                                    <div class="col-sm-8">

                                        <select class="form-control" name="group_id">

                                            <?php
                    
                                            foreach($groups as $group){ ?>
                                            <option value="<?php echo $group['id'];?>">
                                                <?php echo $group['group_name'];?></option>


                                            <?php }?>

                                        </select>

                                    </div>
                                </div>



                                <div class="row mb-4">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">CSV</label>
                                    <div class="col-sm-8">

                                        <input type="file" name="fileex" class="form-control" accept=".csv" required>
                                    </div>
                                </div>
                                
                                 <div class="row mb-4">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">

                                      if you dont have csv format please  <a href="<?php echo base_url();?>/dist/contacts_list.csv">Download</a>
                                    </div>
                                </div>


                            </div>


                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Import Contacts</button> <a
                                    href="javascript:history.back()" class="btn float-end">Cancel</a>

                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Horizontal Form-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->

            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>





