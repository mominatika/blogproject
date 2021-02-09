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
                            <?php
                            if(isset($data['cateData']))
                            {
                                $cateData = $data['cateData'];
                            }
                            if(isset($data['subcate']))
                            {
                                $subcate = $data['subcate'];
                            }
                            ?>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">ADD SUB-CATEGORY</h1>
                            </div>
                            <form class="user" action="<?php echo ROOT;?>addSubCategory/insertCate" method="POST">
                               
                               <div class="form-group">
                                    <input type="text" class="form-control"  name="subcategory" value= "<?php if(isset($subcate['subcategory'])){ echo $subcate['subcategory']; } ?>" id="exampleInputEmail"
                                        placeholder="Category Name">
                                           <?php if(isset($subcate['subcategoryErr'])) {echo $subcate['subcategoryErr'];}?>
                                        
                                </div>

                               <div class="form-group">
                                <select name='category' class="form-control">
                                    <option value="0">Select Category</option>
                                    <?php for($i=0;$i<count($cateData);$i++): ?>
                                        <option value="<?php echo $cateData[$i]->id; ?>"><?php echo $cateData[$i]->category;?></option>

                                         <?php endfor;?>
                                 </select>

                                 <?php if(isset($subcate['categoryErr'])) {echo $subcate['categoryErr'];}?>
                               </div>
                               
                                <div class="form-group">
                                    <input type="text" name="subcate_slug" value= "<?php if(isset($subcate['slugName'])){ echo $subcate['slugName']; } ?>"  class="form-control" id="exampleInputEmail"
                                        placeholder="sub-category slug">
                                </div>
                                 <?php if(isset($subcate['slugNameErr'])) {echo $subcate['slugNameErr'];}?>
                               

                                <div class="form-group">
                                    <input type="submit" name="CreateSubCat"  class="btn btn-primary">
                                    <a href="<?php echo ROOT;?>addSubCategory" class="btn btn-success">Reset</a>
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