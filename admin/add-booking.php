<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
	$fname=$_POST['fullname'];
	$email=$_POST['emailid']; 
	$mobile=$_POST['mobileno'];
	$password=md5($_POST['password']); 
	$confirmpassword=md5($_POST['confirmpassword']);
	$dob=$_POST['dob'];
$adress=$_POST['address'];
$city=$_POST['city'];
$country=$_POST['country'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$status=0;
$vhid=$_GET['vhid'];
$bookingno=mt_rand(100000000, 999999999);
$ret="SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
$query1 = $dbh -> prepare($ret);
$query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query1->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query1->bindParam(':todate',$todate,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
if($query1->rowCount()==0)
{
	$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password,confirmpassword,dob,Address,City,Country) 
	VALUES(:fname,:email,:mobile,:password,:confirmpassword,:dob,:adress,:city,:country);
	INSERT INTO  tblbooking(BookingNumber,userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:bookingno,:email,:vhid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':confirmpassword',$confirmpassword,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':adress',$adress,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':bookingno',$bookingno,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
 echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
} }  else{
 echo "<script>alert('Car already booked for these days');</script>"; 
 echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
}

}

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | Admin Post Vehicle</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Book A Car</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">




<div class="form-group">
<label class="col-sm-1 control-label">Name<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
</div>
<label class="col-sm-1 control-label">Mobile No<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required">
</div>
<label class="col-sm-1 control-label">Email Id<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
</div>
</div>
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-1 control-label">Password<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="password" class="form-control" name="password" placeholder="Password" required="required">
</div>
<label class="col-sm-1 control-label">ConfirmPwd<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
</div>
<label class="col-sm-1 control-label">Date of Birth<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="text" >
</div>
</div>
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-1 control-label">Your Address<span style="color:red">*</span></label>
<div class="col-sm-3">
<textarea class="form-control white_bg" name="address" placeholder="address" rows="4" ></textarea>
</div>
<label class="col-sm-1 control-label">Country<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg"  id="country" placeholder="country" name="country" type="text">
</div>
<label class="col-sm-1 control-label">City<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg" id="city" placeholder="city" name="city" value="<?php echo htmlentities($result->City);?>" type="text">
</div>
</div>
<label class="col-sm-1 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-3">
<select class="selectpicker" name="brandname" required>
<option value=""> Select </option>
<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>

<!-- <div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-1 control-label">Search Vehicle<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg"  placeholder="Give Car Id No" name="id" type="text">
</div>
<button class="btn btn-primary" name="search" type="submit">Search</button>
</div> -->

<?php
if(isset($_POST['search']))
  {
	$id=$_POST['id'];
	$sql = "SELECT * from tblvehicles where id='$id'";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{				?>	



<div class="hr-dashed"></div>
<div class="form-group">

<label class="col-sm-1 control-label">VehicleType<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg" " placeholder="Fuel Type" name="vehicletitle"  value="<?php echo htmlentities($result->VehiclesTitle);?>" type="text">
</div>
<label class="col-sm-1 control-label">Vehicle No<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg" " placeholder="Fuel Type" name="vehno" value="<?php echo htmlentities($result->vehno);?>" type="text">
</div>
<label class="col-sm-1 control-label">Price Per Day<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg" placeholder="Price per Day" name="priceperday" type="text" value="<?php echo htmlentities($result->PricePerDay)?>" required>
</div>
</div>



<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-1 control-label">FuelType<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg" " placeholder="Fuel Type" name="city" value="<?php echo htmlentities($result->FuelType);?>" type="text">
</div>
<label class="col-sm-1 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg"  placeholder="Model Year" name="modelyear" value="<?php echo htmlentities($result->ModelYear);?>" type="text">
</div>
<label class="col-sm-1 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-3">
<input class="form-control white_bg" placeholder="Seating Capacity" name="seatingcapacity" value="<?php echo htmlentities($result->SeatingCapacity);?>" type="text">
</div>
</div>
<?php $cnt=$cnt+1; }} }?>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-1 control-label">From Date:<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="date" class="form-control" id="datepicker" name="fromdate" placeholder="From Date" required>
</div>
<label class="col-sm-1 control-label">To Date:<span style="color:red">*</span></label>
<div class="col-sm-3">
<input type="date" class="form-control" id="datepicker" name="todate" placeholder="To Date" required>
</div>
<label class="col-sm-1 control-label">Message:<span style="color:red">*</span></label>
<div class="col-sm-3">
<textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
</div>
</div>
			
<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>