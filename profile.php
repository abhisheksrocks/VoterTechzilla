<?php
  session_start();
  if(!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]===false){
    header("Location: ./index.php");
  }
include('./includes/dbconfig.php');

$nameerror="";
$gendererror="";
$fathererror="";
$addresserror="";
$stateerror="";
$pincodeerror="";
$photoerror="";
$email=$_SESSION['email'];
$epic="";
$name="";
$gender="";
$fathername="";
$address="";
$state="";
$pincode="";
$birthday="";
$filename="";
$completed="";
if($con){
$queryget="SELECT `sno`, `name`, `gender`, `fathername`, `address`, `state`, `pincode`, `photo`, `completed` FROM `userinfo` WHERE `email`='$email'";
$data= mysqli_query($con,$queryget);
$result = mysqli_fetch_assoc($data);
$epic= $result['sno'];
$name= $result['name'];
$gender= $result['gender'];
$fathername=$result['fathername'];
$address=$result['address'];
$state=$result['state'];
$pincode=$result['pincode'];
$filename=$result['photo'];
$completed=$result['completed'];
// mysqli_close($con);
// }

// include('./includes/dbconfig.php');
// if($con){
$dobquery="SELECT DATE_FORMAT(`dob`, '%d/%m/%Y') FROM `userinfo` WHERE `email`='$email'";
$data= mysqli_query($con,$dobquery);
$result = mysqli_fetch_assoc($data);
$birthday=$result["DATE_FORMAT(`dob`, '%d/%m/%Y')"];
mysqli_close($con);
}

