    <?php 
    session_start();
    require_once 'objectPHP/compte.php';
    include 'header.php';

    if(isset($_POST['buttonCont'])){
      $user = new Compte;
      if(isset($_POST['pseudoCont']) && isset($_POST['mailCont'])){
        $stmt= $user->runQuery("INSERT INTO contact (pseudo, email, contactcomm) VALUES (:pseudoCont, :mailCont, :commCont)");
        $stmt ->execute(array(':pseudoCont' => $_POST['pseudoCont'], ':mailCont'=> $_POST['mailCont'], ':commCont'=> $_POST['commCont']));
      }else{
        echo "Le formulaire n'est pas complété";
      }
    }
    ?>
    <p id="lineCont"><strong>Besoin de nous contacter ? Un avis à nous soumettre ? </br> N'hésitez pas !</strong></p>

    <section class="contactAll">

      <section class="formContact">
        <form method="POST">
          <p>Votre Pseudo : <input type="text" id="pseudoCont" name="pseudoCont" ></p>
          <p>Votre Mail   : <input type="email" id="mailCont" name="mailCont" ></p>
          <p>Commentaires : <textarea id="commCont" name="commCont" placeholder="Votre commentaire ici..."></textarea></p>
          <input type="submit" name="buttonCont" id="buttonCont" value="Envoyer">
        </form>
      </section>

      <section class="rezoSocial">
        <ul>
          <li><a href="#"><i class="fab fa-facebook"></i></a> Facebook</li>
          <li><a href="#"><i class="fab fa-twitter"></i></a>Twitter</li>
          <li><a href="#"><i class="fab fa-instagram"></i></a>Instagram</li>
          <li><a href="#"><i class="fab fa-pinterest"></i></a>Pinterest</li>
          <li><a href="#"><i class="far fa-envelope"></i></a>E-mail</li>
        </ul>
      </section>

    </section>
    <section id="partenaires">
      <ul>
        <li><strong>Partenaires</strong></li>
        <li><a href="#">Quelqu'un</a></li>
        <li><a href="#">Quelqu'un</a></li>
        <li><a href="#">Quelqu'un</a></li>
        <li><a href="#">Quelqu'un</a></li>
      </ul>
      <ul>
        <li><strong>Liens Utiles</strong></li>
        <li><a href="#">jesuisunlien</a></li>
        <li><a href="#">jesuisunlien</a></li>
        <li><a href="#">jesuisunlien</a></li>
        <li><a href="#">jesuisunlien</a></li>
      </ul>
      <ul>
        <li><strong>Autres</strong></li>
        <li><a href="#">Autres</a></li>
        <li><a href="#">Autres</a></li>
        <li><a href="#">Autres</a></li>
        <li><a href="#">Autres</a></li>
      </ul>
    </section>

     <!-- ---------------------- This Is Footer Part -------------------- -->
     <?php include 'footer.php'; ?>
    <script scr="js.js"></script>
