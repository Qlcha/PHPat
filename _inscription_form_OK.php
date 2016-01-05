<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Formulaire OK';
require_once 'view parts/_page_base.php';


?>
    <div id="main">La formulaire est valide, merci !</div>
<?php

?>

<?= $site_data[PAGE_ID] ?>
<?php require_once 'view parts/_page_bottom.php'; ?>