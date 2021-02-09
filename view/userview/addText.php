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
              if(isset($data['blogData']))
              {
                $blogData=$data['blogData'];
              }
            
          ?>


             <div class="row">
          <form action="<?php echo ROOT;?>createBlog/createBlog" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4">
             <div class="form-group">
                    <label for="email" class="sr-only">Title</label>
                    <input type="text" name="title" id="title" value="<?php if(isset($blogData['title'])){ echo $blogData['title']; }?>" class="form-control"  placeholder="Title">
                    <?php  if(isset($blogData['titleErr'])){ echo $blogData['titleErr'];}?>
                    </div>
                </div>
                <!--select  category -->
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="email" class="sr-only">username</label>

                   <select  name="category" class="form-control" id="category">
                      <option value=" ">select category</option>
                    <?php  for($i=0;$i<count($data['categories']);$i++):?>
                      <option value="<?php echo  $data['categories'][$i]->id; ?>"><?php echo $data['categories'][$i]->category;?></option>

                    <?php endfor; ?>

                   </select>
                   <?php if(isset($blogData['categoryErr'])){ echo $blogData['categoryErr'];}?>
                  </div>
                </div>


                <!-- select sub category -->
                 <div class="col-md-4">
                <select class="form-control" id='subcate' name='subcategory'> 
                  <option id='subdefault' value=" ">select subcategory</option>

                </select>
                <?php if(isset($blogData['subcategoryErr'])){echo $blogData['subcategoryErr'];}?>

              </div>
              </div>
               <div class="form-group">
    <label for="exampleFormControlFile1">Blog Image</label>
    <input type="file" name="blogimage" class="form-control-file " id="exampleFormControlFile1">
    <?php if(isset($blogData['blogImgErr'])){ echo $blogData['blogImgErr'];}?>
  </div>
            <textarea class="ckeditor" name="editor">
                <?php if(isset($blogData['blogText'])){ echo $blogData['blogText'];}?>
            </textarea>
            <?php if(isset($blogData['blogTextErr'])){echo $blogData['blogTextErr'];}?>
            <br>
                      <div class="row">
                         <div class="col-md-4 col-sm-4">

                          <div class="circle-item">
                            <input name="preview" type="radio" id="demo-small" value="publish"  <?php if(isset($blogData['preview']) && $blogData['preview'] === 'publish'){ ?> checked <?php  }?> checked>
                            <label for="demo-small">PUBLISH</label>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="circle-item">
                            <input name="preview" type="radio" id="demo-medium" value="unpublish" <?php if(isset($blogData['preview']) && $blogData['preview'] === 'unpublish'){ ?> checked <?php  }?>>
                            <label for="demo-medium">UNPUBLISH</label>
                          </div>
                        </div>
                       <div class="err"> <?php if(isset($blogData['previewErr'])){echo $blogData['previewErr'];}?></div>
                       
                      </div>

                      <div class="form-group">
                        <input type="submit" name="createBlog" value="create Blog" class='btn btn-primary'>

                      </div>
          </form>
        </div>
          </div>
        </div>

      <!-- Sidebar -->
        
              
            <!-- Menu -->
            <?php  require_once __DIR__.'/../content/userSidebar.php'; ?>
           

            <!-- Featured Posts -->
           

            <!-- Footer -->
            

          </div>
        </div>

    </div>


  <?php
    require_once __DIR__.'/../content/footer.php'; 
  ?>

  </body>

</html>

<script type="text/javascript">
  $(document).ready(function(){
      $("#category").change(function(){
        var x = $(this).val();
        // alert(x);
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


              $('#subcate').append('<option value=' +value.id+'>'+value.category+'</option>');
                // alert(value.id);
               });



                
             
            }


          });

      });
  });

</script>