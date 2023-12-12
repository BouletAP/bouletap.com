<?php


Routes::add('/ajax', 'ajax.php');

Routes::add('/', 'accueil.php');
Routes::add('/accueil', 'accueil.php');

Routes::add('*', '404.php');


