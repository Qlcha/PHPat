<?php
require_once  '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Index';
require_once 'view parts/_page_base.php';


?>
<div id="main"></div>

<?php


?>

  <div> <?= $site_data[PAGE_ID] ?></div>

<?php require_once 'view parts/_page_bottom.php'; ?>