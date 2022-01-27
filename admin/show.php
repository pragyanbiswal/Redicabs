<?php
$id=$_GET['id'];
$sql = "SELECT PricePerDay,FuelType,ModelYear,SeatingCapacity,id from tblvehicles where id='$id'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
?>