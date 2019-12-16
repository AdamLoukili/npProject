<?php
session_start();
require_once 'compte.php';
$user_login = new Compte();

if($user_login->is_logged_in()!="")
{
 $user_login->redirect('../index.php');
}

if(isset($_POST['btn-login']))
{
 $email = trim($_POST['txtemail']);
 $upass = trim($_POST['txtupass']);
 
 if($user_login->login($email,$upass))
 {
  $user_login->redirect('../index.php');
 }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/75bed6266a.js"></script>
  <title>Document</title>
</head>

<body>

<header>
  <section id="logoSprite">
  </section>
  
  <section id="listHeader">
    <ul>
      <li><a href="../index.php">Accueil</a></li>
      <li><a href="../news.php">News</a></li>
      <li><a href="../gallerie.php">Gallerie</a></li>
      <li><a href="../contact.php">Contacts</a></li>
    </ul>
  </section>

  <section id="Connex">
      <form action="objectPHP/login.php" method="POST">
        <input type="submit" id="connexion" name="connexion" value="Connexion">
      </form>
  </section>

  <section id="deco">
  <form method="POST">
        <input type="submit" id="deconnexion" name="deconnexion" value="Deconnexion">
      </form>
  </section>
  
  <button type="submit" id="inscriptionButton"><a href="../inscription.php">Pas encore<br />inscrit ?</a></button>
</header>


<section class="containLog">
  
  <?php 
  if(isset($_GET['inactive'])){
  ?>
  <section class='alertLogin'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Désolé!</strong> Ce compte n'est pas encore activé. Checker votre boïte mail. 
  </section>

  <?php } ?>

  <form class="form-signin" method="post">
    <?php
      if(isset($_GET['error'])){
    ?>
    <section class='alertLog'>
      <button class='close' data-dismiss='alert'>&times;</button><strong>Mauvais identifiants</strong> 
    </section>
    <?php } ?>
    <h2 class="signIn">Se connecter</h2>
    <input type="email" class="emailLog" placeholder="Adresse mail" name="txtemail" required />
    <input type="password" class="passwordLog" placeholder="Mot de passe" name="txtupass" required />
    <button class="buttonLog" type="submit" name="btn-login">Sign in</button>
    <p><a href="../inscription.php" class="lienLog">S'inscrire</a>
    <a href="forgetpassword.php" class="lienLog">Mot de passe perdu ? </a></p>
  </form>

</section>

<?php include '../footer.php'; ?>
