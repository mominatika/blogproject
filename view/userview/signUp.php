<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Ramayana - Free Bootstrap 4 CSS Template</title>
      <?php 
     
      require_once __DIR__.'/../content/header.php';
      ?>


  </head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

            <!-- Header -->
            <header id="header">
              <div class="logo">
                <a href="index.html">Ramayana</a>
              </div>
            </header>

            <!-- Banner -->
           

            <!-- Services -->
              <main class="d-flex  align-items-center">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?php echo ASSETS;?>images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="<?php echo ASSETS; ?>images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form action="<?php echo ROOT ?>userRegister/doSignUp" method="POST">
              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="email" class="sr-only">username</label>
                    <input type="text" name="username" id="UserName" class="form-control" value="<?php if(isset($data['UserName'])) {echo $data['UserName'];}?>" placeholder="First Name">
                    <?php if(isset($data['UserNameErr'])) {echo $data['UserNameErr'];}?>
                  </div>

                   
                   <div class="form-group">
                    <label for="email" class="sr-only">username</label>
                    <input type="password" name="pwd" id="UserName" class="form-control" value="<?php if(isset($data['password'])) {echo $data['password'];}?>" placeholder="password">
                    <?php if(isset($data['passwordErr'])) {echo $data['passwordErr'];}?>
                  </div>

                </div>
                <!-- end cols -->
                <div class="col-md-6">
                

                    <div class="form-group">
                    <label for="email" class="sr-only">username</label>
                    <input type="email" name="email" id="UserName" class="form-control" value="<?php if(isset($data['email'])) {echo $data['email'];}?>" placeholder="Email">
                    <?php if(isset($data['EmailErr'])) {echo $data['EmailErr'];}?>
                  </div>

     
                            
                  <div class="form-group">
                    <label for="email" class="sr-only">username</label>
                    <input type="password" name="cnfpwd" id="UserName" class="form-control" placeholder="confirm Password">
                    <?php if(isset($data['cnfpwdErr'])) {echo $data['cnfpwdErr'];}?>
                  </div>

                </div>

                 <!-- end cols -->
              </div>
                  <input name="SignUp" id="login" class="btn  login-btn mb-4" type="submit" value="SignUp">

            </form>




                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">don't have an account? <a href="<?php echo ROOT ?>userLogin/" class="text-reset">Login</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
            <!-- Top Image -->
           

            <!-- Left Image -->
            

            <!-- Right Image -->
           

          </div>
        </div>

      <!-- Sidebar -->
        
              
            <!-- Menu -->
            <?php  require_once __DIR__.'/../content/userSidebar.php'; ?>
           

            <!-- Featured Posts -->
            

            <!-- Footer -->
          

          <!-- </div> -->
        </div>

    </div>


  <?php
    require_once __DIR__.'/../content/footer.php'; 
  ?>





  </body>

</html>
 