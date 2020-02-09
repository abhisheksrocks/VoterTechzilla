<?php

include('./includes/dbconfig.php');
if(!isset($_GET['epic'])){
  die('Use the "Voter Search" section to download the voter id.');
}
$epic= $_GET['epic'];
if($con){
$queryget="SELECT `sno`, `name`, `email`, `gender`, `fathername`, `address`, `state`, `pincode`, `photo`, `completed` FROM `userinfo` WHERE `sno`='$epic'";
$data= mysqli_query($con,$queryget);
$result = mysqli_fetch_assoc($data);
$completed=$result['completed'];
if(!$completed){
  die('User does not exist or has not completed the registration!');
}
$epic=$result['sno'];
$name= $result['name'];
$email= $result['email'];
$gender= $result['gender'];
$fathername=$result['fathername'];
$address=$result['address'];
$state=$result['state'];
$pincode=$result['pincode'];
$filename=$result['photo'];

$dobquery="SELECT DATE_FORMAT(`dob`, '%d/%m/%Y') FROM `userinfo` WHERE `email`='$email'";
$data= mysqli_query($con,$dobquery);
$result = mysqli_fetch_assoc($data);
$birthday=$result["DATE_FORMAT(`dob`, '%d/%m/%Y')"];
mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">   
  <link rel="stylesheet" href="./resources/css/download.css">
  <title>Download Voter ID</title>
</head>
<body>
  <div id="HTMLtoPDF"> 
  <img src="./images/<?php echo $filename; ?>" alt="Use a suitable browser" height="280px" width="200px">
  <table>
  <tr>
    <th>EPIC No.</th>
    <td> <?php echo $epic; ?> </td>
  </tr>
  <tr>
    <th>Name</th>
    <td><?php echo ucwords($name);?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php echo $email;?></td>
  </tr>
  <tr>
    <th>Birthday</th>
    <td><?php echo $birthday;?></td>
  </tr>
  <tr>
    <th>Gender</th>
    <td><?php echo $gender;?></td>
  </tr>
  <tr>
    <th>Father's Name</th>
    <td><?php echo ucwords($fathername);?></td>
  </tr>
  <tr>
    <th>Address</th>
    <td><?php echo $address;?></td>
  </tr>
  <tr>
    <th>State</th>
    <td><?php echo $state;?></td>
  </tr>
  <tr>
    <th>Pincode</th>
    <td><?php echo $pincode;?></td>
  </tr>
</table>
</div>
<!-- here we call the function that makes PDF -->
	<a href="#" onclick="HTMLtoPDF()">Download PDF</a>

	<!-- these js files are used for making PDF -->
	<script src="./vendors/js/jspdf.js"></script>
	<script src="./vendors/js/jquery-2.1.3.js"></script>
	<script src="./vendors/js/pdfFromHTML.js"></script>
</body>
</html>