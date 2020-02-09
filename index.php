<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- header was here -->
  <?php $page='Home'; include('./includes/head.php'); ?>
  <!-- header till here -->
</head>
<body>
  <div class="header">
    <!-- nav was here -->
    <?php include('./includes/navbar.php'); ?>
    <!-- nav ended here -->
    <div class="hero">
      <h1>Be a part of the <span class="bold">world's biggest</span> democracy</h1>
      <a class="btn btn-ghost" <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        echo "style='display: none;'";
      }else{
        echo  "href='./login.php'>Log In";
      }
      ?></a>
      <a class="btn btn-full" <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        echo "href='./profile.php'>Edit/Download Voter ID";
      }else{
        echo  "href='./signup.php'>Get My Voter ID";
      }
      ?></a>
      <div class="dummy">
        <div class="socials">
          <a href="#"><ion-icon class="so-links" name="logo-facebook"></ion-icon></a>
          <a href="#"><ion-icon class="so-links" name="logo-instagram"></ion-icon></a>
          <a href="#"><ion-icon class="so-links" name="logo-twitter"></ion-icon></a>
        </div>
      </div>
    </div>
  </div>  
  <section class="features">
    <div class="row">
      <div class="heading-twos">
        <h2 class="bold">Why to Register?</h2>
        <p class="description">We can give you not one, but three reasons to do so.</p>
      </div>
      <div class="reasons">
        <div class="col span_4_of_12">
          <a href="#"><ion-icon class="feat" name="contacts"></ion-icon></a>
          <h3 class="bold">Every Vote Counts</h3>
          <p class="description">Though it seems like an endless sea of people are there to vote, every vote counts. When the national attitude changes from thinking “my vote doesn’t make a difference”, then the numbers increase and a multitude of people voting will make the difference. The responsibility lies on every individual.</p>
        </div>
        <div class="col span_4_of_12">
          <a href="#"><ion-icon class="feat" name="jet"></ion-icon></a>
          <h3 class="bold">Agent of change</h3>
          <p class="description" >Your vote can play an important part in making the change. If you are unhappy with the current government, you can vote for a better one. Not voting could result in the same party ruling for another five years. At the end of the day, if the country is stuck with a bad government, it’s the people to blame for voting wrong or for not voting at all.
          </p>
        </div>
        <div class="col span_4_of_12">
          <a href="#"><ion-icon class="feat" name="analytics"></ion-icon></a>
          <h3 class="bold">India’s history</h3>
          <p class="description">Indians struggled to win our freedom and we have the right to vote because of them. Exercising our right to vote upholds what our freedom fighters envisioned for India. We can honor and respect our freedom fighters and the struggle of our past generations by voting for a better India.</p>
        </div>
      </div>
      <br>
      <div class="log-sign">
        <a class="btn btn-ghost" <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        echo "style='display: none;'";
      }else{
        echo  "href='./login.php'>Log In";
      }
      ?></a>
        <a class="btn btn-full" <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        echo "href='./profile.php'>Edit/Download Voter ID";
      }else{
        echo  "href='./signup.php'>Sign Up";
      }
      ?></a>
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