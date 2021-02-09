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

            <?php
             if(isset($data['userBlogs']) && !empty($data['userBlogs'])):
                
                $userBlogs = $data['userBlogs'];
              // echo "<pre>";
                // print_r($userBlogs);
              //   echo "</pre>";
             
                  $time=$userBlogs[0]->created_at;
                  $time=$this->convertdateTowords($time);
            ?>
            <?php  for($i=0;$i<count($userBlogs);$i++):?>
            <!-- Top Image -->
            <section class="top-image">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="Blogtitle">
                    <h4><?php echo $userBlogs[$i]->title;?></h4> 

                 <div> 
                  <a href="<?php echo ROOT;?>createBlog/updateBlogForm/<?php echo $userBlogs[$i]->BlogSlug;?>"><i class="fa fa-edit fa-2x setting_icon"></i></a>
                   <a href="<?php echo ROOT;?>createBlog/DeleteBlog/<?php echo $userBlogs[$i]->BlogSlug;?>"><i class="fa fa-trash fa-2x setting_icon"></i></a>
                 </div>


</div>
                          <div class="author">
                        <span>Author : </span><?php echo $userBlogs[$i]->userName;?>
                      </div>
                      <?php if(!empty($userBlogs[$i]->BlogImg)):?>
                    <div class="blog-img">
                    <img  src="<?php echo ASSETS; ?>blogImges/<?php echo $userBlogs[$i]->BlogImg; ?>" width="100%" height="300px" alt="">
                  </div>
                <?php endif; ?>
                    <div class="down-content">
                      
                      

                      <p class="blogText"><?php echo $userBlogs[$i]->blogText;?></p>
                      <div class="primary-button">
                        <a href="#">Read More</a>
                      </div>
                        <div class="detail">
                          <span>-category:</span><?php echo $userBlogs[$i]->parentcat;?> |  <span>-Subcategory:</span><?php echo $userBlogs[$i]->category;?>
                          <br>
                          <?php echo $time;?>
                        </div>
                        <!-- <div class="detail">
                            <?php echo $time;?>
                        </div> -->
                    </div>

                  </div>
                
                </div>

              </div>

    

                  
            </section>
            <!-- <?php echo $userBlogs[$i]->id;?> -->


        <?php endfor; ?>
              <?php else:?>
                <h3>No Blog Is Created Yet</h3>

            <?php endif; ?>

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
