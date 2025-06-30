<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand" style="background-color: #000;"> <!--begin::Brand Link--> 
        <a href="<?php echo base_url(); ?>" class="brand-link"> <!--begin::Brand Image--> 

            <img style="width:100px;" src="<?php echo base_url(); ?>/dist/assets/img/logo.jpg"/>
            <!--end::Brand Image--> <!--begin::Brand Text--> 



            <!--end::Brand Text--> </a>

        <!--end::Brand Link--> 
    </div> 
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open"> <a href="<?php echo base_url(); ?>index.php/Dashboard" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <li class="nav-item"> <a href="<?php echo base_url(); ?>index.php/Dashboard/list_groups" class="nav-link"> <i class="nav-icon bi bi-palette"></i>
                        <p>Group Manager</p>
                    </a>
                </li>
                <li class="nav-item"> <a href="<?php echo base_url(); ?>index.php/Dashboard/fetch_contacts" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>

                        <p>Contact Manager</p>


                    </a>

                </li>

                <li class="nav-item"> <a href="<?php echo base_url(); ?>index.php/Dashboard/AssignGroup" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>

                        <p>Assign Group Manager</p>


                    </a>

                </li>

                <li class="nav-item"> <a href="<?php echo base_url(); ?>index.php/Smssender" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>

                        <p>SMS Manager</p>


                    </a>

                </li>
                
                 <li class="nav-item"> <a href="<?php echo base_url(); ?>index.php/Smssender/sendIndividually" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>

                        <p>SMS individually</p>


                    </a>

                </li>

                <li class="nav-item"> <a href="<?php echo base_url(); ?>index.php/Dashboard/show_log_reports" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>

                        <p>Log report</p>


                    </a>

                </li>
               




            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar--> 