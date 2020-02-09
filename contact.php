<section class="contact">
    <div class="row">
      <div class="col2-left col span_6_of_12">
        <h2 class="bold">Still Unsure?</h2>
        <p class="description">We got you covered. Just fill this contact form with your details and query. We will get back to you as soon as possible.</p>
        <div class="third log-sign">
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
      <div class="col2-right col span_6_of_12">
        <div class="form-container">
          <form action="" method="post">
            <div class="lab">
              <label for="contactname"><ion-icon name="person"></ion-icon></label>
            </div>
            <div class="fill">
              <input type="text" name="" id="contactname" placeholder="Your Name">
            </div><br>
            <div class="lab">
              <label for="contactemail"><ion-icon name="at"></ion-icon></label>
            </div>
            <div class="fill">
              <input type="text" name="" id="contactemail" placeholder="Your Email">
            </div><br>
            <div class="lab">
              <label for="message"><ion-icon name="chatbubbles"></ion-icon></label>
            </div>
            <div class="fill">
              <textarea name="" id="message" placeholder="Your Message"></textarea>
            </div><br>
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </section>