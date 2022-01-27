<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Redicabs</title>
<!--Bootstrap -->

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
 <link rel="manifest" href="images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../ms-icon-144x144.html">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

<!-- Banners -->
<!--  <section id="banner" class="banner-section"  >
  <div class="container-fluid">
    <div class="div_zindex">
      <div class="row">
        <div class="col">
         <img src="assets/images/banner1.jpg" height="600px" width="100%"> 
        </div>
      </div>
    </div>
  </div>
</section> -->

<!--Page Header-->
<section class="page-header listing_page" style="padding: 0px">
  <div class="container">
    <div class="page-header_wrap" >
      <div class="page-heading">
        <h1>WELCOME TO REDICABS</h1>
      </div>
      <br><br>
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
<!--  <section id="listing_img_slider">
  <div> <img src="assets/images/banner1.jpg" class="img-responsive"  height="600px" width="1500%"></div>

  <div> <img src="assets/images/banner1.jpg" class="img-responsive"  height="400px" width="300%"></div>
   <div> <img src="assets/images/banner1.jpg" class="img-responsive"  height="400px" width="300%"></div>
  <div> <img src="assets/images/banner1.jpg" class="img-responsive"  height="400px" width="300%"></div> 
 <?php if($result->Vimage5=="")
{

} else {
  ?>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?> 
</section>
 -->

<!-- /Banners -->
  
          
<!-- Resent Cat-->
<section class="section-padding gray-bg" style="padding-top: 50px;">
  <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best <span><b>CarForYou</b></span></h2>
      <p></p>
    </div>
    <div class="row"> 
      
      <!-- Nav tabs -->
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#resentnewcar" role="tab" data-toggle="tab">New Car</a></li>
        </ul>
      </div>
      <!-- Recently Listed New Cars -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcar">

<?php $sql = "SELECT tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand limit 9";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  

<div class="col-list-3" >
<div class="recent-car-list" >
<div class="car-info-box" > <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="600px" height="500px"></a>
<ul>
<li><i class="fa fa-car" aria-hidden="true"></i><?php echo htmlentities($result->FuelType);?></li>
<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($result->ModelYear);?> Model</li>
<li><i class="fa fa-user" aria-hidden="true"></i><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
</ul>
</div>
<div class="car-title-m">
<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"> <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
<span class="price">$<?php echo htmlentities($result->PricePerDay);?> /Day</span> 
</div>
<div class="inventory_info_m">
<p><?php echo substr($result->VehiclesOverview,0,70);?></p>
</div>
</div>
</div>
<?php }}?>
       
      </div>
    </div>
  </div>
</section>
<!-- /Resent Cat --> 

 <section class="about-style-one " style="padding-bottom: 60px;">
            <div class="container">
                <div class="block-title text-center">
                    <h2>Your first choice <br> for traveling anywhere</h2>
                </div><!-- /.block-title -->
                <div class="row high-gutter">
                    <div class="col-lg-6">
                        <div class="about-image-block">
                            <img src="assets/images/phone.jpg" alt="Awesome Image" />
                            <p></p>
                        </div><!-- /.image-block -->
                    </br>
                         <h2><b style="color: black">Book the taxi from the App</b></h2>
                            <p><b>Download the app for exclusive deals and ease of booking</b></p>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="text-block">
                            <div class="video-block-one">
                                <div class="image-block">
                                    <div class="inner-block">
                                        <img src="assets/images/video-1-1.png" alt="Awesome Image" />
                                        <a href="https://www.youtube.com/watch?v=hsb-fA6ApiE" class="video-popup"><i class="fa fa-play"></i></a>
                                    </div><!-- /.inner-block -->
                                </div><!-- /.image-block -->
                                <div class="content-block">
                                    <h3>We’re specialized in providing a high quality service</h3>
                                </div><!-- /.content-block -->
                            </div><!-- /.video-block-one -->
                           
                          <div class="call-block">
                                <div class="left-block">
                                    <div class="icon-block" style="background-color: #bbb7b7">
                                       <!-- <i class="fa-regular fa-phone" style="color:white"></i>  -->
                                     <img src="admin/img/phone.png" style="color:white;align-content: center;padding-top: 14px;" alt="Awesome Image" /> 
                                    </div><!-- /.icon-block -->
                                    <div class="content-block">
                                        <p style="align-content: center;"><b>Call & make your booking<b></p>
                                          <p> <a class="phone-number" href="callto:888-888-0000">888 888 0000</a></p>
                                    </div><!-- /.content-block -->

                                   
                    
                                </div><!-- /.left-block -->
                                
                            </div><!-- /.call-block -->
                            
                        </div><!-- /.text-block -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.about-style-one -->
<!-- Fun Facts-->

<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customers</span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php 
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid limit 4";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


        <div class="testimonial-m">
 
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
          </div>
        </div>
        </div>
        <?php }} ?>
        
       
  
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial--> 


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