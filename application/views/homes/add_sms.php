<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Design SMS</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Design SMS
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
                            <div class="card-title">SMS individually</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->






                        <form action="<?php echo base_url(); ?>index.php/Smssender/send_sms_singal" method="post">

                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="row mb-4">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" />

                                        <div id="countryList" style=" z-index: 9991 !important; position: absolute;
       top:35%;"></div>

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="sms_message" class="col-sm-4 col-form-label">SMS Text</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="sms_message" id="inputEmail3"
                                            oninput="countCharacters()" maxlength="480"></textarea>
                                        <small id="charCount" class="form-text text-muted">0 / 480 characters</small>
                                    </div>
                                </div>

                                <div class="row mb-4">

                                    <div class="col-sm-12">
                                        <ul style="color:red;">
                                            <li>Apostrophe and Ampersand are not allowed ( & @ ; ' " / \ )</li>
                                            <li>Don't use enter key for new line</li>
                                            Use \n For New Line<br />
                                            eg: Dear Customer\nThank your<br />
                                        </ul>
                                    </div>
                                </div>



                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer"> <button type="submit" class="btn btn-warning">Send</button>
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

<script>
function countCharacters() {
    // Get the textarea and the small element
    var textarea = document.getElementById('inputEmail3');
    var charCount = document.getElementById('charCount');

    // Get the length of the text in the textarea
    var textLength = textarea.value.length;

    // Update the small element with the character count
    charCount.textContent = textLength + " / 480 characters";
}
</script>