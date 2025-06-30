<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Add Contact</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Add Contact
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
                            <div class="card-title">Add Contact </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->

                        <form action="<?php echo base_url(); ?>index.php/dashboard/contactSave" method="post">

                            <!--begin::Body-->

                            <div class="card-body">

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" name="language[]" type="checkbox" value="1"
                                            id="invalidCheck"> <label class="form-check-label" for="invalidCheck">
                                            Tamil
                                        </label>

                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" name="language[]" type="checkbox" value="2"
                                            id="invalidCheck"> <label class="form-check-label" for="invalidCheck">
                                            Sinhala
                                        </label>

                                    </div>

                                    <!-- <div class="form-check"> 
                                        <input class="form-check-input"  name="language[]" type="checkbox" value="3" id="invalidCheck" > <label class="form-check-label" for="invalidCheck">
                                            All
                                        </label>

                                    </div> -->
                                </div>

                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value=""
                                        placeholder="Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value=""
                                        placeholder="Phone number" required>
                                    <small id="phone-feedback" class="text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="emailaddress" id="email" class="form-control" value=""
                                        placeholder="Email">
                                    <small id="email-feedback" class="text-danger"></small>
                                </div>

                            </div>

                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Add Contact</button>
                                <a href="javascript:history.back()" class="btn float-end">Cancel</a>
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
<!-- <script>
    $(document).ready(function () {
        $('#email').on('blur', function () {
            var email = $(this).val();
            if (email) {
                $.ajax({
                    url: '<?php echo site_url("Dashboard/checkEmail"); ?>', // Replace 'controller_name' with your controller name
                    method: 'POST',
                    data: {
                        emailaddress: email
                    },
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'error') {
                            $('#email-feedback').text(response.message); // Show error message
                            $('#email').addClass('is-invalid'); // Highlight the input field
                        } else {
                            $('#email-feedback').text(''); // Clear error message
                            $('#email').removeClass('is-invalid'); // Remove highlight
                        }
                    }
                });
            }
        });
    });

    $(document).ready(function () {

        $("#phone").on("focusout", function () {
            var mobNum = $(this).val();
            var filter = /^\d*(?:\.\d{1,2})?$/;

            if (filter.test(mobNum)) {
                if (mobNum.length == 10) {
                    // alert("valid Phone numbr");







                    $.ajax({
                        url: '<?php echo base_url(); ?>index.php/Dashboard/cehckPhone',
                        type: 'post',
                        data: {
                            'phone': mobNum

                        },
                        success: function (response) {


                            if (response == 1) {
                                $("#phone").val("");
                                alert("Phone number already Exist");


                            }


                        }
                    });




                } else {
                    alert('Please put 10  digit mobile number');

                    return false;
                }
            } else {
                alert('Not a valid Phone number');

                return false;
            }

        });

    });


</script>
 -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include AlertifyJS -->
<script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
<script>
$(document).ready(function() {
    // Email validation and confirmation
    $('#email').on('blur', function() {
        var email = $(this).val();
        if (email) {
            alertify.confirm(
                `You entered the email address: ${email}. Are you sure it's correct?`,
                function() {
                    $.ajax({
                        url: '<?php echo site_url("Dashboard/checkEmail"); ?>',
                        method: 'POST',
                        data: {
                            emailaddress: email
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'error') {
                                $('#email-feedback').text(response.message);
                                $('#email').addClass('is-invalid');
                            } else {
                                $('#email-feedback').text('');
                                $('#email').removeClass('is-invalid');
                            }
                        },
                        error: function() {
                            alertify.error(
                                "An error occurred while validating the email.");
                        }
                    });
                    alertify.success('Email address confirmed');
                },
                function() {
                    $('#email').val('');
                    alertify.error('Email address cleared');
                }
            );
        }
    });

    // Phone number validation and duplicate check
    $('#phone').on('blur', function() {
        var mobNum = $(this).val();
        var filter = /^\d{10}$/; // Validates a 10-digit number

        if (filter.test(mobNum)) {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php/Dashboard/cehckPhone',
                type: 'POST',
                data: {
                    phone: mobNum
                },
                success: function(response) {
                    if (response == 1) {
                        $('#phone').val('');
                        alertify.alert("Phone number already exists").setHeader('Alert');
                    } else {
                        $('#phone-feedback').text('');
                    }
                },
                error: function() {
                    alertify.error("An error occurred while checking the phone number.");
                }
            });
        } else {
            alertify.alert("Please enter a valid 10-digit mobile number").setHeader('Alert');
        }
    });
});
</script>