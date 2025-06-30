<?php

//print_r($contact);die;

?>

<main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
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
                                    <div class="card-title">Profile</div>
                                </div> <!--end::Header--> <!--begin::Form-->

                                <div class="card-body">

                                <form action="<?php echo site_url('AdminDash/profileUpdate'); ?>" method="post">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                         <input type="hidden" value="<?php echo $contact['id'];?>" name="id" autocomplete="off" id="full_name" class="form-control"/>
                        <input type="text" value="<?php echo $contact['full_name'];?>" name="full_name" autocomplete="off" id="full_name" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" name="company_name" value="<?php echo $contact['company_name'];?>"  autocomplete="off" id="company_name"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="company_address" class="form-label">Company Address</label>
                        <textarea name="company_address"   id="company_address" class="form-control" rows="3"><?php echo $contact['company_address'];?></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" value="<?php echo $contact['phone'];?>" name="phone" autocomplete="off" id="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" name="company_name" value="<?php echo $contact['company_name'];?>"  autocomplete="off" id="company_name"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">API KEY</label>
                        <input type="text" name="apiKey" value="<?php echo $contact['apiKey'];?>"  autocomplete="off" id="company_name"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">USER ID</label>
                        <input type="text" name="userID" value="<?php echo $contact['userID'];?>"  autocomplete="off" id="company_name"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">SENDER ID</label>
                        <input type="text" name="senderId" value="<?php echo $contact['senderId'];?>"  autocomplete="off" id="company_name"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" disabled="disabled" value="<?php echo $contact['email'];?>" name="email" autocomplete="off" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password"  id="password" class="form-control">

                             <input type="hidden" name="old_password"  value="<?php echo $contact['password'];?>" id="password" class="form-control"
                           >
                    </div>
                  
              
                    </div>

                               



                                  <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer">
                                         <button type="submit" class="btn btn-warning">Update Profile</button> <button type="submit" class="btn float-end">Cancel</button> </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div> <!--end::Horizontal Form-->
                        </div> <!--end::Col--> <!--begin::Col-->
                       
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> 
        
       
      

