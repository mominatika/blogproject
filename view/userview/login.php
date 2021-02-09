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
              <main class="d-flex align-items-center">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="<?php echo ASSETS;?>images/login.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="<?php echo ASSETS; ?>images/logo.svg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Login your account</p>
              <?php
             echo $this->flash('signUpFail','alert alert-success');
              $this->flash('inactive','alert alert-danger');
              ?>

              <form action="<?php echo ROOT;?>login/doLogin" method="POST">
                                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php if(isset($data['email'])){ echo $data['email']; } ?>" placeholder="Email address">
                  <!-- </div> -->
                  <?php if(isset($data['emailErr'])){ echo $data['emailErr']; } ?>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?php if(isset($data['password'])){ echo $data['password']; } ?>"  placeholder="***********">
                    
                     <?php if(isset($data['passwordErr'])){ echo $data['passwordErr']; } ?>
                  </div>
                  <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4"  value="Login">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">don't have an account? <a href="<?php echo ROOT ?>userRegister/" class="text-reset">SignUp</a></p>
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
            

          </div>
        

    </div>


  <?php
    require_once __DIR__.'/../content/footer.php'; 
  ?>

  </body>

</html>
