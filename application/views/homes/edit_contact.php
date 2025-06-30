<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Contact</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            General Form
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
                <div class="col-12">

                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6">
                    <!--begin::Quick Example-->
                    <!--begin::Horizontal Form-->
                    <div class="card card-warning card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Edit Contact</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->

                        <form action="<?php echo base_url(); ?>index.php/dashboard/update_contact" method="post">
                            <div class="card-body">

                                <div class="col-12">
                                    <div class="form-check">

                                        <?php
  $select_list = json_decode("[" . $contact_no['language'] . "]");
                                                ?>
                                        <input class="form-check-input" name="language[]" type="checkbox" value="1" <?php if (in_array(1, $select_list)) {
                                        echo "checked";
                                    } ?> id="invalidCheck"> <label class="form-check-label" for="invalidCheck">
                                            Tamil
                                        </label>

                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" name="language[]" type="checkbox" value="2" <?php if (in_array(2, $select_list)) {
                                        echo "checked";
                                    } ?> id="invalidCheck"> <label class="form-check-label" for="invalidCheck">
                                            Sinhala
                                        </label>

                                    </div>

                                  
                                </div>


                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>

                                    <input type="hidden" name="id" id="name" class="form-control"
                                        value="<?php echo $contact_no['id']; ?>" required>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="<?php echo $contact_no['name']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="<?php echo $contact_no['phone']; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label">Email </label>
                                    <input type="email" name="emailaddress" id="phone" class="form-control"
                                        value="<?php echo $contact_no['emailaddress']; ?>" placeholder="Email ">
                                </div>

                            </div>





                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update Contact</button> <a
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