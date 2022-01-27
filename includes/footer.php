<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM tblsubscribers WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  tblsubscribers(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>
<footer>
<div class="footer-top" style="color: white;">
          <!--   <img src="images/footer-bg-1-1.png" class="footer-bg"  /> -->
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="footer-widget about-widget">
                                <div class="widget-title" style="font-color: white">
                                  <img src="assets/images/testimonial.jpg" class="img-responsive" alt="image" style="max-width: 50%;">
                                    <h3 style="color: white">About</h3>
                                </div><!-- /.widget-title -->
                                <p>We Are A Leader In Tech-Enabled Digital Marketing Solutions</p>
                              
                            </div><!-- /.footer-widget about-widget -->
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-2">
                            <div class="footer-widget">
                                <div class="widget-title">
                                    <h3 style="color: white">Links</h3>
                                </div><!-- /.widget-title -->
                                <ul class="link-lists">
                                    <!-- <li><a href="page.php?type=aboutus">About Us</a></li> -->
                                    <li><a href="AboutUs.php">About Us</a></li>
                                    <li><a href="page.php?type=faqs">FAQs</a></li>
                                   <!--  <li><a href="page.php?type=privacy">Privacy</a></li>
                                    <li><a href="page.php?type=terms">Terms of use</a></li> -->
                                    <li><a href="admin/">Admin Login</a></li>
                                </ul>
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-2 -->
                        <div class="col-lg-3">
                            <div class="footer-widget">
                                <div class="widget-title">
                                    <h3 style="color: white">Contact</h3>
                                </div><!-- /.widget-title -->
                                <p>CHP 41, Phase-1, Kanan Vihar, Patia <br>Bhubaneswar India – 751031</p>
                                <ul class="contact-infos">
                                    <li><i class="fa fa-envelope"></i> paul@intelcorpsolutions.com</li>
                                    <li><i class="fa fa-phone-square"></i> +91-9776000769</li>
                                </ul><!-- /.contact-infos -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-4">
                            <div class="footer-widget">
                                <div class="widget-title">
                                    <h3 style="color: white">Newsletter</h3>
                                </div><!-- /.widget-title -->
                                <p>Sign up now for our mailing list to get all latest news <br> and updates from conexi company.</p>
               <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Enter Email Address" style="color:black" />
              </div>
              <button  style="background-color: #131414;" type="submit" name="emailsubscibe" class="btn btn-block">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" style="color:#1886bb " aria-hidden="true"></i></span></button>
            </form>
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.upper-footer -->
            <div class="bottom-footer">
                <div class="container">
                    <div class="inner-container">
                        <div class="left-block">
                            <!-- <a href="index-2.html" class="footer-logo">
                            <p class="copy-right">Copyright &copy; 2021 Intelcorp solutions. All Rights Reserved</p> -->
                        </div><!-- /.left-block -->
                      
                   
                </div><!-- /.container -->
            </div><!-- /.bottom-footer -->
        </footer><!-- /.site-footer -->

<footer>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p>Connect with Us:</p>
            <ul>
              <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy; 2021 Redicabs. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </div>
</footer>