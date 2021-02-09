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
            <?php if(isset($data['userProfile'])){
                    $userData = $data['userProfile'];
                    $UnpublishPost=$userData->totalPost-$userData->publishPost;
            }?>


            <div class="row py-0 px-0">
    <div class="col-md-12 mx-auto">

        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3">
                        <?php 
                        if(isset($userData->userPhoto) &&  empty($userData->userPhoto)): ?>
                        <img src="<?php echo ASSETS;?>userProfile/no_profile.png" width="100px" height="100px"  class="rounded mb-2 img-thumbnail">
                        <?php else:?>
                            <img src="<?php echo ASSETS;?>userProfile/<?php echo  $userData->userPhoto; ?>" width="100px" height="100px"  class="rounded mb-2 img-thumbnail">
                        <?php endif;?>
                        <a href="<?php echo ROOT; ?>userProfile/UpdateProfileForm/<?php echo $userData->user_id;?>" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a></div>
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-0"><?php if(isset($userData->userName)){echo $userData->userName;}?></h4>
                        <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i></p>
                    </div>
                </div>
            </div>
            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $userData->totalPost?></h5><small class="text-muted"><i class="fa fa-image mr-1"></i><a href="<?php echo ROOT; ?>usersBlog/index/<?php echo $userData->user_id;?>">post</a></small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $userData->publishPost;?></h5><small class="text-muted"> <i class="fa fa-user mr-1"></i>Publish</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $UnpublishPost;?></h5><small class="text-muted"> <i class="fa fa-user mr-1"></i>Unpublish</small>
                    </li>
                </ul>
            </div>
            <div class="px-4 py-3">
                <h5 class="mb-0">About</h5>
                <div class="p-4 rounded shadow-sm bg-light">
                    <p class="font-italic mb-0">Email: <?php echo $userData->email; ?></p>
                    <p class="font-italic mb-0">status:<?php echo $userData->userStatus?></p>
                    <p class="font-italic mb-0">Activat Date:<?php  echo $userData->created_at;?></p>
                </div>
            </div>
            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                </div>
                <!-- <div class="row">
                    <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pl-lg-1"><img src="https://images.unsplash.com/photo-1475724017904-b712052c192a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm"></div>
                </div> -->
            </div>
        </div>
    </div>
</div>

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
 