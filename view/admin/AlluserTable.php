
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
                    <h1 class="h3 mb-2 text-gray-800">All User : <?php echo count($data);?></h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                            <?php 
                            echo "<pre>";
                            // print_r($data[3]->created_at);
                            echo "</pre>";
                            ?>

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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>profile</th>
                                            <th>status</th>
                                            <th>Register Date</th>
                                            <th>Login Time</th>
                                            <!-- <th>id</th> -->
                                            <th>profile</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        if(!empty($data)):
                                            for($i=0;$i<count($data);$i++):
                                                $Createdtime = $data[$i]->created_at;
                                                $Createdtime=$this->convertdateTowords($Createdtime);
                                                $loginTime = $data[$i]->lastLogin_at;
                                                $LoginTime =$this->convertdateTowords($Createdtime);
                                        ?>

                                        <tr>
                                            <td><?php echo $data[$i]->userName; ?></td>
                                            <td><?php echo $data[$i]->email; ?></td>
                                            <?php if(!empty($data[$i]->userPhoto)):?>
                                            <td><img src="<?php echo ASSETS;?>/userProfile/<?php echo $data[$i]->userPhoto;?>" width="50px" height="50px"></td>
                                            <?php else:?>
                                                <td><img src="<?php echo ASSETS;?>/userProfile/no_profile.png" width="50px" height="50px"></td>
                                        <?php endif;?>
                                            <td><?php echo $data[$i]->userStatus; ?></td>
                                            <td><?php echo $Createdtime;?></td>
                                            <td><?php echo $LoginTime;?></td>
                                            <td><a href="<?php echo ROOT; ?>allUsers/userProfile/<?php echo $data[$i]->user_id; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="#"> <i class="fas fa-trash-alt"></i></a>
                                                <a href="<?php echo ROOT; ?>adminupuser/userupproform/<?php echo $data[$i]->user_id ?>"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    <?php endfor;?>
                                    <?php endif;?>
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