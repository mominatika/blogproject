
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
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

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
                                            <th>CATEGORY</th>
                                            <th>CATEGORY_SLUG</th>
                                            <th>CREATED DATE</th>
                                            <th>UPDATED DATE</th>
                                            <th>UPDATE/DELETE</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>CATEGORY</th>
                                            <th>CATEGORY_SLUG</th>
                                            <th>CREATED DATE</th>
                                            <th>UPDATED DATE</th>
                                            <th>UPDATE/DELETE</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       
                                            <?php
                                                for($i=0;$i<count($data);$i++):

                                                    $date=$data[$i]->created_at;
                                                    $created_at=$this->convertdateTowords($date);  
                                                    $update=$data[$i]->update_at;
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
                                                 <td><?php echo $data[$i]->category; ?></td> 
                                         <td><?php echo $data[$i]->slugName;?></td>
                                         

                                         <td><?php echo $created_at; ?></td>
                                          <td><?php echo $updated_at; ?></td>
                                          
                                          <td>
                                            <a href="<?php echo ROOT;?>category/update_category/<?php echo $data[$i]->id;?>"> <i class="fas fa-edit"></i></a> 


                                            <!-- <?php echo ROOT; ?>category/catedelete/<?php echo $data[$i]->id?> -->
                                            <span  class="deletecate" id='del_<?php  echo 3; ?>' data-id='<?php echo $data[$i]->id; ?>'><a href="<?php echo ROOT; ?>category/catedelete/<?php echo $data[$i]->id?>"> <i class="fas fa-trash-alt"></i></a> </span>

                                             <?php if(!empty($this->checksubcategory($data[$i]->id))): ?>
                                           <a href="<?php echo ROOT;?>category/previewcategory/<?php echo $data[$i]->id;?>"><i class="fa fa-eye" aria-hidden="true"></i></a> <?php endif;?>
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
<!-- <?php echo ROOT; ?>category/catedelete/<?php echo $data[$i]->id?> -->
<script type="text/javascript">
    
    $(document).ready(function(){
        $(".deletecate").click(function(event){
             event.preventDefault();
            var el = this;
            var deleteId=$(this).data('id');
            // alert(deleteId);
           
            x=confirm("if you delete category ,all its children category and its all post will be deleted");
             if(x === true)
             {

               $.ajax({
                        type:'POST',
                        url:" <?php echo ROOT; ?>category/catedelete/",
                        data:{
                            deleteId:deleteId,

                        },
                        success:function(data)
                        {
                            // alert(data);
                            if(data == 1)
                            {
                                // alert(11);
                                $(el).closest('tr').css('background','tomato');
                                $(el).closest('tr').fadeOut(800,function(){
                                   $(this).remove();
                                });
                            }
                           
                        }

                });
                $(".deletecate").unbind(event.preventDefault());
                
             }
            

        });
    });
</script>