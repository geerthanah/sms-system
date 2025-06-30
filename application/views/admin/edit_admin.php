<?php

//print_r($contact);die;

?>

<main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Admin</h3>
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

                                <form action="<?php echo site_url('AdminDash/adminUpdate'); ?>" method="post">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                         <input type="hidden" value="<?php echo $admin['id'];?>" name="id" autocomplete="off" class="form-control"/>
                        <input type="text" value="<?php echo $admin['name'];?>" name="name"  class="form-control"
                            required>
                    </div>
                                    
                                    <div class="mb-3">
                        <label for="full_name" class="form-label">Email Address </label>
                      
                        <input type="email" value="<?php echo $admin['email'];?>" name="email"  id="name" class="form-control"
                            required>
                    </div>
                  
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password"  id="password" class="form-control">

                             <input type="hidden" name="old_password"  value="<?php echo $admin['password'];?>" id="password" class="form-control"
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
        
       
      

