<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>RediCabs</title>
<!--Bootstrap -->
<style type="text/css">
@import "bourbon";
/*---- NUMBER OF SLIDE CONFIGURATION ----*/
$num-of-slide: 5;

.wrapper {
    max-width: 60em;
    margin: 1em auto;
    position: relative;
}

input {
    display: none;
}

.inner {
    width: percentage($num-of-slide);
    line-height: 0;
}

article {
    width: percentage(1/$num-of-slide);
    float: left;
    position: relative;

    img {
        width: 100%;
    }
}

/*---- SET UP CONTROL ----*/
.slider-prev-next-control {
    height: 50px;
    position: absolute;
    top: 50%;
    width: 100%;
    @include transform(translateY(-50%));

    label {
        display: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #fff;
        opacity: 0.7;

        &:hover {
            opacity: 1;
        }
    }
}

.slider-dot-control {
    position: absolute;
    width: 100%;
    bottom: 0;
    text-align: center;

    label {
        cursor: pointer;
        border-radius: 5px;
        display: inline-block;
        width: 10px;
        height: 10px;
        background: #bbb;
        @include transition(all 0.3s);

        &:hover {
            background: #ccc;
            border-color: #777;
        }
    }
}

/* Info Box */
.info {
    position: absolute;
    font-style: italic;
    line-height: 20px;
    opacity: 0;
    color: #000;
    text-align: left;
    @include transition(all 1000ms ease-out 600ms);

    h3 {
        color: #fcfff4;
        margin: 0 0 5px;
        font-weight: normal;
        font-size: 1.5em;
        font-style: normal;
    }

    &.top-left {
        top: 30px;
        left: 30px;
    }

    &.top-right {
        top: 30px;
        right: 30px;
    }

    &.bottom-left {
        bottom: 30px;
        left: 30px;
    }

    &.bottom-right {
        bottom: 30px;
        right: 30px;
    }
}

/* Slider Styling */
.slider-wrapper {
    width: 100%;
    overflow: hidden;
    border-radius: 5px;
    box-shadow: 1px 1px 4px #666;
    background: #fff;
    background: #fcfff4;
    @include transform(translateZ(0));
    @include transition(all 500ms ease-out);

    .inner {
        @include transform(translateZ(0));
        @include transition(all 800ms cubic-bezier(0.77, 0, 0.175, 1));
    }
}

/*---- SET POSITION FOR SLIDE ----*/
%bind-prev-next-button {
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    margin: 0;
    line-height: 38px;
    font-size: 3em;
    display: block;
    color: #777;
}

%bind-next-button {
    @extend %bind-prev-next-button;
    content: "\f105";
    padding-left: 15px;
}

%bind-next-label {
    display: block;
    float: right;
    margin-right: 5px;
}

%bind-prev-label {
    display: block;
    float: left;
    margin-left: 5px;
}

%bind-prev-button {
    @extend %bind-prev-next-button;
    content: "\f104";
    padding-left: 8px;
}

%bind-background-active-dot {
    background: #333;
}

%bind-opacity-info {
    opacity: 1;
}

@for $i from 1 through $num-of-slide {
    #slide#{$i}:checked {
        & ~ .slider-wrapper .inner {
            margin-left: percentage(1 - $i);
        }

        & ~ .slider-dot-control label:nth-child(#{$i}) {
            @extend %bind-background-active-dot;
        }

        & ~ .slider-wrapper article:nth-child(#{$i}) .info {
            @extend %bind-opacity-info;
        }
    }
}

@for $i from 1 through ($num-of-slide - 1) {
    #slide#{$i}:checked {
        & ~ .slider-prev-next-control label:nth-child(#{$i +1}) {
            @extend %bind-next-label;

            &::after {
                @extend %bind-next-button;
            }
        }
    }
}

#slide#{$num-of-slide}:checked ~ .slider-prev-next-control label:nth-child(1) {
    @extend %bind-next-label;

    &::after {
        @extend %bind-next-button;
    }
}

