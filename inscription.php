<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Inscription';
require_once 'view parts/_page_base.php';

?>
<?= $site_data[PAGE_ID] ?>

<div id="main"></div>
<?php require_once 'view parts/_inscription_form.php' ?>



<?php require_once 'view parts/_page_bottom.php'; ?>
