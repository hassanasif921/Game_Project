<?php
error_reporting(0);
session_start();
 if(isset($_POST['btnadd'])){
  $username= $_POST['txtEmail'];
  $password= $_POST['txtPassword'];
  
  $data = file_get_contents('users.json');
		$data = json_decode($data);
		$index = 1;
	
		foreach($data as $row){	
            if($row->email == $username && $row->password == $password)
            {
                $_SESSION['username'] =  $username;
                header("Location:index.php");
            }
        }
      }		
      
        ?>
<?php include "header.php"?>
    <style>
        .divider:after,
.divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
}
.h-custom {
  height: calc(100% - 73px);
}
@media (max-width: 450px) {
  .h-custom {
    height: 100%;
  }
}

    </style>

      <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid"
                alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
           

              <form method="POST">
      
      
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" name="txtEmail" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input type="password" name="txtPassword" class="form-control form-control-lg"
                    placeholder="Enter password" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
      
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <input type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login" name="btnadd">
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                      class="link-danger">Register</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
      </section>
<?php 
include "footer.php";
?>