<?php

use Models\Core\Router;

Router::add('/ajax', 'ajax.php');

Router::add('/', 'accueil.php');
Router::add('/accueil', 'accueil.php');


Router::add('/nouvelles', 'nouvelles-list.php');
Router::add('/nouvelles/*', 'nouvelles-details.php');


Router::add('/a-propos', 'a-propos.php');
Router::add('/contact', 'contact.php');

///// NOUVELLES PAGES
Router::add('/nouveau-site-web', 'creation-de-sites-web.php');
Router::add('/services', 'services.php');


Router::add('*', '404.php');


