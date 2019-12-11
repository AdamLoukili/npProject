<?php
session_start();
require_once 'compte.php';

$reg_user = new Compte());

if($reg_user->is_logged_in()!="")
{
 $reg_user->redirect('./index.php');
}


if(isset($_POST['buttonInscript']))
{
 $uname = trim($_POST['pseudoInscript']);
 $email = trim($_POST['mailInscript']);
 $upass = trim($_POST['mdpInscript']);
 $code = md5(uniqid(rand()));
 
 $stmt = $reg_user->runQuery("SELECT * FROM inscription WHERE email=:email_id");
 $stmt->execute(array(":email_id"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() > 0)
 {
  $msg = "
        <div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Hey !</strong> cette adresse email est déjà utilisée. Essayez une autre.
     </div>
     ";
 }
 else
 {
  if($reg_user->register($uname,$email,$upass,$code))
  {   
   $id = $reg_user->lasdID();  
   $key = base64_encode($id);
   $id = $key;
   
   $message = "     
      Hello $uname,
      <br /><br />
      Welcome to Coding Cage!<br/>
      To complete your registration  please , just click following link<br/>
      <br /><br />
      <a href='http://www.SITE_URL.com/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
      <br /><br />
      Thanks,";
      
   $subject = "Confirm Registration";
      
   $reg_user->send_mail($email,$message,$subject); 
   $msg = "
     <div class='alert alert-success'>
      <button class='close' data-dismiss='alert'>&times;</button>
      <strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
       </div>
     ";
  }
  else
  {
   echo "sorry , Query could no execute...";
  }  
 }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Signup | Coding Cage</title>
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login">
    <div class="container">
    <?php if(isset($msg)) echo $msg;  ?>
      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        <input type="text" class="input-block-level" placeholder="Username" name="txtuname" required />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" required />
        <input type="password" class="input-block-level" placeholder="Password" name="txtpass" required />
      <hr />
        <button class="" type="submit" name="btn-signup">Sign Up</button>
        <a href="index.php" style="float:right;" class="btn btn-large">Sign In</a>
      </form>

    </div> <!-- /container -->
    
  </body>
</html>