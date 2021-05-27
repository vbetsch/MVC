<?php /* @var array $args */ ?>

<form action="<?= SITE . '/User/process_login' ?>" method="post">
    <label for="login"><input id="login" name="login" type="text" placeholder="Identifiant"></label>
    <label for="pwd"><input id="pwd" name="pwd" type="password" placeholder="Mot de passe"></label>
    <label for="valid"><input id="valid" name="valid" type="submit" value="Valider"></label>
    <label for="cancel"><input id="cancel"  name="cancel" type="reset" value="Annuler"></label>
</form>

<?php if ($args['error']) {
    echo '<p>Error : ' . $args['error'] . '</p>';
} ?>