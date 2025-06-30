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
                            <div class="card-title">SMS Text</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->






                        <form action="<?php echo base_url(); ?>index.php/Smssender/groupSave" method="post">

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
                                        <option value="0">All List</option>


                               
                                            <?php
                    
                                            foreach($groups as $group){ ?>
                                            <option value="<?php echo $group['id'];?>">
                                                <?php echo $group['group_name'];?></option>


                                            <?php }?>

                                        </select>

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Title</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="sms_title" id="inputEmail3">

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="sms_message" class="col-sm-4 col-form-label">SMS Text</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="sms_message" id="sms_message"
                                            oninput="countCharacters()" maxlength="480"></textarea>
                                        <small id="charCount" class="form-text text-muted">0 / 480 characters</small>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer"> <button type="submit" class="btn btn-warning">Save</button>
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
    var textarea = document.getElementById('sms_message');
    var charCount = document.getElementById('charCount');

    // Get the length of the text in the textarea
    var textLength = textarea.value.length;

    // Update the small element with the character count
    charCount.textContent = textLength + " / 480 characters";
}
</script>