
<?php require_once __DIR__.'/../content/adminheader.php'?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once __DIR__.'/../content/adminsidebar.php'?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php require_once __DIR__.'/../content/adminNavbar.php'?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php 
                    // print_r($data);
                    ?>
                       <!-- DataTales Example -->
                        <a href="<?php echo ROOT;?>allUsers/userPostTable/<?php echo $data[0]->userId; ?>"><i class="fas fa-long-arrow-alt-left"></i> back</a>
                    <?php                 
                    if(!empty($data)):
                      for($i=0;$i<count($data);$i++):
                        $time = $data[$i]->created_at;
                        $time=$this->convertdateTowords($time);
                        
                      ?>

                         <section class="top-image">

              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="Blogtitle">
                    <h4><?php echo $data[$i]->title?></h4>
                    
                    <a href="<?php echo ROOT;?>allUsers/updateBlogform/<?php echo $data[$i]->BlogSlug;?>"><i class="fa fa-edit fa-2x setting_icon"></i></a>
                 
                  </div>
                  <?php if(!empty($data[$i]->BlogImg)):?>
                    <img src="<?php echo ASSETS;?>blogImges/<?php echo $data[$i]->BlogImg; ?>" alt="">
                     <?php endif;?>
                     <div class="down-content">
                      
                      

                      <p class="blogText"><?php echo $data[$i]->blogText?></p>
                      <div class="primary-button">
                        <a href="#">Read More</a>
                      </div>
                        <div class="detail">
                          <span>-category:</span><?php echo $data[$i]->category; ?>|  <span>-Subcategory:</span><?php $data[$i]->parentcat; ?>
                          <br>
                        </div>
                        <div class="detail">
                            <?php echo $time;?>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

                
          <?php endfor;?>
                <?php else: ?>
                  no data exist
                <?php endif;?>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
   <?php require_once __DIR__.'/../content/adminfooter.php'?>

</body>

</html>