include('./includes/dbconfig.php');
if(!empty($_POST['submitted'])){
  $name = $_POST['name'];
  $gender= $_POST['gender'];
  $fathername= $_POST['fathername'];
  $address= $_POST['address'];
  $state= $_POST['state'];
  $pincode=$_POST['pincode'];
  if(empty(trim($_POST['name'])) or !preg_match("/^[a-zA-Z ]*$/",$name))
  {
    $nameerror="<span class='red'>&#9888;</span> Enter a valid name";
    $error=true;
  }
  if(empty($gender)){
    $gendererror="<span class='red'>&#9888;</span>Choose a valid value";
    $error=true;
  }
  if(empty(trim($_POST['fathername'])) or !preg_match("/^[a-zA-Z ]*$/",$fathername))
  {
    $fathererror="<span class='red'>&#9888;</span> Enter a valid name";
    $error=true;
  }
  if(empty($address)){
    $addresserror="<span class='red'>&#9888;</span>Enter a valid address";
    $error=true;
  }
  if(empty($state)){
    $stateerror="<span class='red'>&#9888;</span>Choose a valid state";
    $error=true;
  }
  if(strlen($pincode)!=6 or !ctype_digit($pincode)){
    $pincodeerror="<span class='red'>&#9888;</span>Enter a valid pincode";
    $error=true;
  }
  if(empty($_FILES['photo']['name']) or $_FILES['photo']['size']>100000){
    $photoerror="<span class='red'>&#9888;</span>Please upload a valid image";
    $error=true;
  }
  if($error == false){
    $location= $_FILES['photo']['tmp_name'];
    $filename=$epic.".jpg";
    $folder="images/".$filename;
    move_uploaded_file($location,$folder);
    $queryupdate="UPDATE `userinfo` SET `name`='$name',`gender`='$gender',`fathername`='$fathername',`address`='$address',`state`='$state',`pincode`='$pincode',`photo`='$filename' WHERE `email`='$email'";
    $completedquery="UPDATE `userinfo` SET `completed`='1' WHERE `email`='$email'";
    $data= mysqli_query($con,$queryupdate);
    if($data){
      mysqli_query($con,$completedquery);
      $completed=1;
      $dberror="&#128077; Successfully updated.";

    }
    else{
      $dberror="Something went wrong with the database.";
    }
    mysqli_close($con);
  }
  if($error and $con){
    mysqli_close($con);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- header was here -->
  <?php $page=$_SESSION["username"]; include('./includes/head.php'); ?>
  <!-- header till here -->
</head>
<body>
  <section class="profile">
    <!-- nav was here -->
    <?php include('./includes/navbar.php'); ?>
    <!-- nav ended here -->
    <div class="prof row pro">
      <div class="photo">
          <img src="./images/<?php if(empty($filename)){
            echo 'defaultdp.png';
          }else{
            echo $filename;
          } ?>" alt="" width="200px" height="280px">
      </div>
      <div class="form-container">
        
        
        <div class="col span_9_of_12">
          <!-- <form action="./formoutput.php" method="post" enctype="multipart/form-data"> -->
          <form action="?" method="post" enctype="multipart/form-data">
            <span>EPIC No.: <?php echo $epic; ?></span><br><br>
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>" >
            <span class="error"><?php echo $nameerror ?></span><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="<?php print_r($_SESSION["email"]); ?>" disabled><br><br>
            <label for="dob">Birthday</label><br>
            <input type="text" name="dob" id="dob" value="<?php echo $birthday; ?>" disabled><br><br>
            <label for="gender">Gender</label><br>
            <select name="gender" id="gender">
              <option value="">Select Gender</option>
              <option value="Male" <?php if($gender=='Male'){
                echo 'selected';
              } ?> >Male</option>
              <option value="Female" <?php if($gender=='Female'){
                echo 'selected';
              } ?>>Female</option>
              <option value="Others" <?php if($gender=='Others'){
                echo 'selected';
              } ?> >Others</option>
            </select>
            <span class="error"><?php echo $gendererror ?></span><br>
            <label for="fathername">Father's Name</label><br>
            <input type="text" name="fathername" id="fathername" value="<?php echo $fathername; ?>">
            <span class="error"><?php echo $fathererror ?></span><br>
            <label for="address">Address</label><br>
            <textarea name="address" id="address"><?php echo $address; ?></textarea>
            <span class="error"><?php echo $addresserror ?></span><br>
            <label for="state">State</label><br>
            <select name=state id="state">
              <option value="" selected>Select State</option>
              <option value="Andaman and Nicobar Islands" <?php if($state=='Andaman and Nicobar Islands'){
                echo 'selected';
              } ?> >Andaman and Nicobar Islands</option>
              <option value="Andhra Pradesh" <?php if($state=='Andhra Pradesh'){
                echo 'selected';
              } ?> >Andhra Pradesh</option>
              <option value="Arunachal Pradesh" <?php if($state=='Arunachal Pradesh'){
                echo 'selected';
              } ?> >Arunachal Pradesh</option>
              <option value="Assam" <?php if($state=='Assam'){
                echo 'selected';
              } ?> >Assam</option>
              <option value="Bihar" <?php if($state=='Bihar'){
                echo 'selected';
              } ?> >Bihar</option>
              <option value="Chandigarh" <?php if($state=='Chandigarh'){
                echo 'selected';
              } ?> >Chandigarh</option>
              <option value="Chhattisgarh" <?php if($state=='Chhattisgarh'){
                echo 'selected';
              } ?> >Chhattisgarh</option>
              <option value="Dadra and Nagar Haveli" <?php if($state=='Dadra and Nagar Haveli'){
                echo 'selected';
              } ?> >Dadra and Nagar Haveli</option>
              <option value="Daman and Diu" <?php if($state=='Daman and Diu'){
                echo 'selected';
              } ?> >Daman and Diu</option>
              <option value="Delhi" <?php if($state=='Delhi'){
                echo 'selected';
              } ?> >Delhi</option>
              <option value="Goa" <?php if($state=='Goa'){
                echo 'selected';
              } ?> >Goa</option>
              <option value="Gujarat" <?php if($state=='Gujarat'){
                echo 'selected';
              } ?> >Gujarat</option>
              <option value="Haryana" <?php if($state=='Haryana'){
                echo 'selected';
              } ?> >Haryana</option>
              <option value="Himachal Pradesh" <?php if($state=='Himachal Pradesh'){
                echo 'selected';
              } ?> >Himachal Pradesh</option>
              <option value="Jammu and Kashmir" <?php if($state=='Jammu and Kashmir'){
                echo 'selected';
              } ?> >Jammu and Kashmir</option>
              <option value="Jharkhand" <?php if($state=='Jharkhand'){
                echo 'selected';
              } ?> >Jharkhand</option>
              <option value="Karnataka" <?php if($state=='Karnataka'){
                echo 'selected';
              } ?> >Karnataka</option>
              <option value="Kerala" <?php if($state=='Kerala'){
                echo 'selected';
              } ?> >Kerala</option>
              <option value="Lakshadweep" <?php if($state=='Lakshadweep'){
                echo 'selected';
              } ?> >Lakshadweep</option>
              <option value="Madhya Pradesh" <?php if($state=='Madhya Pradesh'){
                echo 'selected';
              } ?> >Madhya Pradesh</option>
              <option value="Maharashtra" <?php if($state=='Maharashtra'){
                echo 'selected';
              } ?> >Maharashtra</option>
              <option value="Manipur" <?php if($state=='Manipur'){
                echo 'selected';
              } ?> >Manipur</option>
              <option value="Meghalaya" <?php if($state=='Meghalaya'){
                echo 'selected';
              } ?> >Meghalaya</option>
              <option value="Mizoram" <?php if($state=='Mizoram'){
                echo 'selected';
              } ?> >Mizoram</option>
              <option value="Nagaland" <?php if($state=='Nagaland'){
                echo 'selected';
              } ?> >Nagaland</option>
              <option value="Orissa" <?php if($state=='Orissa'){
                echo 'selected';
              } ?> >Orissa</option>
              <option value="Pondicherry" <?php if($state=='Pondicherry'){
                echo 'selected';
              } ?> >Pondicherry</option>
              <option value="Punjab" <?php if($state=='Punjab'){
                echo 'selected';
              } ?> >Punjab</option>
              <option value="Rajasthan" <?php if($state=='Rajasthan'){
                echo 'selected';
              } ?> >Rajasthan</option>
              <option value="Sikkim" <?php if($state=='Sikkim'){
                echo 'selected';
              } ?> >Sikkim</option>
              <option value="Tamil Nadu" <?php if($state=='Tamil Nadu'){
                echo 'selected';
              } ?> >Tamil Nadu</option>
              <option value="Tripura" <?php if($state=='Tripura'){
                echo 'selected';
              } ?> >Tripura</option>
              <option value="Telangana" <?php if($state=='Telangana'){
                echo 'selected';
              } ?> >Telangana</option>
              <option value="Uttaranchal" <?php if($state=='Uttaranchal'){
                echo 'selected';
              } ?> >Uttaranchal</option>
              <option value="Uttar Pradesh" <?php if($state=='Uttar Pradesh'){
                echo 'selected';
              } ?> >Uttar Pradesh</option>
              <option value="West Bengal" <?php if($state=='West Bengal'){
                echo 'selected';
              } ?> >West Bengal</option>
            </select>
            <span class="error"><?php echo $stateerror ?></span><br>
            <label for="pincode">Pincode</label><br>
            <input type="text" name="pincode" id="pincode" value="<?php echo $pincode ?>">
            <span class="error"><?php echo $pincodeerror ?></span><br>
            <label for="photo">Photo (JPG/JPEG) (Max: 100KB) (Optimal Size: 200*280px) </label><br>
            <input type="file" name="photo" id="photo">
            <span class="error"><?php echo $photoerror ?></span><br>
            <input type="submit" name="submitted" value="Save/Update">
            <span class="error"><?php echo $dberror ?></span>
          </form>
          <br><br>
          <a href="./download.php?epic=<?php echo $epic; ?>" style="display:<?php if(!$completed){
            echo 'none';
          } ?>;" target="_blank" class="btn btn-full">Download Now</a>
        </div>
      </div>
    </div>
  </section>
  <!-- footer was here -->
  <?php include('./includes/footer.php'); ?>
  <!-- footer ended here -->
</body>
</html>