
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
                                if(isset($data['catepreview']) AND !empty($data['catepreview'])):
                                
                                    $catepreview = $data['catepreview'];

                        ?>
                    <!-- Page Heading -->

                    <h1 class="h3 mb-2 text-gray-800"><?php if(isset($catepreview[0]->category)) {echo strtoupper($catepreview[0]->category);} else {echo $empty;}?></h1>
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
                                  <!-- <?php print_r($data['catepreview']);?> -->
                                  <div id="succes-msg"></div>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     
                                    <thead>
                                        
                                        <tr>
                                            <th>PARENT CATEGORY</th>
                                            <th>SUB-CATEGORY SLUG</th>
                                            <th>SUB-CATEGORY</th>
                                            <th>CREATED DATA</th>
                                            <th>UPDATED DATE</th>
                                            <th>UPDATE/DELETE</th>
                                        </tr>
                                    </thead>
                                    <?php for($i=0;$i<count($catepreview);$i++):
                                            $update=null;
                                           if($time=$catepreview[$i]->created_at)
                                           {
                                                $create=$this->convertdateTowords($time);
                                           }
                                           $update=$catepreview[$i]->update_at;
                                           if($update == null)
                                           {
                                             $update = '-';
                                           
                                            
                                           }
                                           else
                                           { 
                                             $update = $this->convertdateTowords($update);
                                                
                                           }

                                           ?>
                                         <tr>
                                            <td><?php echo $catepreview[$i]->parentcat?></td>
                                            <td><?php echo $catepreview[$i]->slugName;?></td>

                                             <td><?php echo $catepreview[$i]->category;?></td> 
                                            <td><?php echo $create; ?></td> 
                                            <td><?php echo $update;?></td> 

                                            <td>
                                                <a href="<?php echo ROOT; ?>category/update_category/<?php echo $catepreview[$i]->id;  ?>"><i class="fas fa-edit"></i></a>
                                                <span class="deletesub" data-id="<?php echo $catepreview[$i]->id;  ?>"><a href="<?php echo ROOT ?>category/deleteSubCate/<?php echo $catepreview[$i]->id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></span>
                                            </td>
                                            <!-- <td>$162,700</td> -->
                                        </tr>

                                    <?php endfor;?>

                                  
                                    <tbody>
                                       
                                         
                                         


                                           
                                           
                                        
                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                        
                        <?php else: ?>

                        <center><h1>NO SUBCATEGORY IS CREATED</h1></center>
                        <?php endif;?>
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
<script type="text/javascript">
    
    $(document).ready(function(){
        $('.deletesub').click(function(event){
             event.preventDefault();

             var el = this;
            var data=$(this).data('id');
             $('#succes-msg').empty();
             
             x=confirm("if you delete sub category , its all post will be deleted");
             if(x === true)
             {
                $.ajax({
                        type:'POST',
                        url:'<?php echo ROOT ?>category/deleteSubCate',
                        data:{
                            id:data,
                        },
                        success:function(data)
                        {

                            if(data == 1)
                            {
                                $(el).closest('tr').css('background','tomato');
                                $(el).closest('tr').fadeOut(800,function(){
                                   $(this).remove();
                                });
                            }
                            // $('#succes-msg').append(data);
                            // $('.deletesub').remove();
                             // $('.deletesub').empty();
                        }

                });
                // alert(data);
             }

        });
    });
</script>