@for $i from 2 through $num-of-slide {
    #slide#{$i}:checked {
        & ~ .slider-prev-next-control label:nth-child(#{$i - 1}) {
            @extend %bind-prev-label;

            &::after {
                @extend %bind-prev-button;
            }
        }
    }
}

#slide#{1}:checked ~ .slider-prev-next-control label:nth-child(#{$num-of-slide}) {
    @extend %bind-prev-label;

    &::after {
        @extend %bind-prev-button;
    }
}

/*---- TABLET ----*/
@media only screen and (max-width: 850px) and (min-width: 450px) {
    .slider-wrapper {
        border-radius: 0;
    }
}

/*---- MOBILE----*/
@media only screen and (max-width: 450px) {
    .slider-wrapper {
        border-radius: 0;
    }

    .slider-wrapper .info {
        opacity: 0;
    }
}

@media only screen and (min-width: 850px) {
    body {
        padding: 0 80px;
    }
}
</style>
<style type="text/css">
    .demo{ background-color: #E2E2E2; }
.serviceBox{
    color: #303030;
    background-color: #fff;
    font-family: 'Lato', sans-serif;
    text-align: center;
    padding: 25px 10px;
    margin: 75px 0 0;
    border-radius: 15px;
}
.serviceBox .service-icon{
    color: #fff;
    background: linear-gradient(to bottom,#1886bb,#1886bb);
    font-size: 80px;
    line-height: 170px;
    height: 170px;
    width: 170px;
    margin: -100px auto 30px;
    border-radius: 50%;
    display: block;
    transition: all 0.3s ease 0s;
}
.serviceBox:hover .service-icon{
    font-size: 90px;
    box-shadow: 0 0 20px -5px #000;
}
.serviceBox .title{
    color: #1886bb;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    margin: 0 0 10px;
}
.serviceBox .description{
    font-size: 15px;
    text-align: center;
    line-height: 28px;
    margin: 0 0 20px;
}
.serviceBox .read-more{
    color: #fff;
    font-size: 17px;
    font-weight: 600;
    padding: 8px 10px;
    border-radius: 20px 0;
    display: inline-block;
    overflow: hidden;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.serviceBox .read-more:hover{
    text-decoration: none;
    box-shadow: 0 0 10px #fff inset;
    text-shadow: 0 0 2px #000;
}
.serviceBox .read-more:before,
.serviceBox .read-more:after{
    content: '';
    width: 50%;
    height: 100%;
    background: linear-gradient(to bottom,#1886bb,#1886bb);
    position: absolute;
    left: -100%;
    top: 0;
    z-index: -1;
    transition: all 0.3s ease 0s;
}
.serviceBox .read-more:after{
    left: auto;
    right: -100%;
}
.serviceBox:hover .read-more:before{ left: 0; }
.serviceBox:hover .read-more:after{ right: 0; }
.serviceBox.orange .service-icon{
    background: linear-gradient(to bottom,#1886bb,#1886bb);
}
.serviceBox.orange .title{ color: #1886bb; }
.serviceBox.orange .read-more:before,
.serviceBox.orange .read-more:after{
    background: linear-gradient(to bottom,#1886bb,#1886bb);
}
.serviceBox.purple .service-icon{
    background: linear-gradient(to bottom,#1886bb,#1886bb);
}
.serviceBox.purple .title{ color: #1886bb; }
.serviceBox.purple .read-more:before,
.serviceBox.purple .read-more:after{
    background: linear-gradient(to bottom,#1886bb,#1886bb);
}
.serviceBox.blue .service-icon{
    background: linear-gradient(to bottom,#1886bb,#1886bb);
}
.serviceBox.blue .title{ color: #1886bb; }
.serviceBox.blue .read-more:before,
.serviceBox.blue .read-more:after{
    background: linear-gradient(to bottom,#1886bb,#1886bb);
}
@media only screen and (max-width:990px){
    .serviceBox{ margin: 110px 0 0; }
}

</style>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> 
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!--Page Header-->
<section class="page-header listing_page" style="padding: 0px">
  <div class="container">
    <div class="page-header_wrap" >
      <div class="page-heading">
        <h1>About Us</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>About Us</li>
      </ul>
      <div class="sidebar_widget" style="margin: 20px 60px;">
          <div class="widget_heading" >
            <h5 style="color: #1886bb;"> Find Your Car </h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="post">
              <div class="form-group select">
                <select class="form-control" style="width: 180px; margin-left: 300px; " name="brand">
                  <option>Select Brand</option>

                  <?php $sql = "SELECT * from  tblbrands ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>  
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>
                 
                </select>
                 <select class="form-control" style="width: 200px; margin-left: 500px;  margin-top: -46px;" name="fueltype">
                  <option>Select Fuel Type</option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="CNG">CNG</option>
                </select>
              </div>
              <!-- <div class="form-group select"> -->
               
             <!--  </div> -->
             
              <div class="form-group">
                <button type="submit" class="btn btn-block " style="background-color: #1886bb;width: 180px;"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
  <!-- Dark Overlay-->
 <!--  <div class="dark-overlay"></div>  -->
</section>
<!-- /Page Header--> 
<!-- Banners -->
 <!-- <section id="listing_img_slider" >
  <div style="width:500;height:100px"><img src="assets/images/banner-image-1.jpg" class="img-responsive" alt="image" width="900px" height="560px"></div>
  <div><img src="assets/images/banner-image-2.jpg" class="img-responsive" alt="image" width="900px" height="560px"></div>
 <div><img src="assets/images/banner-image.jpg" class="img-responsive" alt="image" width="900px" height="560px"></div>
 
 <div><img src="assets/images/trending-car-img-1.jpg" class="img-responsive"  alt="image" width="700" height="360"></div> 
 <?php if($result->Vimage5=="")
{

} else {
  ?>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?> 
</section> -->
<!-- <div class="wrapper">
  <input checked type=radio name="slider" id="slide1" />
  <input type=radio name="slider" id="slide2" />
  <input type=radio name="slider" id="slide3" />
  <input type=radio name="slider" id="slide4" />
  <input type=radio name="slider" id="slide5" />

  <div class="slider-wrapper">
    <div class=inner>
      <article>
        <div class="info top-left">
          <h3>Malacca</h3></div>
        <img src="assets/images/banner-image-1.jpg" />
      </article>

      <article>
        <div class="info bottom-right">
          <h3>Cameron Highland</h3></div>
        <img src="assets/images/banner-image-2.jpg" />
      </article>

      <article>
        <div class="info bottom-left">
          <h3>New Delhi</h3></div>
        <img src="assets/images/banner-image.jpg" />
      </article>
    </div>
    .inner -->
  </div>
  <!-- .slider-wrapper -->

  <!-- <div class="slider1-prev-next-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
    <label for=slide4></label>
    <label for=slide5></label>
  </div> -->
  <!-- .slider-prev-next-control -->

 <!--  <div class="slider1-dot-control">
    <label for=slide1></label>
    <label for=slide2></label>
    <label for=slide3></label>
    <label for=slide4></label>
    <label for=slide5></label>
  </div> --> 
  <!-- .slider-dot-control -->
</div>
<!-- /Banners -->
<section class="offer-style-one">
<div  style="padding: 26px"><h2><center>NUMBERS SPEAK</center></h2></div>
 <div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="serviceBox">
                <div class="service-icon">
                    <img src="assets/images/meter.png"> 
                </div>
                <h3 class="title">5000</h3>
                <p class="description">
                    KM Driven
                </p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="serviceBox blue">
                <div class="service-icon">
                    <img src="assets/images/people.png"> 
                </div>
                <h3 class="title">4000</h3>
                <p class="description">
                    People Dropped
                </p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="serviceBox blue">
                <div class="service-icon">
                   <img src="assets/images/taxi.png"> 
                </div>
                <h3 class="title">500</h3>
                <p class="description">
                   Taxis & Drivers
                </p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="serviceBox blue">
                <div class="service-icon">
                   <img src="assets/images/happypeople.png"> 
                </div>
                <h3 class="title">2000</h3>
                <p class="description">
                    Happy People
                </p>
                <a href="#" class="read-more">Read More</a>
            </div>
        </div>
    </div>
</div>
</section>

         <section class="feature-style-one thm-black-bg" >
           <!--  <img src="images/feature-bg-1-1.png" alt="Awesome Image" class="feature-bg" /> -->
            <div class="container">
                <div class="block-title text-center" >                
                    <p><b>Our benefit list</b></p>
                    <h2 class="light">WHY CHOOSE US</h2>
                </div><!-- /.block-title text-center -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-feature-one" >
                            <div class="icon-block"> 
                                 <img src="assets/images/safety.png"> 
                                             </div> <!-- /.icon-block -->                                 
                            <h3><a href="#" style="color: black">Safety Guarantee</a></h3>
                            <p style="color: black">Lorem ipsum dolor sit amet <br> cons adipisci elit vehicula est <br> non lac at quam.</p>
                            <a href="#" class="more-link">Read More</a>
                        </div><!-- /.single-feature-one -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="single-feature-one">
                            <div class="icon-block">
                                <img src="assets/images/driver.png"> 
                            </div><!-- /.icon-block -->
                            <h3><a href="#" style="color: black">DBS Cleared Drivers</a></h3>
                            <p style="color: black">Lorem ipsum dolor sit amet <br> cons adipisci elit vehicula est <br> non lac at quam.</p>
                            <a href="#" class="more-link">Read More</a>
                        </div><!-- /.single-feature-one -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="single-feature-one">
                            <div class="icon-block">
                                <img src="assets/images/write.png"> 
                            </div><!-- /.icon-block -->
                            <h3><a href="#" style="color: black">Free Quotation</a></h3>
                            <p style="color: black">Lorem ipsum dolor sit amet <br> cons adipisci elit vehicula est <br> non lac at quam.</p>
                            <a href="#" class="more-link">Read More</a>
                        </div><!-- /.single-feature-one -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.feature-style-one --> 
 <section class="offer-style-one" style="background-color: #f9f3f3">
            <div class="container">
                <div class="block-title text-center"> 
                    <h2>What we’re offering</h2>
                </div><!-- /.block-title -->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-offer-one hvr-float-shadow">
                            <div class="image-block">
                                <!-- <a href="#"><i class="fa fa-link"></i></a> -->
                                <img src="assets/images/credit.jpg" alt="Awesome Image" />
                            </div><!-- /.image-block -->
                            <div class="text-block">
                                <h3><a href="#">Credit booking</a></h3>
                                <p>There are many van of pasage of suffer alteration lipsum is simply free text.</p>
                                <a href="#" class="more-link">Read More</a>
                            </div><!-- /.text-block -->
                        </div><!-- /.single-offer-one -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="single-offer-one hvr-float-shadow">
                            <div class="image-block">
                                <!-- <a href="#"><i class="fa fa-link"></i></a> -->
                                <img src="assets/images/home.jpg" alt="Awesome Image" />
                            </div><!-- /.image-block -->
                            <div class="text-block">
                                <h3><a href="#">Home pickups</a></h3>
                                <p>There are many van of pasage of suffer alteration lipsum is simply free text.</p>
                                <a href="#" class="more-link">Read More</a>
                            </div><!-- /.text-block -->
                        </div><!-- /.single-offer-one -->
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <div class="single-offer-one hvr-float-shadow">
                            <div class="image-block">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <img src="assets/images/long.jpg" alt="Awesome Image" />
                            </div><!-- /.image-block -->
                            <div class="text-block">
                                <h3><a href="#">Long travels</a></h3>
                                <p>There are many van of pasage of suffer alteration lipsum is simply free text.</p>
                                <a href="#" class="more-link">Read More</a>
                            </div><!-- /.text-block -->
                        </div><!-- /.single-offer-one -->
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.offer-style-one -->


<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>
<!--/Forgot-password-Form --> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>