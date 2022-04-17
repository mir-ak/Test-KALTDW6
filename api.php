
  <?php 
    include('connection.php');

    // get database article 
    function getArticles(){
      global $con;
      $query = "SELECT id, Image, Title, Introduction, LastMod, theme.categorie  FROM theme , article WHERE theme.IdTheme=article.IdTheme";
      $result = mysqli_query($con,$query);
      dispalyArticles($result); 
    }

    // display data article 
    function dispalyArticles($result){  
      while($row = $result->fetch_assoc()){?>
        <div class="item">
          <div class="item-inner">
            <article>
               <div class="card">
                <figure class="card-img-top overlay overlay-1 hover-scale"><a href="#"> <img src="<?php echo $row['Image']; ?>" alt="" /></a>
                  <figcaption>
                    <h5 class="from-top mb-0">Read More</h5>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <div class="post-header">
                    <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="./blog-post.html"> <?php echo $row['Title'];?> </a></h2>
                  </div>
                  <!-- /.post-header -->
                  <div class="post-content">
                    <p><?php echo $row['Introduction'];?></p>
                  </div>
                  <!-- /.post-content -->
                </div>
                <!--/.card-body -->
                <div class="card-footer">
                  <ul class="post-meta d-flex mb-0">
                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span><?php echo $row['LastMod']?></span></li>
                    <li class="post-comments"><a href="#"><i class="uil uil-file-alt fs-15"></i><?php echo $row['categorie']?></a></li>
                  </ul>
                  <!-- /.post-meta -->
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </article>
            <!-- /article -->
          </div>
          <!-- /.item-inner -->
        </div>
      <?php 
      }
    } 

  getArticles(); ?>
