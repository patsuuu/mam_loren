
<?php

@include 'conn.php';

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $mname = mysqli_real_escape_string($conn, $_POST['mname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $sex = mysqli_real_escape_string($conn, $_POST['sex']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $mfa = mysqli_real_escape_string($conn, $_POST['mfa']);
   $answer = mysqli_real_escape_string($conn, $_POST['answer']);
   
   

   $select = " SELECT * FROM hub_tbl WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO hub_tbl(fname, mname, lname, age, address, sex, username, password, mfa, answer) VALUES('$fname','$mname','$lname','$age','$address','$sex','$username','$pass','$mfa','$answer')";
         mysqli_query($conn, $insert);
         
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
      form {
        border-style: inset;
  border-width: auto;
  position: auto;
  height: auto;
  width: 25%;
  bottom: auto;
  padding:  auto  ;
  font-size: 17px;
  line-height: 1.3;
  background-color: #FF6701;
  margin-left: auto; 
  margin-right: auto;
  margin-bottom: auto;
}
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Timesnewroman;
  font-size: 20px;
  background-color: #1F1717;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  width: 100%;
  
  
}


#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}


.logo {
  background: url("../graphics/dhaka logo.png");
  padding: 0px;
  margin: 0px;
  width: 150px;
  height: 0px;
  
}
#myBtn:hover {
  background: #ddd;
  color: black;
}
#title{
  color : #FF6701;
  
}
      </style>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>patsuhub</title>

   <!-- custom css file link  -->
  

</head>
<body>
<br>
        
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="https://media.discordapp.net/attachments/1134158940838564000/1172171293353844798/image.png?ex=655f5896&is=654ce396&hm=369c35cab204c05955b12cc2451d2ab4a754a35ea2ce35d1adf75f73d4cb3175&=" alt="" height="40" width="150"></font>
           
<center>
<h1 id="title"></a></h1>
</center>
<center><br><br>  
<script>
    window.history.forward();
    function noBack() { window.history.forward(); }
</script>
   <center><br><br><br><br>
<div class="form-container">

   <form action="" method="post">
      <h3>register hub</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <center>
      <input type="text" name="fname" required placeholder="enter your first name">
      <center><br>
      <center>
      <input type="text" name="mname" required placeholder="enter your middle name">
      <center><br>
      <center>
      <input type="text" name="lname" required placeholder="enter your last name">
      <center><br>
      <center>
      <input type="text" name="age" required placeholder="enter your age">
      <center><br>
      <center>
      <input type="text" name="address" required placeholder="enter your address">
      <center><br>
      <center>
      <input type="text" name="sex" required placeholder="enter your sex">
      <center><br>
      <center>
      <input type="text" name="username" required placeholder="enter your username">
      <center><br>
      <center>
      <input type="password" name="password" required placeholder="enter your password">
      <center><br>
      <center>
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <center><br>
      <center>
      <input type="text" name="mfa" required placeholder="enter your mfa">
      <center><br>
      <center>
      <input type="text" name="answer" required placeholder="enter your answer">
      <center><br>
      <center>
      
      <center>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>have an account? <a href="login.php">login now</a></p>
   </form>

</div>

   </center>
</body>
</html>