<?php


Routes::add('/ajax', 'ajax.php');

Routes::add('/', 'accueil.php');
Routes::add('/accueil', 'accueil.php');


Routes::add('/nouvelles', 'nouvelles-list.php');
Routes::add('/nouvelles/*', 'nouvelles-details.php');


Routes::add('/a-propos/*', 'a-propos.php');
Routes::add('/contact', 'contact.php');


Routes::add('*', '404.php');


