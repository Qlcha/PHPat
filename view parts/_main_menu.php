<?php
$menu_data = array(
  'Accueil' => 'index.php',
    'Contact' => 'contact.php',
    'Dashboard' => 'dashboard.php',
    'Inscription' => 'inscription.php',
);

foreach($menu_data as $menu => $lien){

 echo "
<div id='main_menu'>
<ul>
<li><a href=\"$lien\"> $menu </a></li>
</ul>
</div>";
  };