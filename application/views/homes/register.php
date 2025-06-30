<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Yazhi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
           <div class="card-header text-center" style="
    background-color: #000;
">
             <img style="width:200px;" src="<?php echo  base_url();?>/dist/assets/img/logo.jpg"/>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="<?php echo site_url('post/register'); ?>" method="post" onsubmit ="return matchPassword();">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" name="full_name" autocomplete="off" id="full_name" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" name="company_name" autocomplete="off" id="company_name"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="company_address" class="form-label">Company Address</label>
                        <textarea name="company_address" id="company_address" class="form-control" rows="3"></textarea>
                    </div>


                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" autocomplete="off" id="phone" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" autocomplete="off" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="pass1" autocomplete="off"  class="form-control"
                            required>
                    </div>
                    
                     <div class="mb-3">
                        <label for="password" class="form-label">Confirm  Password</label>
                        <input type="password" name="password" id="pass2" autocomplete="off"  class="form-control"
                            required>
                    </div>
                    <div class="d-grid">
                        <button type="submit"   class="btn btn-primary">Create Account</button>
                    </div>
                     <div class="d-grid">
                         <a class="btn " href="<?php echo  base_url();?>index.php/post/index">Back to Login</a>
                    </div>
                </form>

                <div class="container mt-4">
                    <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->


            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('dist/js/adminlte.min.js'); ?>"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>
    <script>
       $(document).ready(function () {

        $("#phone").on("blur", function () {
            var mobNum = $(this).val();
            var filter = /^\d*(?:\.\d{1,2})?$/;

            if (filter.test(mobNum)) {
                if (mobNum.length == 10) {
                    alert("valid Phone numbr");




                    $.ajax({
                        url: '<?php echo base_url();?>index.php/Dashboard/cehckPhoneAdmin',
                        type: 'post',
                        data: {
                            'phone':mobNum
                            
                        },
                        success: function (response) {
                            
                       
                               
                          if(response==1){
                           alert("Phone number already Exist");
                           $("#phone").val(""); 
                           
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

function matchPassword() {  
  var pw1 = document.getElementById("pass1").value;  
  

  var pw2 = document.getElementById("pass2").value;  
  

  if(pw1 !== pw2)  
  {      alert("Passwords did not match");  
      return false;
   
  } else {  
      alert("Password created successfully");  
  
  }  
}  

</script>
   
        
</body>

</html>