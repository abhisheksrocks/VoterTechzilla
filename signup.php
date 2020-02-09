<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]===true){
  header("Location: ./profile.php");
}

include('./includes/dbconfig.php');
$nameerror="";
$emailerror="";
$passworderror="";
$confpasserror="";
$dateerror="";
$notagree="";
$name="";
$email="";
if(!empty($_POST['submitted'])){
  $name = $_POST['username'];
  $email = trim($_POST['email']);
  $password=trim($_POST['password']);
  $password1=$_POST['password1'];
  $date=$_POST['date'];
  $month=$_POST['month'];
  $year=$_POST['year'];
  
  if(empty(trim($_POST['username'])) or !preg_match("/^[a-zA-Z ]*$/",$name))
  {
    $nameerror="<span class='red'>&#9888;</span> Enter a valid name";
    $error=true;
  }
  if(empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    $emailerror="<span class='red'>&#9888;</span> Enter a valid email";
    $error=true;
  }
  $emailcheck="SELECT `email` FROM `userinfo` WHERE `email`='$email'";
  if(mysqli_num_rows(mysqli_query($con,$emailcheck))){
      $emailerror="<span class='red'>&#9888;</span> Email already exists";
      // mysqli_close($con);
      $error=true;
    }
  if(empty($password)){
    $passworderror="<span class='red'>&#9888;</span> Enter a valid value";
    $error=true;
  }
  if($password!=$password1){
    $confpasserror="<span class='red'>&#9888;</span> Both passwords do not match";
    $error=true;
  }
  if(empty($date) or empty($month) or empty($year) or !checkdate($month,$date,$year) ){
    $dateerror="<span class='red'>&#9888;</span> Enter a valid date";
    $error=true;
  }else{ 
  $birthtime=mktime(0,0,0,$month,$date,$year);
  $tminus18=mktime(0,0,0,date('m'),date('d'),date('Y')-18);
  //Checking Age
  if($birthtime>$tminus18){
    $dateerror="<span class='red'>&#9888;</span> You must be 18 years or older to register";
    $error=true;
  }
  }
  if(!isset($_POST['agree'])){
    $notagree="<span class='red'>&#9888;</span> You must agree to proceed";
    $error=true;
  }
  if($error == false){
      $signupquery="INSERT INTO `userinfo`(`name`, `email`, `password`, `dob`) VALUES ('$name','$email','$password','$year-$month-$date')";
      if(!mysqli_query($con,$signupquery)){
        $dberror="<span class='red'>&#9888;</span> Unable to sign up, please try again later";
        // mysqli_close($con);
      }
      else{
        // mysqli_close($con);
        $_SESSION['email']=$email;
        $_SESSION['username']=ucwords($name);
        $_SESSION['loggedin']= true ;
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
  <?php $page='Sign Up'; include('./includes/head.php'); ?>
  <!-- header till here -->
</head>
<body>
<section class="signup">
    <!-- nav was here -->
    <?php include('./includes/navbar.php'); ?>
    <!-- nav ended here -->
    <div class="row">
      <div class="col2-left col span_6_of_12">
        <h2 class="bold">Great! You are here!</h2>
        <p class="description">Everything that's great begins with a small step. You have taken a small step today, great things are on your way.</p>
        <p class="description">If you have signed up already, you can log in to complete your voter id registration.</p>
        <div class="third log-sign">
        <a href="./login.php" class="btn btn-ghost">Log In</a>
      </div>
      </div>
      <div class="col2-right col span_6_of_12">
        <div class="form-container">
          <form action="?" method="post">
            <div class="lab">
              <label for="name"><ion-icon name="person"></ion-icon></label>
            </div>
            <div class="fill">
              <input type="text" name="username" id="name" placeholder="Your Full Name" value="<?php echo htmlentities($name) ?>">
              <span class="error"><?php echo $nameerror ?></span>
            </div><br>
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
            </div><br>
            <div class="fill">
              <input type="password" name="password1" id="password1" placeholder="Confirm Password">
              <span class="error"><?php echo $confpasserror ?></span>
            </div><br>
            <div class="lab">
              <label for="date"><span id="dob">Birthday</span></label>
            </div>
            <div class="fill">
              <select name="date" id="date">
                <option value="">Date</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              <select name="month" id="month">
                <option value="">Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              <select name="year" id="year" value="<?php echo htmlentities($year) ?>">
                <option value="">Year</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
                <option value="1959">1959</option>
                <option value="1958">1958</option>
                <option value="1957">1957</option>
                <option value="1956">1956</option>
                <option value="1955">1955</option>
                <option value="1954">1954</option>
                <option value="1953">1953</option>
                <option value="1952">1952</option>
                <option value="1951">1951</option>
                <option value="1950">1950</option>
                <option value="1949">1949</option>
                <option value="1948">1948</option>
                <option value="1947">1947</option>
                <option value="1946">1946</option>
                <option value="1945">1945</option>
                <option value="1944">1944</option>
                <option value="1943">1943</option>
                <option value="1942">1942</option>
                <option value="1941">1941</option>
                <option value="1940">1940</option>
                <option value="1939">1939</option>
                <option value="1938">1938</option>
                <option value="1937">1937</option>
                <option value="1936">1936</option>
                <option value="1935">1935</option>
                <option value="1934">1934</option>
                <option value="1933">1933</option>
                <option value="1932">1932</option>
                <option value="1931">1931</option>
                <option value="1930">1930</option>
                <option value="1929">1929</option>
                <option value="1928">1928</option>
                <option value="1927">1927</option>
                <option value="1926">1926</option>
                <option value="1925">1925</option>
                <option value="1924">1924</option>
                <option value="1923">1923</option>
                <option value="1922">1922</option>
                <option value="1921">1921</option>
                <option value="1920">1920</option>
                <option value="1919">1919</option>
                <option value="1918">1918</option>
                <option value="1917">1917</option>
                <option value="1916">1916</option>
                <option value="1915">1915</option>
                <option value="1914">1914</option>
                <option value="1913">1913</option>
                <option value="1912">1912</option>
                <option value="1911">1911</option>
                <option value="1910">1910</option>
                <option value="1909">1909</option>
                <option value="1908">1908</option>
                <option value="1907">1907</option>
                <option value="1906">1906</option>
                <option value="1905">1905</option>
              </select>
              <span class="error"><?php echo $dateerror ?></span>
            </div><br>
            <input type="checkbox" name="agree" id="agree" >
            <label for="agree" id="check" > I agree with the <a href="#">Terms of Conditions</a> and <a href="#">Privacy Policy</a></label>
            <span class="error"><?php echo $notagree ?></span>
            <br><br>
            <input type="submit" name="submitted" value="Sign Up">
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