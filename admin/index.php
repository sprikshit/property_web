<?php include ('../functions/validation.php')

/*
session_start();

if(isset($_POST['Login'])){
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $_SESSION['id'] = $id;
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');
  $p1 = md5($password);

  $db = mysqli_connect('localhost','dash','','dash');
  $query = "SELECT * FROM signup WHERE username= '$username' and password = '$p1'";
  $res = mysqli_query($db, $query);
  $row = mysqli_fetch_array($res);
  if(is_array($row)){
    $_SESSION['userid'] = $row['id'];
    header('Location: properties-single.php');
  }

}
*/

?>

<style>
  @import url(//fonts.googleapis.com/css?family=Montserrat:400:300:500:600);

html{
overflow:hidden;
font-family: 'Montserrat', sans-serif;
}

body {
margin:0;
}

h3 {
font-family: 'Montserrat', sans-serif;
font-weight:600;
letter-spacing: 2px;
font-size:32px;
}
p {
font-family: 'Lato', sans-serif;
letter-spacing: 1px;
font-size:14px;
color: #333333;
}

.header {
position:relative;
text-align:center;
background: linear-gradient(60deg, rgb(181, 183, 58) 0%, rgb(0, 193, 64) 100%);
color:white;
}


.inner-header {
height:20vh;
width:100%;
margin: 0;
padding: 0;
}

.flex { /*Flexbox for containers*/
display: flex;
flex-direction:column;
justify-content: center;
align-items: center;
text-align: center;
}

.bottom-container{
display:flex;
align-items:center;
}

a{
text-decoration:none;
margin: 0px 5px;
font-family: 'Montserrat', sans-serif;
letter-spacing:0px;
font-size:14px;
font-weight:600;
color:limegreen;

}

.waves {
position:relative;
width: 100%;
height:15vh;
margin-bottom:-7px; /*Fix for safari gap*/
min-height:100px;
max-height:150px;
}
.error {
    width: 92%; 
    color: rgb(0, 0, 0);
    padding: 10px;
    border: 1px solid #ad9444;
    background: rgba(255, 34, 34, 0.933);
}

.content {
position:relative;
height:80%;
text-align:center;
background-color: white;
}

/* Animation */

.parallax > use {
animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
animation-delay: -2s;
animation-duration: 7s;
}
.parallax > use:nth-child(2) {
animation-delay: -3s;
animation-duration: 10s;
}
.parallax > use:nth-child(3) {
animation-delay: -4s;
animation-duration: 13s;
}
.parallax > use:nth-child(4) {
animation-delay: -5s;
animation-duration: 20s;
}
@keyframes move-forever {
0% {
 transform: translate3d(-90px,0,0);
}
100% { 
  transform: translate3d(85px,0,0);
}
}
/*Shrinking for mobile*/
@media (max-width: 768px) {
.form{
  max-width:80vh;
}
.waves {
  height:40px;
  min-height:40px;
}
.content {
  height:70vh;
}
h1 {
  font-size:24px;
}
}

form{
display:flex;
width:80vh;
justify-content:center;
align-items:center;
flex-direction:column;
padding:10px;
margin:10px;
}

input{
width:80%;
padding:8px;
margin:10px;
height:32px;
font-size:1rem;;
border:none;
box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 20%);
border-radius:25px;
outline:none;
text-align:center;

}

.login-btn{
font-size:1rem;
border:none;
height:44px;
width:40%;
margin:20px 10px;
border-radius:25px;
background-color:#3A5FBB;
color:#ffffff

}
.cancel-btn{
font-size:1rem;
border:none;
height:44px;
width:40%;
margin:20px 10px;
border-radius:25px;
background-color:red;
color:#ffffff

}

button:hover {
box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 30%);

}

</style>
<!-- Responsive Desktop/Mobile Login form considered to be used as mobile first approach--> 
<!-- Wave animation credit: https://codepen.io/goodkatz -->

<div class="header">

  <!--Content before waves-->
  <div class="inner-header flex">
  <!--Just the logo.. Don't mind this-->
  
  <h3>Prakash Properties Here To Serve</h3>
  <br>
  <h4>Login As Administrator</h4>
  </div>
  
  <!--Waves Container-->
  <div>
  <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
  viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
  <defs>
  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
  </defs>
  <g class="parallax">
  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
  <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
  <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
  </g>
  </svg>
  </div>
  <!--Waves end-->
  
  </div>
  <!--Header ends-->
  
  <!--Content starts-->
  <div class="content flex">
    <form method='post'>
    <?php include_once('../view/errors.php'); ?>
      <input type="text" name="username" id="username" placeholder="Username"/>
      <input type="password" name="password" id="password" placeholder="Password"/>
      <button name="adminLogin" id="Login" class="login-btn">Login</button>
      <button name="adCancel" id="Cancel" class="cancel-btn">Cancel</button>

    </form>
      
  <!--Content ends-->