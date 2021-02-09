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
             if(isset($data['allBlogs']) && !empty($data['allBlogs'])):
                
                $AllBlogs = $data['allBlogs'];
              // echo "<pre>";
                // print_r($userBlogs);
              //   echo "</pre>";
              for($i=0;$i<count($AllBlogs);$i++):
                  $time=$AllBlogs[$i]->created_at;
                  $time=$this->convertdateTowords($time);
            ?>

            <!-- Top Image -->
            <section class="top-image">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="Blogtitle">
                    <h4><?php echo $AllBlogs[$i]->title;?></h4> 



</div>
                          <div class="author">
                        <span>Author : </span><?php echo $AllBlogs[$i]->userName;?>
                      </div>
                      <?php if(!empty($AllBlogs[$i]->BlogImg)):?>
                    <div class="blog-img">
                    <img  src="<?php echo ASSETS; ?>blogImges/<?php echo $AllBlogs[$i]->BlogImg; ?>" width="100%" height="300px" alt="">
                  </div>
                <?php endif; ?>
                    <div class="down-content">
                      
                      

                      <p class="blogText"><?php echo $AllBlogs[$i]->blogText;?></p>
                      <div class="primary-button">
                        <a href="#">Read More</a>
                      </div>
                        <div class="detail">
                          <span>-category:</span><?php echo $AllBlogs[$i]->parentcat;?> |  <span>-Subcategory:</span><?php echo $AllBlogs[$i]->category;?>
                          <br>
                          <?php echo $time;?>
                        </div>
                     
                    </div>

                  </div>
                
                </div>

              </div>

    

            </section>
          


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
