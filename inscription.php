<?php include 'header.php'; ?>

<section id="formInscription">
    <form method="POST" id="formdInscript">
        <p>Mail :</p> <input type="email" name="mailInscript" class="inputInscript">
        <p>Pseudo :</p> <input type="text" name="pseudoInscript" class="inputInscript">
        <p>Mot de passe :</p> <input type="text" name="mdpInscript"class="inputInscript">
        <p>Confirmation Mot de passe :</p> <input type="text" name="cmdpInscript"class="inputInscript"><br>
        <input type="submit" name="buttonInscript" id="buttonInscript" value="Inscrivez-vous">
    </form>
</section>

<?php include 'footer.php'; ?>