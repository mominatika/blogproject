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
              if(isset($data['uploadedData']))
              {

                // echo print_r($data['uploadedData']);
                $upAllblogData=$data['uploadedData'];
              }
              // print_r($upAllblogData);
              // echo $upAllblogData['titleErr'];
              $upblogData=$upAllblogData['uploadedData'];
              // echo $upblogData[0]->title;

          ?>


             <div class="row">

                     <form action="<?php echo ROOT;?>createBlog/UpdateBlog/<?php echo $upblogData[0]->BlogSlug?>" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4">
             <div class="form-group">
                    <label for="email" class="sr-only">Title</label>
                    <input type="text" name="title" id="title" value="<?php if(isset($upblogData[0]->title)){ echo $upblogData[0]->title; }?>" class="form-control"  placeholder="Title">
                    <?php  if(isset($upAllblogData['titleErr'])){ echo  $upAllblogData['titleErr'];}?>
                    </div>
                </div>
                <!--select  category -->
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="email" class="sr-only">username</label>

                      <?php
                      // echo 'hello';
                      ?>
                    <select class="form-control" id='parent' name='parent'>
                      <option value="<?php echo $upblogData[0]->parentcatId;?>"><?php echo $upblogData[0]->parentcat;?></option>
                    <?php  for($i=0;$i<count($data['categories']);$i++):?>

                      <option value="<?php echo $data['categories'][$i]->id ?>" ><?php echo $data['categories'][$i]->category;?></option>

                    <?php endfor; ?>

                   </select>
                   <?php if(isset($upAllblogData['categoryErr'])){ echo  $upAllblogData['categoryErr'];}?>
                  </div>
                </div>


                <!-- select sub category -->
                 <div class="col-md-4">
                <select class="form-control" id='subcate' name='subcategory'> 
                  <!-- echo $upblogData[0]->category -->
                  <option id='subdefault' value="<?php echo $upblogData[0]->subcateName;?>"><?php echo $upblogData[0]->category;?></option>

                </select>
                <?php if(isset( $upAllblogData['subcategoryErr'])){echo  $upAllblogData['subcategoryErr'];}?>

              </div>
              </div>
               <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <div class="updateImg"><img src="<?php echo ASSETS;?>blogImges/<?php echo $upblogData[0]->BlogImg;?>" width="100px" height ="100px"></div>
    <input type="file" name="blogimage" value="0cad37429014fbee48556556d12165de.jpg" class="form-control-file " id="exampleFormControlFile1">
  </div>

            <textarea class="ckeditor" name="editor">
                <?php if(isset($upblogData[0]->blogText)){ echo $upblogData[0]->blogText;}?>

            </textarea>
            <?php if(isset($upAllblogData['blogTextErr'])){echo $upAllblogData['blogTextErr'];}?>
            <br>
                      <div class="row">
                         <div class="col-md-4 col-sm-4">

                          <div class="circle-item">
                            <input name="preview" type="radio" id="demo-small" value="publish"  <?php if(isset($upblogData[0]->status) && $upblogData[0]->status === 'publish'){ ?> checked <?php  }?> checked>
                            <label for="demo-small">PUBLISH</label>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <div class="circle-item">
                            <input name="preview" type="radio" id="demo-medium" value="unpublish" <?php if(isset($upblogData[0]->status) && $upblogData[0]->status === 'unpublish'){ ?> checked <?php  }?>>
                            <label for="demo-medium">UNPUBLISH</label>
                          </div>
                        </div>
                       <div class="err"> <?php if(isset( $upAllblogData['previewErr'])){echo  $upAllblogData['previewErr'];}?></div>
                       
                      </div>

                      <div class="form-group">
                        <input type="submit" name="updateBlog" value="create Blog" class='btn btn-primary'>

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
      $("#parent").change(function(){
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
                alert(value.id);
              $('#subcate').append('<option value=' +value.id+'>'+value.category+'</option>');
             
               });




                
             
            }


          });

      });
  });

</script>