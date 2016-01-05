<?php
var_dump($_POST);
$in_post = array_key_exists('register', $_POST);

//Validation PRENOM

$prenom_ok = false;
$prenom_msg = '';
if (array_key_exists('prenom', $_POST)) {
  $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_MAGIC_QUOTES);
  $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);


  $prenom_ok = (1 === preg_match('/^[A_Za-z]{1,}$/', $prenom));
if (! $prenom_ok) {

  $prenom_msg = 'Le prénom ne doit contenir que des lettres (min 2).';
}
  var_dump($prenom);
  var_dump($prenom_ok);
  var_dump($prenom_msg);
}

//Validation NOM
$nom_ok = false;
if (array_key_exists('nom', $_POST)) {
  $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_MAGIC_QUOTES);
  $nom = filter_var($nom, FILTER_SANITIZE_STRING);


  $nom_ok = (1 === preg_match('/^[A_Za-z]{1,}$/', $nom));

  var_dump($nom);
  var_dump($nom_ok);
}

//Validation EMAIL
$courriel_ok = false;
if (array_key_exists('courriel', $_POST)) {
  $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_EMAIL);
  $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);

  $courriel_ok = (false !== $courriel);

  var_dump($courriel);
  var_dump($courriel_ok);
}

//Validation PSEUDO
$username_ok = false;
if (array_key_exists('username', $_POST)) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
  $username = filter_var($username, FILTER_SANITIZE_STRING);


  $username_ok = (1 === preg_match('/^[A-Za-z0-9%@&$?!*]{4,}$/', $username));

  var_dump($username);
  var_dump($username_ok);
}

//Validation PASSWORD
$password_ok = false;
if (array_key_exists('password', $_POST)) {
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
  $password = filter_var($password, FILTER_SANITIZE_STRING);


  $password_ok = (1 === preg_match('/^[A-Za-z0-9%&$?!*]{8,}$/', $password));

  var_dump($password);
  var_dump($password_ok);
}


if ($prenom_ok && $nom_ok && $courriel_ok && $username_ok && $password_ok) {
  // On enregistre les données et s'en vaa sur une autre page
  header("Location: _inscription_form_OK.php");
}

?>

<form name="inscription" action="inscription.php" method="post">
  <!--  <input type="hidden" name="action" value="website_contact_form" /><p>-->
  <input type="text" name="prenom"
         class="<?php echo $in_post && !$prenom_ok ? '' : 'error';?>"
         value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : '' ?>" placeholder="prénom" />
  <p><input type="text" name="nom" value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?>" placeholder="nom" />
  <p><input type="text" name="courriel" value="<?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel'] : '' ?>" placeholder="courriel" />
  <p><input type="text" name="username" value="<?php echo array_key_exists('username', $_POST) ? $_POST['username'] : '' ?>" placeholder="pseudo" />
  <p><input type="text" name="password" placeholder="mot de passe" />
  <p>Votre genre:
    <label for="sex">homme</label> <input type="radio" name="sex" checked="checked" title="homme">

    <label for="sex">femme</label><input type="radio" name="sex"></p>
  <p><input type="text" name="age" placeholder="votre age" /></p>
  <p><label for="orientation">Votre orientation sexuelle:</label> <select id="orientation" name="orientation">
      <option>Bisexuelle</option>
      <option>Hétérosexuel</option>
      <option>Homosexuel</option>
      <option>Confidentielle</option>
    </select></p>

  <p><label for="region">Votre region:</label> <select id="region" name="region">
      <option>Montreal</option>
      <option>Laval</option>
      <option>Cote Sud</option>
      <option>West Island</option>
      <option>Lachine</option>
      <option>Lasalle</option>

    </select></p>

  <p><input type="submit" name="register"  value="S'inscrire" />

</form>

