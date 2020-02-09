<?php

session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
  header("Location: ./profile.php");
}

include('./includes/dbconfig.php');
$emailerror="";
$passworderror="";
$email="";
if(!empty($_POST['submitted'])){
  $email = trim($_POST['email']);
  $password=trim($_POST['password']);
  if(empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    $emailerror="<span class='red'>&#9888;</span> Enter a valid email";
    $error=true;
  }
  if(empty($password)){
    $passworderror="<span class='red'>&#9888;</span> Enter a valid value";
    $error=true;
  }
  if($error == false){
    $checkemail="SELECT `email` FROM `userinfo` WHERE `email`='$email'";
    $checkpass="SELECT `email`, `password` FROM `userinfo` WHERE `email`='$email' AND `password`='$password'";
    if(!mysqli_num_rows(mysqli_query($con,$checkemail))){
      $emailerror="<span class='red'>&#9888;</span> Email doesn't exist";
      // mysqli_close($con);
    }else if(!mysqli_num_rows(mysqli_query($con,$checkpass))){
      $passworderror="<span class='red'>&#9888;</span> Wrong password!";
      // mysqli_close($con);
    }else{
      $_SESSION['email']=$email;
      $_SESSION['loggedin']= true ;
      $query="SELECT `name` FROM `userinfo` WHERE `email`='$email'";
      $data=mysqli_query($con, $query);
      $result=mysqli_fetch_assoc($data);
      $_SESSION['username']=ucwords($result['name']);
      header("Location: ./profile.php");
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
  <?php $page='Log In'; include('./includes/head.php'); ?>
  <!-- header till here -->
</head>
<body>
  <section class="login">
    <!-- nav was here -->
    <?php include('./includes/navbar.php'); ?>
    <!-- nav ended here -->
    <div class="row">
      <div class="col2-left col span_6_of_12">
        <h2 class="bold">Did You Know?</h2>
        <p class="description">You can get your voter ID, even without logging in from our "Voter Search" section in the navigation bar on the top.</p>
        <p class="description">If this is your first time here, you must sign up first to get started with your voter ID registration.</p>
        <div class="third log-sign">
        <a href="#" class="btn btn-full">Sign Up</a>
      </div>
      </div>
      <div class="col2-right col span_6_of_12">
        <div class="form-container">
          <form action="?" method="post">
            <div class="lab">
              <label for="email"><ion-icon name="at"></ion-icon></label>
            </div>
            <div class="fill">
              <input type="email" name="email" id="email" placeholder="Your Email" value="<?php echo htmlentities($email) ?>" >
              <span class="error"><?php echo $emailerror ?></span>
            </div><br>
            <div class="lab">
              <label for="password"><ion-icon name="key"></ion-icon></label>
            </div>
            <div class="fill">
              <input type="password" name="password" id="password" placeholder="Your Password">
              <span class="error"><?php echo $passworderror ?></span>
            </div><br><br>
            <input type="submit" name="submitted" value="Log In">
            <span class="error"><?php echo $dberror ?></span>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- contact was here -->
  <?php include('./contact.php'); ?>
  <!-- contact ends here -->
  <!-- footer was here -->
  <?php include('./includes/footer.php'); ?>
  <!-- footer ended here -->
</body>
</html>