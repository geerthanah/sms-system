<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="mb-0">   Message hase been sent</h3>
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
           
        <h1></h1>
           
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