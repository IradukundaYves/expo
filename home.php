<?php
   include("admin/DataBaseConnection.php");
   include("signup.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Digital Exposition</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
        <link rel="stylesheet" href="css/bootstrap-reboot.css.map">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css.map">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    -->
    <link rel="stylesheet" href="css/buttons.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="sidePost.css">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!-- Add best icon library for social icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- end -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?rd5re8">
    <style>
      /* Boxes */
.boxes {
  display: grid;
  grid-gap: 20px;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}

.box {
  background: #ddd;
  text-align: center;
  padding: 0.5rem 2rem;
  box-shadow: var(--shadow);
}

    </style>
  </head>
<body style="background:#F3F3F4;">
  <!-- facebook page plugin -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>
  <!-- end of plugin -->

 
  <!-- INCLUDE HEADER -->
  <?php include("header.php"); ?>

  <!-- <div class="container-fluid my-2">
    <div class="col-md-12 my-2 center-tab" id="">
      <div class="card card-body main-center-tab my-2">
        <div class="row">
          <div class="col-md-12">
            <form>
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control" id="search" placeholder="Enter Keyword...." name="search" style="border-radius:0px;padding:20px;border: 2px solid #ccc;">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Enter Location" name="" style="border-radius:0px;padding:20px;border: 2px solid #ccc;">
                </div>
                <div class="col">
                  <input type="submit" class="btn btn-block"  name="" value="Search" style="border-radius:0px;color:white;padding:8px;border: 1px solid #ccc;background-color:#66CDAA;">
                </div>
              </div>
            </form>
          </div>
        </div>  
      </div>
    </div> -->
  
    <div class="col-md-12 my-3">
      <section class="boxes">
        <div class="box">
          <i class="fas fa-chart-pie fa-4x"></i>
          <h3>Analytics</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, expedita?</p>
        </div>
        <div class="box">
          <i class="fas fa-globe fa-4x"></i>
          <h3>Marketing</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, expedita?</p>
        </div>
        <div class="box">
          <i class="fas fa-cog fa-4x"></i>
          <h3>Development</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, expedita?</p>
        </div>
        <div class="box">
          <i class="fas fa-users fa-4x"></i>
          <h3>Support</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, expedita?</p>
        </div>
      </section>
    </div>
    



    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="row">
        <!-- left side posts -->
        <div class="col-md-4 my-2" >
          <!-- Latest jobs and Training first part -->
          <h5 class="card-header">Latest Jobs & Trainings</h5>
          <?php 
            $sql = "SELECT * FROM tbl_jobs ORDER BY job_id DESC limit 3";
            $stmt = $conn->prepare($sql);
            $stmt ->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
              while ($row = $result->fetch_assoc()) {
                $job_id = $row['job_id'];
             
          ?>
          <div class="blog-post my-2">
            <div class="blog-post_img">
              <img src="images/<?php echo $row['job_image']; ?>" alt="">
            </div>
            <div class="blog-post_info">
              <div class="blog-post_date">
                <span>Published on February <?php echo $row['published_date']; ?> | <b>Deadline on <?php echo $row['deadline'];?></b></span>
              </div>
              <h2 class="blog-post_title"><?php echo $row['job_title']; ?> |&nbsp;<?php echo $row['job_type']; ?> </h2>
              <h2 class="blog-post_joblevel"></h2>
              <div class="" align="right">
                  <a href="#" class="blog-post_cta">View Details</a>
              </div>
            </div>
          </div>
          <?php 
              }
            } 
          ?>
          

          <!-- Featured products promotion -->
          <?php 
            include("admin/DataBaseConnection.php");

            function left_sidea_query($conn){
              $query = "SELECT * FROM featured_products WHERE side='left_side_1' ORDER BY featured_product_id DESC";
              $result = $conn->query($query);
              return $result;
            }
            function left_sidea_slide_indicators($conn){
              $output = '';
              $count  = 0;
              $result = left_sidea_query($conn);
              while($row = $result->fetch_array()){
                if($count == 0){
                  $output .= '<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'" class="active"></li>';
                }else{
                  $output .='<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'"></li>';
                }
                $count = $count + 1;
              }
              return $output;
            }

            function left_sidea_slides($conn){
              $output = '';
              $count  = 0;
              $result = left_sidea_query($conn);
              while($row = $result->fetch_array()){
                if($count == 0){
                  $output .= '<div class="carousel-item active">';
                }else{
                  $output .= '<div class="carousel-item">';
                }
                $output .='
                <img class="d-block w-100" alt="First" src="p_img/'.$row["images"].'" height="400" />
                <div class="carousel-caption">
                  <h5 style="color:tomato;background-color:white">Call US Now '.$row["phone"].'</h5>
                  </div>
                </div>
                
                ';
                
                $count = $count + 1;
              }
              return $output;
            }
          
          ?>
          <div class="card main-left-right-card">
            <h5 class="card-header">Featured Products</h5>
            <div class="card-body">
              <div class="">
              
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <?php echo left_sidea_slide_indicators($conn); ?>
                    </ol>
                    <div class="carousel-inner feature_product">
                      <?php echo left_sidea_slides($conn) ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div><!-- end of first Featured products promotion -->

        <!-- second jobs section -->
        <?php 
            $sql = "SELECT * FROM tbl_jobs ORDER BY job_id ASC limit 2";
            $stmt = $conn->prepare($sql);
            $stmt ->execute();
            $result = $stmt->get_result();
            if($result->num_rows > 0){
              while ($row = $result->fetch_assoc()) {
                $job_id = $row['job_id'];
             
        ?>
        <div class="blog-post my-2">
          <div class="blog-post_img">
              <img src="images/<?php echo $row['job_image']; ?>" alt="">
          </div>
          <div class="blog-post_info">
            <div class="blog-post_date">
              <span>Published on February <?php echo $row['published_date']; ?> | Deadline on February 20, 2020</span>
            </div>
            <h2 class="blog-post_title"><?php echo $row['job_title']; ?> | Fulltime</h2>
            <h2 class="blog-post_joblevel">Entry level(1 to 3 years of Experience)</h2>
            <div class="" align="right">
                <a href="#" class="blog-post_cta">View Details</a>
            </div>
          </div>
        </div>
        <?php 
              }
            } 
        ?>
        <!-- end of second job section-->

        <!-- scholarship section -->
        <h3>Scholarships</h3><hr>
        <div class="blog-post my-2">
          <div class="blog-post_img">
            <img src="images/logo1.jpg" alt="">
          </div>
          <div class="blog-post_info">
            <div class="blog-post_date">
              <span>Published on February 11, 2020 | Deadline on February 20, 2020</span>
            </div>
            <h2 class="blog-post_title">Software Engineer(12) | Fulltime</h2>
            <h2 class="blog-post_joblevel">Entry level(1 to 3 years of Experience)</h2>
            <div class="" align="right">
                <a href="#" class="blog-post_cta">Apply Now</a>
            </div>
          </div>
        </div><!-- end of scholarship section -->

        <!-- second featured products -->
        <?php 
            include("admin/DataBaseConnection.php");

            function left_side_query($conn){
              $query = "SELECT * FROM featured_products WHERE side='left_side_1' ORDER BY featured_product_id DESC";
              $result = $conn->query($query);
              return $result;
            }
            function left_side_slide_indicators($conn){
              $output = '';
              $count  = 0;
              $result = left_side_query($conn);
              while($row = $result->fetch_array()){
                if($count == 0){
                  $output .= '<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'" class="active"></li>';
                }else{
                  $output .='<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'"></li>';
                }
                $count = $count + 1;
              }
              return $output;
            }

            function left_side_slides($conn){
              $output = '';
              $count  = 0;
              $result = left_side_query($conn);
              while($row = $result->fetch_array()){
                if($count == 0){
                  $output .= '<div class="carousel-item active">';
                }else{
                  $output .= '<div class="carousel-item">';
                }
                $output .='
                <img class="d-block w-100" alt="First" src="p_img/'.$row["images"].'" />
                <div class="carousel-caption">
                  <h5 style="color:tomato;background-color:white">Call US Now '.$row["phone"].'</h5>
                  </div>
                </div>
                
                ';
                
                $count = $count + 1;
              }
              return $output;
            }
          
          ?>
        <div class="card  main-left-right-card">
          <h5 class="card-header">Featured</h5>
          <div class="card-body"><div class="cd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php echo left_side_slide_indicators($conn)?>
              </ol>
              <div class="carousel-inner feature_product">
                <?php echo left_side_slides($conn); ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div><!-- end of second featured product -->
    </div>

    <!-- center tab for product posting -->
    <div class="col-md-4  center-tab" id="">
      <?php 
        $sql = "SELECT business_profiles.logo,business_profiles.business_name,tbl_products.product_description,tbl_products.product_image FROM tbl_products INNER JOIN business_profiles ON tbl_products.business_ID=business_profiles.business_ID ORDER BY product_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt ->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0){
          while ($row = $result->fetch_assoc()) {
            
      ?>
      <div class="card card-body main-center-tab my-2">
        <!-- image profile-->
        <div class="profile-card">
          <h6 class="card-title ">
            <img src="images/<?php echo $row['logo']; ?>" class="" style="width:20%;height:20%">
            <strong style="margin-left: 0%;"><?php echo $row['business_name'];?></strong>
          </h6>
        </div>
        <div class="view overlay">
          <p class="card-text"><?php echo $row['product_description'];?></p>
          <div class="feature" style="height:320px">
            <!-- <figure class="featured-item image-holder r-3-2 transition"></figure> -->
            <img src="<?php echo $row['product_image']; ?>" class="image-holder" style="width:100%;height:100%" alt="">
          </div>
          <div class="gallery-wrapper">
            <div class="gallery">
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 active transition"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 transition"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 transition"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 transition"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 transition"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 transition"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 transition"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 transition"></figure>
              </div>
              <div class="item-wrapper">
                <figure class="gallery-item image-holder r-3-2 transition"></figure>
              </div>
            </div>
          </div>
          <div class="controls">
            <button class="move-btn left">&larr;</button>
            <button class="move-btn right">&rarr;</button>
          </div>
        </div>
            
        <!-- collapse comment form -->
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body" style="background: #F5F5F5">
            <form class="well" method="post">
              <div class="form-group">
                <label>Comment</label>
                <input type="test" name="comment" id="comment" class="form-control" placeholder="type your comment here" required>
              </div>
              <div class="form-group" align="right">
                <a href="#" class="btn btn-success btn-sm" style="background: #66CDAA;">Post</a>
              </div>
            </form>
          </div>
        </div><!-- end of collapse comment form -->

        <!-- collapse share buttons -->
        <div id="collapseShare1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body" style="background: #F5F5F5">
            <div class="" align="center">
              <a href="#" class="scl-btn scl-crcl shadow fab fa-facebook-f"></a>
              <a href="#" class="scl-btn scl-crcl shadow fab fa-twitter"></a>
              <a href="#" class="scl-btn scl-crcl shadow fab fa-linkedin-in"></a>
              <a href="#" class="scl-btn scl-crcl shadow fab fa-whatsapp"></a>
              <a href="#" class="scl-btn scl-crcl shadow fab fa-instagram"></a>
              <a href="#" class="scl-btn scl-crcl shadow fab fa-youtube"></a>
              <a href="#" class="scl-btn scl-crcl shadow fab fa-pinterest"></a>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
        }
      ?>
      <!-- end of collapse share buttons -->
    </div>
    <!-- end of center tab -->

    <div class="col-md-4 my-2">
      <?php 
        include("admin/DataBaseConnection.php");

        function make_query($conn){
          $query = "SELECT * FROM featured_products WHERE side='right_side_1' ORDER BY featured_product_id DESC";
          $result = $conn->query($query);
          return $result;
        }
        function make_slide_indicators($conn){
          $output = '';
          $count  = 0;
          $result = make_query($conn);
          while($row = $result->fetch_array()){
            if($count == 0){
              $output .= '<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'" class="active"></li>';
            }else{
              $output .='<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'"></li>';
            }
            $count = $count + 1;
          }
          return $output;
        }

        function make_slides($conn){
          $output = '';
          $count  = 0;
          $result = make_query($conn);
          while($row = $result->fetch_array()){
            if($count == 0){
              $output .= '<div class="carousel-item active">';
            }else{
              $output .= '<div class="carousel-item">';
            }
            $output .='
            <img class="d-block w-100" width="100%" height="100%" alt="First" src="p_img/'.$row["images"].'" />
            <div class="carousel-caption">
              <h5 style="color:tomato;background-color:white">Call US Now '.$row["phone"].'</h5>
              </div>
            </div>
            
            ';
            
            $count = $count + 1;
          }
          return $output;
        }
      
      ?>
      <!-- second featured products -->
      <div class="card main-left-right-card">
        <h5 class="card-header">Featured Products</h5>
        <div class="card-body"><div class="cd-example">
          <div class="row">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <?php echo make_slide_indicators($conn); ?>
              </ol>
              <div class="carousel-inner feature_product">
                <?php echo make_slides($conn); ?>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div><!-- end of second featured product -->


    <div class="card my-2 main-left-right-card">
      <h5 class="card-header">Properties For Sale</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
              <div class="card">
                <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="images/XC_TMAJ3815AJJ470825_1TAQ470_36.jpg" role="img">
                <div class="card-body">
                  <a href="#" class="blog-post_title">hyundai 4 seats in good condition</a>
                  <span>6,000,000frw</span> | <span>+25076556545</span>
                  <div align="right">
                    <a href="" data-toggle="collapse" data-target="#collapseShareProperty" style="color:#66CDAA;;font-size:20px"><i class="fa fa-share pmd-lg"></i></a>
                  </div>
                  <!-- collapse share buttons -->
                  <div id="collapseShareProperty" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body" style="background: #F5F5F5">
                      <div class="" align="center">
                        <a href="#" class="scl-btn scl-crcl shadow fab fa-facebook-f"></a>
                        <a href="#" class="scl-btn scl-crcl shadow fab fa-whatsapp"></a>
                        <a href="#" class="scl-btn scl-crcl shadow fab fa-instagram"></a>
                        <a href="#" class="scl-btn scl-crcl shadow fab fa-linkedin-in"></a>
                      </div>
                    </div>
                  </div>
                  <!-- end of collapse share buttons -->
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <img class="bd-placeholder-img card-img-top" width="100%" height="150" src="images/hyundaiucson-rearsdwerf2svrvwr.jpg" role="img">
                <div class="card-body">
                  <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- BUSINESS NEWS -->
      <?php 
          include("admin/DataBaseConnection.php");

          function news_query($conn){
            $query = "SELECT * FROM tbl_news ORDER BY news_id DESC";
            $result = $conn->query($query);
            return $result;
          }
          function news_slide_indicators($conn){
            $output = '';
            $count  = 0;
            $result = news_query($conn);
            while($row = $result->fetch_array()){
              if($count == 0){
                $output .= '<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'" class="active"></li>';
              }else{
                $output .='<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'"></li>';
              }
              $count = $count + 1;
            }
            return $output;
          }

          function news_slides($conn){
            $output = '';
            $count  = 0;
            $result = news_query($conn);
            while($row = $result->fetch_array()){
              if($count == 0){
                $output .= '<div class="carousel-item active">';
              }else{
                $output .= '<div class="carousel-item">';
              }
              $output .='
              <img class="d-block w-100" alt="First" src="images/'.$row["news_image"].'" />
              <div class="carousel-caption">
                <a href=""> <p><h5 style="background-color:white;color:green">'.$row["news_title"].'</h5></p></a>
                </div>
              </div>
              
              ';
              
              $count = $count + 1;
            }
            return $output;
          }
        
        ?>
        <div class="card my-2 main-left-right-card">
          <h5 class="card-header">Businness News</h5>
          <div class="card-body">
            <div id="myCarousel-right" class="carousel slide" data-ride="carousel">
              <!-- Carousel indicators -->
              <ol class="carousel-indicators">
                  <?php echo news_slide_indicators($conn); ?>
              </ol>
              <!-- Wrapper for carousel items -->
              <div class="carousel-inner business_news">
                  <?php echo news_slides($conn);?>
              </div>
              <!-- Carousel controls -->
              <a class="carousel-control-prev" href="#myCarousel-right" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#myCarousel-right" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
              </a>
            </div>
          </div>
        </div>

        <?php 
          include("admin/DataBaseConnection.php");

          function makes_query($conn){
            $query = "SELECT * FROM featured_products WHERE side='right_side_2' ORDER BY featured_product_id DESC";
            $result = $conn->query($query);
            return $result;
          }
          function makes_slide_indicators($conn){
            $output = '';
            $count  = 0;
            $result = makes_query($conn);
            while($row = $result->fetch_array()){
              if($count == 0){
                $output .= '<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'" class="active"></li>';
              }else{
                $output .='<li data-target="#carouselExampleCaptions" data-slide-to="'.$count.'"></li>';
              }
              $count = $count + 1;
            }
            return $output;
          }

          function makes_slides($conn){
            $output = '';
            $count  = 0;
            $result = makes_query($conn);
            while($row = $result->fetch_array()){
              if($count == 0){
                $output .= '<div class="carousel-item active">';
              }else{
                $output .= '<div class="carousel-item">';
              }
              $output .='
              <img class="d-block w-100" alt="First" src="p_img/'.$row["images"].'" />
              <div class="carousel-caption">
                <p><h5 style="color:tomato;background-color:white">Call US Now '.$row["phone"].'</h5></p>
                </div>
              </div>
              
              ';
              
              $count = $count + 1;
            }
            return $output;
          }
        
        ?>
        <div class="card my-2 main-left-right-card">
          <h5 class="card-header">Featured Product</h5>
          <div class="card-body">
            <div id="myCarousel-product" class="carousel slide" data-ride="carousel">
              <!-- Carousel indicators -->
              <ol class="carousel-indicators">
              <?php echo makes_slide_indicators($conn); ?>
              </ol>
              <!-- Wrapper for carousel items -->
              <div class="carousel-inner business_news">
              <?php echo makes_slides($conn); ?>
              

              </div>
              <!-- Carousel controls -->
              <a class="carousel-control-prev" href="#myCarousel-product" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
              </a>
              <a class="carousel-control-next" href="#myCarousel-product" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

  <!-- INCLUDE FOOTER -->
  <?php include("footer.php"); ?>

</body>
</html>
