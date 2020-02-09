<nav>  
  <div class="row">
    <a href="./index.php"><img class="logo" src="./resources/images/logo-white.png" alt="Voter Logo"></a>
    <ul class=navlinks>
      <li><a class="btn" href="./index.php">Home</a></li>
      <li><a class="btn" href="./votersearch.php">Voter Search</a></li>
      <li><a class="btn" <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        echo "href='./logout.php'>Logout";
      }else{
        echo  "href='./login.php'>Log In";
      }
      ?>
      </a></li>
      <li><a class="btn btn-full" <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        echo "href='./profile.php'>Edit/Download Voter ID";
      }else{
        echo  "href='./signup.php'>Sign Up";
      }
      ?></a></li>
    </ul>
  </div>
</nav>