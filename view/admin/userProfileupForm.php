
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

                    <div class="back"><a href="<?php echo ROOT; ?>allUsers/AllUsers"><i class="fas fa-long-arrow-alt-left"></i> back</a></div>   
                <?php 

                    if(isset($data))
                    {
                        // print_r($data);
                        $time = $data->created_at;
                        $time=$this->convertdateTowords($time);

                        $unpublishPost = $data->totalPost - $data->publishPost;

                       
                    }
                    
                ?>
<?php echo $data->userPhoto; ?>

                   <div class="row py-5 px-4">
    <div class="col-md-12 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">

                    <div class="profile mr-3">
                        <?php if(!empty($data->userPhoto)): ?>
                            1
                        <img src="<?php echo ASSETS;?>userProfile/<?php echo $data->userPhoto; ?>" alt="..." width="130" class="rounded mb-2 img-thumbnail">

                        <?php else:?>

                    <img src="<?php echo ASSETS; ?>userProfile/no_profile.png" alt="..." width="130" class="rounded mb-2 img-thumbnail">
                        <?php endif;?>
                        <!-- <a href="<?php echo ROOT;?>adminupuser/userupproform/<?php echo $data->user_id?>" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a> -->
                    </div>
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-0"><?php echo $data->userName;?></h4>
                        <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>New York</p>
                    </div>
                </div>
            </div>
            <div class="bg-light p-4 d-flex justify-content-end text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $data->totalPost;?></h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>
                            <?php if(!empty($data->totalPost)):?>
                            <a href="<?php echo ROOT; ?>allUsers/userPostTable/<?php echo $data->user_id;?>"> 

                            Total Post</a>
                            <?php else: ?>
                              <span ><a href="#" id="noPost">Total Post</a></span> 
                            <?php endif;?>
                             </small>

                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $data->publishPost;?></h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Publish</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $unpublishPost; ?></h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Unpublish</small>
                    </li>
                </ul>
            </div>
            <div class="px-4 py-3">
                <h5 class="mb-0">About</h5>
                <div class="p-4 rounded shadow-sm bg-light">

                    <p class="font-italic mb-0">Email : <?php echo $data->email;?></p>
                   
                    <p class="font-italic mb-0">status: <span id="prestatus"> <?php echo $data->userStatus;?> </span></p>
                    <!-- <p class="font-italic mb-0 upstatus"></p> -->
                    <form>
                    <select id="userStatus">
                        <option value="active">active</option>
                        <option value="inactive">inactive</option>
                    </select>
                     <form>
                    <p class="font-italic mb-0">Accout Created:<?php echo $time;?></p>
                </div>
            </div>
            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Recent photos</h5><a href="" class="btn btn-link text-muted">Show all</a>
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
                    <!-- DataTales Example -->
                   
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
<script type="text/javascript">
    $(document).ready(function(){
        
        $("#noPost").click(function(e){
            e.preventDefault();
            alert("no POST IS CREATED");
        });

        $("#userStatus").change(function(){
           var status= $("#userStatus").val();
           $("#prestatus").empty();
          
           $.ajax({

                    type:'POST',
                    url:"<?php echo ROOT;?>adminupuser/userProfileupdate/5",
                    data:{
                        status : status
                    },
                    success:function(data)
                    {

                        $("#prestatus").append(data);
                        
                    }
           });
        });
        

    });

</script>