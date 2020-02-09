<?php
session_start();
include('./includes/dbconfig.php');
$searchbyerror="";
$searchtexterror="";
if(!empty($_POST['submitted'])){
          $searchby=$_POST['searchby'];
          $searchtext=$_POST['searchtext'];
          if(empty(trim($_POST['searchtext']))){
            $searchtexterror="<span class='red'>&#9888;</span> Enter a valid option";
            $error=true;
          }
          if(empty($searchby)){
            $searchbyerror="<span class='red'>&#9888;</span> Choose a valid value";
            $error=true;
          }
          }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- header was here -->
  <?php $page="Voter Search"; include('./includes/head.php'); ?>
  <!-- header till here -->
</head>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 97%;
  margin-top: 100px;
}

th, td {
  padding: 15px;
}
</style>
<body>
  <section class="profile">
    <!-- nav was here -->
    <?php include('./includes/navbar.php'); ?>
    <!-- nav ended here -->
    <div class="search prof row">
      <h1 class="heading-twos">Voter Search</h1>
      <div class="form-container">
        <form action="?" method="post">
          <label for="searchby">Search By</label><br>
          <select name="searchby" id="searchby">
            <option value="">Search By</option>
            <option value="sno">EPIC No.</option>
            <option value="name">Name</option>
            <option value="email">Email</option>
            <option value="pincode">Pincode</option>
          </select>
          <span class="error"><?php echo $searchbyerror; ?></span><br>
          <label for="searchtext">Text to Search</label><br>
          <input type="text" name="searchtext" id="searchtext">
          <span class="error"><?php echo $searchtexterror; ?></span><br>
          <input type="submit" name="submitted" value="Search">
        </form>
        <?php
        if(!empty($_POST['submitted'])){
          if($error == false){
            $query= "SELECT `sno`, `name`, `email`, `dob`, `gender`, `fathername`, `address`, `state`, `pincode`, `completed` FROM `userinfo` WHERE `$searchby`='$searchtext'";
            $data=mysqli_query($con,$query);
            $total=mysqli_num_rows($data);
            if($total){
              ?>
              <div style="overflow-x:auto;">
              <table>
                <tr>
                  <th>EPIC No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Birthday</th>
                  <th>Gender</th>
                  <th>Father's Name</th>
                  <th>Address</th>
                  <th>State</th>
                  <th>Pin Code</th>
                  <th>Download</th>
                </tr>
              
              <?php
              while($result = mysqli_fetch_assoc($data)){
                 echo "<tr>
                  <td>".$result['sno']."</td>
                  <td>".$result['name']."</td>
                  <td>".$result['email']."</td>
                  <td>".$result['dob']."</td>
                  <td>".$result['gender']."</td>
                  <td>".$result['fathername']."</td>
                  <td>".$result['address']."</td>
                  <td>".$result['state']."</td>
                  <td>".$result['pincode']."</td>
                  <td>";
                  if($result['completed']){
                    echo "<a target='_blank' href='./download.php?epic=".$result['sno']." '>Download Now</a>";
                  }else{
                    echo "Registration Incomplete";
                  }
                  echo "</td>
                </tr>";
              }
            }else{
              echo "<h3 class='heading-twos'>No Record Found</h3>";
            }
          }
        }
        ?></table></div>
      </div>
    </div>
    
  </section>
  <!-- footer was here -->
  <?php include('./includes/footer.php'); ?>
  <!-- footer ended here -->
</body>
</html>