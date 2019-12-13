<?php 

include 'header.php';
session_start();
require_once 'objectPHP/compte.php';

$reg_user = new Compte();

if($reg_user->is_logged_in()!="")
{
 $reg_user->redirect('index.php');
}


if(isset($_POST['buttonInscript']))
{
 $uname = trim($_POST['pseudoInscript']);
 $email = trim($_POST['mailInscript']);
 $password = trim($_POST['mdpInscript']);
 $code = bin2hex(crypt(16));
 $stmt = $reg_user->runQuery("SELECT * FROM inscription WHERE email=:m");
 $stmt->execute(array(":m"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
 if($stmt->rowCount() > 0)
 {
  $msg = "
        
    <button class='close' data-dismiss='alert'>&times;</button>
     <strong>Hey !</strong> cette adresse email est déjà utilisée. Essayez une autre.";
 }
 else
 {
  if($reg_user->register($uname,$email,$password,$code))
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

<section id="formInscription">
<?php if(isset($msg)) echo $msg;  ?>
    <form method="POST" id="formdInscript">
        <p>Mail :</p> <input type="email" name="mailInscript" class="inputInscript" required>
        <p>Pseudo :</p> <input type="text" name="pseudoInscript" class="inputInscript"required>
        <p>Mot de passe :</p> <input type="password" name="mdpInscript"class="inputInscript" required>
        <p>Confirmation Mot de passe :</p> <input type="password" name="mdpInscript"class="inputInscript" required><br>
        <input type="submit" name="buttonInscript" id="buttonInscript" value="Inscrivez-vous">
    </form>
</section>

<?php include 'footer.php'; ?>