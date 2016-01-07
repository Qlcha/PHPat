<?php
var_dump($_POST);
$in_post = array_key_exists('register', $_POST);

//Validation PRENOM
$prenom_ok = false;
$prenom_msg = '';
if (array_key_exists('prenom', $_POST)) {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_MAGIC_QUOTES);
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);


    $prenom_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $prenom));
    if (!$prenom_ok) {

        $prenom_msg = 'Le prénom ne doit contenir que des lettres (min 2).';

    }
    var_dump($prenom);
    var_dump($prenom_ok);
}

//Validation NOM
$nom_ok = false;
$nom_msg = '';
if (array_key_exists('nom', $_POST)) {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_MAGIC_QUOTES);
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);


    $nom_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $nom));
    if (!$nom_ok) {

        $nom_msg = 'Le nom ne doit contenir que des lettres (min 2).';
    }
    var_dump($nom);
    var_dump($nom_ok);
}

//Validation EMAIL
$courriel_ok = false;
$courriel_msg = '';
if (array_key_exists('courriel', $_POST)) {
    $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_EMAIL);
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);

    $courriel_ok = (false !== $courriel);
    if (!$courriel_ok) {
        $courriel_msg = 'Courriel doit contenir un @ et se terminer pour un herbergeur de courriel valide.';
    }
    var_dump($courriel);
    var_dump($courriel_ok);
}

//Validation PSEUDO
$username_ok = false;
$username_msg = '';
if (array_key_exists('username', $_POST)) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
    $username = filter_var($username, FILTER_SANITIZE_STRING);

    $username_ok = (1 === preg_match('/^[A-Za-z0-9]{2,}$/', $username));

    if (!$username_ok) {
        $username_msg = 'Le nom ne doit contenir que des caractères alphabétiques et numériques (min 4)';
    }
    var_dump($username);
    var_dump($username_ok);
}

//Validation AGE
$age_ok = false;
$age_msg = '';
if (array_key_exists('age', $_POST)) {
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_MAGIC_QUOTES);
    $age = filter_var($age, FILTER_SANITIZE_STRING);


    $age_ok = (1 === preg_match('/^[0-9]{2,3}$/', $age));
    if (!$age_ok) {
        $age_msg = 'L\'age ne doit contenir que nombres (min 2, max 3)';
    }
    var_dump($age);
    var_dump($age_ok);
}

//Validation PASSWORD
$password_ok = false;
$password_msg = '';
if (array_key_exists('password', $_POST)) {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
    $password = filter_var($password, FILTER_SANITIZE_STRING);


    $password_ok = (1 === preg_match('/^[A-Za-z0-9]{4,}$/', $password));
    if (!$password_ok) {
        $password_msg = 'Le mot de passe ne doit contenir que des caractères alphabétiques et numériques (min 4)';
    }
    var_dump($password);
    var_dump($password_ok);

}



//Formulaire est valide
if ($prenom_ok && $nom_ok && $courriel_ok && $username_ok && $password_ok && $age_ok) {
    // On enregistre les données et s'en vaa sur une autre page
   /* header("Location: index.php");*/
 header("Location: _inscription_form_OK.php");
}

?>

<form name="inscription" action="inscription.php" method="post">

    <p style="color: red">* Les champs obligatoires</p>

    <label for="prenom">* Prénom</label>
    <input type="text" name="prenom"
           class="     <?php echo $in_post && !$prenom_ok ? 'error' : ''; ?>"
           value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : '' ?>" placeholder="prénom"/>
    <h6 class="msg_error"><?php echo $prenom_msg ?></h6>


    <p><label for="nom">* Nom</label>
        <input type="text" name="nom"
               class="     <?php echo $in_post && !$nom_ok ? 'error' : ''; ?>"
               value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : '' ?>" placeholder="nom"/>
    <h6 class="msg_error"><?php echo $nom_msg ?></h6>


    <p><label for="courriel">* Email</label>
        <input type="text" name="courriel"
               class="     <?php echo $in_post && !$courriel_ok ? 'error' : ''; ?>"
               value="<?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel'] : '' ?>"
               placeholder="courriel"/>
    <h6 class="msg_error"><?php echo $courriel_msg ?></h6>


    <p><label for="username">* Pseudo</label>
        <input type="text" name="username"
               class="     <?php echo $in_post && !$username_ok ? 'error' : ''; ?>"
               value="<?php echo array_key_exists('username', $_POST) ? $_POST['username'] : '' ?>"
               placeholder="pseudo"/>
    <h6 class="msg_error"><?php echo $username_msg ?></h6>


    <p><label for="age">* Age</label>
        <input type="text" name="age"
               class="     <?php echo $in_post && !$age_ok ? 'error' : ''; ?>"
               value="<?php echo array_key_exists('age', $_POST) ? $_POST['age'] : '' ?>" placeholder="votre age"/></p>
    <h6 class="msg_error"><?php echo $age_msg ?></h6>


    <p><label for="password">* Mot de passe</label>
        <input type="text" name="password"
               class="<?php echo $in_post && !$password_ok ? 'error' : ''; ?>"
               value="<?php echo array_key_exists('password', $_POST) ? $_POST['password'] : '' ?>"
               placeholder="mot de passe"/>
    <h6 class="msg_error"><?php echo $password_msg ?></h6>

    <p style="color: red"> Renseignements supplémentaires:
    </p>


    <p>
         * Votre genre:
        <label for="sex">homme</label>
        <input type="radio" name="sex" value="homme">
        <label for="sex">femme</label>
        <input type="radio" name="sex" value="femme">





    <p>Votre temps libre:
        <label for="temps_libre">jour</label> <input type="radio" name="temps_libre" value="jour">
        <label for="temps_libre">soir</label><input type="radio" name="temps_libre" value="soir">
        <label for="temps_libre">nuit</label><input type="radio" name="temps_libre" value="nuit"></p>

    <p><label for="orientation">Votre orientation sexuelle:</label> <select id="orientation" 0 name="orientation">
            <option value="orientation non_selectionee">Non sélectionée</option>
            <option value="bi">Bisexuelle</option>
            <option value="hetero">Hétérosexuel</option>
            <option value="homo">Homosexuel</option>
            <option value="confi">Confidentielle</option>
        </select></p>

    <p><label for="region">Votre region:</label> <select id="region" name="region">
            <option value="region_non_selectionee">Non sélectionée</option>
            <option value="montreal">Montreal</option>
            <option value="laval">Laval</option>
            <option value="sud">Cote Sud</option>
            <option value="west">West Island</option>
            <option value="lachine">Lachine</option>
            <option value="lasalle">Lasalle</option>
        </select>

    <p><label for="buts">Vos buts sur le reseau:</label> <select id="buts" name="buts">
            <option value="aucun_buts_selectiones">Non sélectionée</option>
            <option value="amour">Amour</option>
            <option value="rencontre">Rencontre</option>
            <option value="sex">Sex</option>
            <option value="ami">Amitié</option>
            <option value="sans_but">Sans but précis</option>
        </select></p>

    <label for="resume">Votre resumé / intérets (~20 mots):</label>
    <p><textarea maxlength="100" rows="3" class="form-control" id="message" placeholder="Entrez votre message"></textarea></p>

       <p><input type="submit" name="register" value="S'inscrire"/>

</form>

