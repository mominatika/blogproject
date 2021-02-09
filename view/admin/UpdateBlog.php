
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
                  <?php
                  if(isset($data['upblogData']))
                  {
                    $blogData=$data['upblogData']['uploadedData'];
                    $blogErr= $data['upblogData'];
                    // echo $blogErr['titleErr'];
                  }
                  ?>
                <!-- Begin Page Content -->
                <div class="container">
                   <form action="<?php echo ROOT;?>allUsers/updateBlog/<?php echo $blogData[0]->BlogSlug; ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4">
             <div class="form-group">
                    <label for="email" class="sr-only">Title</label>
                    <input type="text" name="title" id="title" value="<?php if(isset($blogData[0]->title)){ echo $blogData[0]->title; }?>" class="form-control"  placeholder="Title">
                    <?php  if(isset($blogErr['titleErr'])){ echo $blogErr['titleErr'];}?>
                    </div>
                </div>
                <!--select  category -->
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="email" class="sr-only">username</label>

                   <select  name="parent" class="form-control" id="parent">
                     <option value="<?php echo  $blogData[0]->parentcatId; ?>"><?php echo $blogData[0]->parentcat;?></option>
                    <?php  for($i=0;$i<count($data['categories']);$i++):?>
                      <option value="<?php echo  $data['categories'][$i]->id; ?>"><?php echo $data['categories'][$i]->category;?></option>

                    <?php endfor; ?>

                   </select>
                   <?php if(isset($blogErr['categoryErr'])){ echo $blogErr['categoryErr'];}?>
                  </div>
                </div>


                <!-- select sub category -->
                 <div class="col-md-4">
                <select class="form-control" id='subcate' name='subcategory'> 
                  <option id='subdefault' value="<?php echo $blogData[0]->subcateName;?>"><?php echo $blogData[0]->category;?></option>
                </select>
                <?php if(isset($blogErr['subcategoryErr'])){echo $blogErr['subcategoryErr'];}?>

              </div>
              </div>
               <div class="form-group">
    <label for="exampleFormControlFile1">Blog Image</label>
    <input type="file" name="blogimage" class="form-control-file" value="<?php echo $blogData[0]->BlogImg ?>" id="exampleFormControlFile1">
    <?php if(isset($blogData['blogImgErr'])){ echo $blogData['blogImgErr'];}?>
  </div>
            <textarea class="ckeditor" name="editor">
                <?php if(isset($blogData[0]->blogText)){ echo $blogData[0]->blogText;}?>
            </textarea>
            <?php if(isset($blogErr['blogTextErr'])){echo $blogErr['blogTextErr'];}?>
            <br>
                      <div class="row">
                         <div class="col-md-4 col-sm-4">

                          <div class="circle-item">
                            <input name="preview" type="radio" id="demo-small" value="publish"  <?php if(isset($blogData[0]->status) && $blogData[0]->status === 'publish'){ ?> checked <?php  }?> checked>
                            <label for="demo-small">PUBLISH</label>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="circle-item">
                            <input name="preview" type="radio" id="demo-medium" value="unpublish" <?php if(isset($blogData[0]->status) && $blogData[0]->status === 'unpublish'){ ?> checked <?php  }?>>
                            <label for="demo-medium">UNPUBLISH</label>
                          </div>
                        </div>
                       <div class="err"> <?php if(isset($blogErr['previewErr'])){echo $blogErr['previewErr'];}?></div>
                       
                      </div>

                      <div class="form-group">
                        <input type="submit" name="createBlog" value="create Blog" class='btn btn-primary'>

                      </div>
          </form>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
   <?php require_once __DIR__.'/../content/adminfooter.php'?>

</body>

</html>

<script type="text/javascript">
  $(document).ready(function(){
      $("#parent").change(function(){
        var x = $(this).val();
        alert(x);
          $.ajax({
            type: 'POST',
            url: "<?php echo ROOT ?>createBlog/subcategory/",
            data: {
                id:x, 

            },

            success:function(data)
            {
              
              $('#subcate').empty();
              var data=$.parseJSON(data);
             

              $.each(data,function(key,value){
                alert(value.id);
              $('#subcate').append('<option value=' +value.id+'>'+value.category+'</option>');
             
               });




                
             
            }


          });

      });
  });

</script>