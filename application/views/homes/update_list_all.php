
<main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
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
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row g-4"> <!--begin::Col-->
                       
                        <div class="col-md-6"> <!--begin::Quick Example-->
                            <!--begin::Horizontal Form-->
                            <div class="card card-warning card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">SMS Text</div>
                                </div> <!--end::Header--> <!--begin::Form-->

                              




<form action="<?php echo base_url(); ?>index.php/Smssender/update_groupText" method="post">
    <?php 
  
    
    foreach($text as $texts){?>
<!--begin::Body-->
                                    <div class="card-body">

                                    <div class="row mb-4"> 
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Language</label>
                                            <div class="col-sm-8"> 
                                             
                                            <select  class="form-control" name="sms_language" >
<option  <?php if($texts['sms_language']==1){echo "selected"; }?> value="1">Tamil</option>
<option <?php if($texts['sms_language']==2){echo "selected"; }?> value="2">Sinhala</option>
<option <?php if($texts['sms_language']==3){echo "selected"; }?> value="3">All</option>
</select>
                                            </div>
                                        </div>
                                    <div class="row mb-4"> 
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Group Name</label>
                                            <div class="col-sm-8"> 
                                        
                                            <select  class="form-control" name="group_id" >

                                            <?php
                    
                                            foreach($groups as $group){ ?>
<option value="<?php echo $group['id'];?>"><?php echo $group['group_name'];?></option>


                                            <?php }?>

                                            </select> 
                                            
                                            </div>
                                        </div>

                                        <div class="row mb-4"> 
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Title</label>
                                            <div class="col-sm-8"> 
                                                <input type="text" class="form-control" value="<?php echo $texts['sms_title'];?>" name="sms_title" id="inputEmail3">
                                                <input type="hidden" class="form-control" value="<?php echo $texts['sms_list_id'];?>" name="sms_list_id" id="inputEmail3">
                                            </div>
                                        </div>
                                        <div class="row mb-4"> 
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">SMS text</label>
                                            <div class="col-sm-8">

                                            <textarea  class="form-control" name="sms_message" id="inputEmail3"><?php echo $texts['sms_message'];?></textarea>
                                               
                                            </div>
                                        </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> <button type="submit" class="btn btn-warning">Save</button> <button type="submit" class="btn float-end">Cancel</button> </div> <!--end::Footer-->
                              
                              <?php }?>
                                </form> <!--end::Form-->
                            </div> <!--end::Horizontal Form-->
                        </div> <!--end::Col--> <!--begin::Col-->
                       
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> 
        
       
       
     