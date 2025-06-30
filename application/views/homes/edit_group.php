<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Update Group </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Group
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
                            <div class="card-title">Edit Group </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->






                        <form action="<?php echo base_url(); ?>index.php/dashboard/update_group" method="post">
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row mb-3"> <label for="inputEmail3" class="col-sm-4 col-form-label">Group
                                        name</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="id" class="form-control"
                                            value="<?php echo $group['id']; ?>">
                                        <input type="text" name="group_name" id="group_name" class="form-control"
                                            value="<?php echo $group['group_name']; ?>" required>

                                    </div>

                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer"> <button type="submit" class="btn btn-warning">Update
                                        Group</button> <a href="javascript:history.back()"
                                        class="btn float-end">Cancel</a>

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