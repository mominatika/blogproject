 <div id="sidebar">

          <div class="inner">

            <!-- Search Box -->
            <section id="search" class="alt">
              <form method="get" action="#">
                <input type="text" name="search" id="search" placeholder="Search..." />
              </form>
            </section>
              
            <!-- Menu -->
       <nav id="menu">
              <ul>
                   <?php 
                   if(isset($data['userdata']) && !empty($this->getSession('userId'))):
                    {
                      $userdata = $data['userdata'];
                      $userId=$this->getSession('userId');

                    } 

                   ?>
                     <li>
                  <span class="opener userName"><?php echo $userdata->userName; ?></span>
                  <ul>
                    <li><a href="<?php echo ROOT;?>userProfile/index/<?php echo $userId;?>">profile</a></li>
                    <li><a href="<?php echo ROOT;?>createBlog">create Blog</a></li>
                    <li><a href="<?php echo ROOT;?>usersBlog">My Blogs</a>
                      <ul>
                         <!-- <li><a href="#">EditBlog</a></li> -->
                      </ul>
                    </li>

                  </ul>
                </li>

                 <?php endif; ?>

                <li><a href="<?php echo ROOT;?>home/">Homepage</a></li>

                <!-- <li><a href="#">Simple Page</a></li> -->
                <!-- <li><a href="#">Shortcodes</a></li> -->
                <!-- <?php $userdata=$data['userdata']; ?> -->

                   <?php if(empty($this->getSession('userId'))): ?>
                     <li>
                  <span class="opener">SignUp/Login</span>
                  <ul>
                    <li><a href="<?php echo ROOT; ?>userRegister/">SignUp</a></li>
                    <li><a href="<?php echo ROOT; ?>userLogin/">Login</a></li>
                    <li><a href="#">Sub Menu #3</a></li>
                  </ul>

                </li>
                <?php  endif; ?>
                 <?php if(!empty($this->getSession('userId'))): ?>
                

                <li>
                  <span class="opener">logout</span>
                  <ul>
                    <li><a href="<?php echo ROOT;?>login/logout">Logout</a></li>
                  </ul>
              <?php  endif; ?>
                <li>
                  <span class="opener">CATEGORIES</span>
                  <ul>
                    <?php 
                    $categories = $data['categories'];
                    for ($i=0; $i<count($categories) ; $i++):   ?> 
                      
                      <li id="catlink"><a href="#"><?php echo $categories[$i]->category; ?></a></li>
                    
                  
                    <?php endfor; ?>
                    <!-- <li><a href="#">First Sub Menu</a></li>
                    <li><a href="#">Second Sub Menu</a></li>
                    <li><a href="#">Third Sub Menu</a></li> -->
                  </ul>
                </li>

                
                
              </ul>
            </nav>
            

</script>
           

            <!-- Featured Posts -->
           

            <!-- Footer -->
            <footer id="footer">
              <p class="copyright">Copyright &copy; 2019 Company Name
              <br>Designed by <a rel="nofollow" href="https://www.facebook.com/templatemo">Template Mo</a></p>
            </footer>

          </div>
        </div>