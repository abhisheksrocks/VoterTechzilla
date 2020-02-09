<?php

echo '<pre>'.print_r($_POST,true).'</pre>';
// $name = trim($_POST['username']);
// if(empty($name))
// {
// 	echo "Please enter your name";
// 	exit;
// }
echo print_r($_FILES['photo']);

if(empty($_FILES['photo']['name'])){
  echo "Empty";
}

echo $_FILES['photo']['size'];
// echo "Success";

?>