<?php 
	require_once __DIR__.'/../content/header.php';
	// require_once 'content/navbar.php';
?>
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-3">
            <!-- <img src="<?php echo ASSETS;?>images/login.jpg" alt="login" class="login-card-img"> -->
          </div>
          <div class="col-md-5">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="<?php echo ASSETS; ?>images/logo.svg" alt="logo" class="logo">
                 <!-- <img src="assets/images/logo.svg" alt="logo" class="logo"> -->
              </div>
              <!-- <?php echo ROOT; ?> -->
              <p class="login-card-description">LogIn your account</p>
              <form action="<?php echo ROOT; ?>ADlogin\doLogin" method="POST">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="Ademail" id="email" class="form-control" value="<?php if(isset($data['AdminEmail'])){echo $data['AdminEmail'];} ?>" placeholder="Email address OR UserName">
                    <?php  if(isset($data['adEmail_Err'])){ echo $data['adEmail_Err']; }?>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="Adpassword" id="password" class="form-control" <?php if(isset($data['AdminEmail'])){echo $data['AdminEmail'];} ?>placeholder="***********">
                       <?php  if(isset($data['adPwdErr'])){ echo $data['adPwdErr']; }?>
                       <!-- adPwd' -->
                  </div>
                  <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4"  value="Login">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <!-- <p class="login-card-footer-text">Don't have an account? <a href="<?php echo ROOT ?>register">Register here</a></p> -->
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
           <div class="col-md-3">
            <!-- <img src="<?php echo ASSETS;?>images/login.jpg" alt="login" class="login-card-img"> -->
          </div>
        </div>
      </div>
      
    </div>
  </main>
<?php 

	require_once __DIR__.'/../content/footer.php';
?>