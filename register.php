<?php
include "header.php";
?>
    
    <section class="vh-100" >
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>
                      <?php
 if(isset($_POST['btnadd'])){
 $data = file_get_contents('users.json');
 $data = json_decode($data, true);
 $add_arr = array(
 'first_name' => $_POST['txtFname'],
 'email' => $_POST['txtEmail'],
 'password' => $_POST['txtPassword']
 );
 $data[] = $add_arr;
 
 $data = json_encode($data, JSON_PRETTY_PRINT);
 file_put_contents('users.json', $data);
 $data_1 = file_get_contents('result.json');
 $data_1 = json_decode($data_1, true);
 $add_arr_1 = array(
 'name' => $_POST['txtFname'],
 'email' => $_POST['txtEmail'],
 'score' => '0'
 );
 $data_1[] = $add_arr_1;
 
 $data_1 = json_encode($data_1, JSON_PRETTY_PRINT);
 file_put_contents('result.json', $data_1);
 header('location: login.php');
 }
?>
      

                      <form method="post" name="frmAdd" class="mx-1 mx-md-4">

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" name="txtFname" class="form-control" />
                            <label class="form-label" for="txtFname">Your Name</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="txtEmail" class="form-control" />
                            <label class="form-label" for="txtEmail">Your Email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" name="txtPassword" class="form-control" />
                            <label class="form-label" for="txtPassword">Password</label>
                          </div>
                        </div>
      
      
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" name="btnadd" class="btn btn-primary btn-lg">Register</button>
                        </div>
      
                      </form>
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp" class="img-fluid" alt="Sample image">
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
include "footer.php";
?>