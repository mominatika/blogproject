<?php

require_once __DIR__.'/../content/adminheader.php';
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php 
        // echo __DIR__;
            require_once __DIR__.'/../content/adminsidebar.php';
        ?>
       
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php 
        // echo __DIR__;
            require_once __DIR__.'/../content/adminNavbar.php';
        ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an category</h1>
                            </div>
                            <form class="user" action="<?php echo ROOT;?>category/createCategory" method="POST">
                               
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" value="<?php if(isset($data['category'])) {echo $data['category']; } ?>" name="category" id="exampleInputEmail"
                                        placeholder="category Name">
                                        <?php if(isset($data['category_err'])) {echo $data['category_err']; }?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="cate_slug"  value="<?php if(isset($data['cate_slug'])) {echo $data['cate_slug']; } ?>" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="category slug">
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="CreateCat"  class="btn btn-primary">
                                </div>


                              </form>
                            <hr>
                           
                        </div>
                    </div>
                     <div class="col-md-3">
                        </div>
                </div>
                   

                </div>
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

    <!-- Logout Modal-->
    <?php require_once __DIR__.'/../content/adminfooter.php'; ?>
</body>

</html>