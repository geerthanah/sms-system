<?php
//print_r($contact);die;
?>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Profile</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Profile
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
                            <div class="card-title">Profile</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->

                        <div class="card-body">

                            <form action="<?php echo site_url('Dashboard/profileUpdate'); ?>" method="post"
                                  enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Upload Profile</label>
                                    <input type="file" value="" name="profile_pic" class="form-control" />
                                    <input type="hidden" value="<?php echo $contact['profile_pic']; ?>"
                                           name="profile_pic_old" />
                                </div>

                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Full Name</label>
                                    <input type="text" value="<?php echo $contact['full_name']; ?>" name="full_name"
                                           autocomplete="off" id="full_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input type="text" name="company_name"
                                           value="<?php echo $contact['company_name']; ?>" autocomplete="off"
                                           id="company_name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="company_address" class="form-label">Company Address</label>
                                    <textarea name="company_address" id="company_address" class="form-control"
                                              rows="3"><?php echo $contact['company_address']; ?></textarea>
                                </div>


                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" value="<?php echo $contact['phone']; ?>" name="phone"
                                           autocomplete="off" id="phone" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" disabled="disabled" value="<?php echo $contact['email']; ?>"
                                           name="email" autocomplete="off" id="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" autocomplete="off" id="edit_password1" class="form-control">

                                    <input type="hidden" name="old_password" value="<?php echo $contact['password']; ?>"
                                           id="" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="password2" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password"  id="edit_password2" autocomplete="off"
                                           class="form-control" >
                                </div>


                        </div>





                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Update Profile</button> <a
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    $(document).ready(function () {
        $('#edit_password2').on('blur', function () {
            var pw2 = $(this).val();
            var pw1 = $('#edit_password1').val();



            if (pw1 !== pw2) {
                alert("Passwords did not match");
                
                 $('#edit_password2').val("");
                return false; // Prevent form submission
                
                
            } else {
                alert("Password confirmed successfully");
                return true; // Allow form submission
            }



        });
    });




</script>