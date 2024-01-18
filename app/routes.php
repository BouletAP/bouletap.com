<?php

use Models\Core\Router;

Router::add('/ajax', 'ajax.php');

Router::add('/', 'accueil.php');
Router::add('/accueil', 'accueil.php');


Router::add('/nouvelles', 'nouvelles-list.php');
Router::add('/nouvelles/*', 'nouvelles-details.php');


Router::add('/a-propos/*', 'a-propos.php');
Router::add('/contact', 'contact.php');


Router::add('*', '404.php');


