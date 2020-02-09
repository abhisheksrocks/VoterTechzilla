<footer class="credits">
    <div class="row">
      <div class="col span_4_of_12">
        <h3>About Me</h3>
        <p>A small town guy with a trillion dreams, a billion struggles, and a million failures...but definitely no regrets. <em>Bas success ki khwahish hai.</em></p>
      </div>
      <div class="col span_4_of_12">
        <h3>Quick Links</h3>
        <ul class="qlinks-container">
          <li><a class="qlinks" href="./index.html">Home</a></li>
          <li><a class="qlinks" href="./votersearch.php">Voter Search</a></li>
          <li><a class="qlinks" <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        echo "href='./profile.php'>Edit/Download Voter ID";
      }else{
        echo  "href='./signup.php'>Sign Up";
      }
      ?></a></li>
      <li><a class="qlinks" <?php
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
        echo "href='./logout.php'>Logout";
      }else{
        echo  "href='./login.php'>Log In";
      }
      ?></a></li>
        </ul>
      </div>
    </div>
    
      <div class="copyright">
        <p class="cpydesc">Made with <span class="red">&#10084;</span> by Abhishek for TechZilla</p>
        <p class="cpydesc">Copyright &copy; 2019</p>
      </div>
  </footer>