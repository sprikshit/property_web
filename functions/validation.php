<?php
session_start();
$username="";
$email="";
$errors=array();

$db = mysqli_connect('localhost','root','','dash');
$id = isset($_GET['id']) ? $_GET['id'] : '';
$_SESSION['id'] = $id;
if(isset($_SESSION['userid'])){
    header('Location: properties-single.php');
  }

  if(isset($_POST['Cancel'])){
    header('Location: properties.php');
  }

  if(isset($_POST['adCancel'])){
    header('Location: index.php');
  }

if(isset($_POST['Submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if (empty($username)) {
        array_push($errors, "Fill Username");
    }
    if (empty($email)) {
        array_push($errors, "Fill email");
    }
    if (empty($password_1)) {
        array_push($errors, "Fill password");
    }
    if ($password_1 != $password_2) {
        array_push($errors,"Password do not match"); 
    }

    $user_check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
    else {
        $password=md5($password_1);
        $sql="INSERT INTO signup (username,email,password) VALUES ('$username','$email','$password')";

        mysqli_query($db,$sql);
        header('location:ind.php');
        
        
    }
}

if(isset($_POST['Login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];


  if (empty($username)) {
      array_push($errors, "Username Required");
  }
  if (empty($password)) {
      array_push($errors, "Password Required");
  }
  
  if (count($errors)==0) { 
      $password=md5($password);
      $query="SELECT * FROM signup WHERE username='$username' AND password='$password'";
      
      $results1= mysqli_query($db,$query);
 
      if ($row=mysqli_fetch_array($results1)) {
         $_SESSION['userid'] = $row['id'];
        header('Location: properties-single.php');
        
      } 
      else{
          array_push($errors,"Wrong Username or Password");
      }
  
  }


}

if(isset($_POST['adminLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
  
  
    if (empty($username)) {
        array_push($errors, "Username Required");
    }
    if (empty($password)) {
        array_push($errors, "Password Required");
    }
    
    if (count($errors)==0) { 
        //$password=md5($password);
        $query="SELECT * FROM adminlogin WHERE adminuser='$username' AND adminpassword='$password'";
        
        $results1= mysqli_query($db,$query);
   
        if ($row=mysqli_fetch_array($results1)) {
           $_SESSION['adminid'] = $row['id'];
          header('Location: admin.php');
          
        } 
        else{
            array_push($errors,"Wrong Username or Password");
        }
    
    }
  
  
  }
  

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header('invent.html');

} 



?>
