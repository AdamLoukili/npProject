<?php

require_once 'bdConfig.php';

class Compte {

    /*protected $id;
    protected $pseudo;
    protected $email;
    protected $mdp;*/
    private $conn;
 
 public function __construct()
 {
  $database = new BasedeDonnees();
  $db = $database->dbConnection();
  $this->conn = $db;
    }
 
 public function runQuery($sql)
 {
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }
 
 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }
 
 public function register($uname,$email,$upass,$code)
 {
  try
  {       
   $password = md5($upass);
   $stmt = $this->conn->prepare("INSERT INTO inscription (pseudo,email,motdepasse, tokencode) 
                                                VALUES(:pseudoInscript, :mail, :mdp, :active_code)");
   $stmt->bindparam(":pseudoInscript",$uname);
   $stmt->bindparam(":mailInscrit",$email);
   $stmt->bindparam(":mdpInscrit",$password);
   $stmt->bindparam(":active_code",$code);
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login($email,$upass)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM inscription WHERE email=:mailInscrit");
   $stmt->execute(array(":mailInscrit"=>$email));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['userStatus']=="Y")
    {
     if($userRow['mdpInscript']==password_hash($upass))
     {
      $_SESSION['userSession'] = $userRow['pseudoInscrit'];
      return true;
     }
     else
     {
      header("Location: ./index.php?error");
      exit;
     }
    }
    else
    {
     header("Location: ./index.php?inactive");
     exit;
    } 
   }
   else
   {
    header("Location: ./index.php?error");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 
 public function is_logged_in()
 {
  if(isset($_SESSION['userSession']))
  {
   return true;
  }
 }
 
 public function redirect($url)
 {
  header("Location: $url");
 }
 
 public function logout()
 {
  session_destroy();
  $_SESSION['userSession'] = false;
 }
 
 function send_mail($email,$message,$subject)
 {      
  require_once('objectPHP/phpmailer.php');
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "ssl";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 465;             
  $mail->AddAddress($email);
  $mail->Username="yourgmailid@gmail.com";  
  $mail->Password="yourgmailpassword";            
  $mail->SetFrom('you@yourdomain.com','Coding Cage');
  $mail->AddReplyTo("you@yourdomain.com","Coding Cage");
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->Send();
 } 
}
?>