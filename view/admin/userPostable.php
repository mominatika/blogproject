
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

                    <!-- Page Heading -->
                    
                    <!-- <?php print_r($data);?> -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo ROOT;?>allUsers/userProfile/<?php echo $data[0]->userId?>"><?php echo $data[0]->userName; ?>'s Blogs</a></h1>
                        <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. -->
                        <!-- For more information about DataTables, please visit the <a target="_blank" -->
                            <!-- href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Blog Text</th>
                                            <th>Blog Photo</th>
                                            <th>status</th>
                                            <th>created Date</th>
                                            <th>Updated At</th>
                                            <th>UPDATE/DELETE</th>
                                        </tr>
                                    
                                       </thead>
                                       <tbody>
                                            <?php
                                                for($i=0;$i<count($data);$i++):
                                                    $date=$data[$i]->created_at;
                                                    $created_at=$this->convertdateTowords($date);  
                                                    $update=$data[$i]->updated_at;
                                                    if($update  === NULL)
                                                    {
                                                        $updated_at = '-';
                                                    }
                                                    else
                                                    {
                                                        $updated_at =$this->convertdateTowords($update);
                                                    }
                                                                                                                                                        

                                            ?>
                                             <tr>
                                                 <td><?php echo $data[$i]->title; ?></td> 
                                         <td><?php echo substr($data[$i]->blogText,0,50);?></td>
                                         <?php if(!empty($data[$i]->BlogImg)):?>
                                            <td><img src="<?php  echo ASSETS; ?>blogImges/<?php echo $data[$i]->BlogImg;?>" width="100px"  height="100px"></td>
                                         <?php else: ?>
                                            <td><img src="<?php  echo ASSETS; ?>blogImges/empty.jpg" width="100px"  height="100px"></td>
                                         <?php endif;?>
                                         <td><?php echo   $data[$i]->status;?></td>
                                         <td><?php echo $created_at; ?></td>

                                          <td><?php echo $updated_at; ?></td>

                                         <td>
                                          <a href="<?php echo ROOT;?>AllUsers/updateBlogform/<?php echo $data[$i]->BlogSlug;?>"> <i class="fas fa-edit"></i></a> 
                                            <a href="#"> <i class="fas fa-trash-alt"></i></a> 
                                           <a href="<?php echo ROOT;?>AllUsers/userPost/<?php echo $data[$i]->BlogSlug;?>"><i class="fa fa-eye" aria-hidden="true"></i></a> 
                                         </td>
                                         </tr>
                                         

                                        <?php endfor;?>

                                           
                                           
                                        
                         
                                    </tbody>
                                </table>
                            </div>
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


    <!-- Bootstrap core JavaScript-->
   <?php require_once __DIR__.'/../content/adminfooter.php'?>

</body>

</html>