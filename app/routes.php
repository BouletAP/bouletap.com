<?php

use Models\Core\Router;

Router::add('/ajax', 'ajax.php');

Router::add('/', 'PagesController', 'accueil');
Router::add('/accueil', 'PagesController', 'accueil');



Router::add('/a-propos', 'PagesController', 'a_propos');
Router::add('/contact', 'PagesController', 'contact');





Router::add('/nouveau-site-web', 'PagesController', 'coming_soon');
Router::add('/services', 'PagesController', 'coming_soon');
Router::add('/portfolio', 'PagesController', 'coming_soon');
Router::add('/carre-de-sable-interactif', 'PagesController', 'coming_soon');
Router::add('/services/creation-site-internet', 'PagesController', 'coming_soon');


Router::add('/admin', 'AdminController', 'dashboard');
Router::add('/dashboard', 'AdminController', 'dashboard');
Router::add('/connexion', 'AdminController', 'login');
Router::add('/logout', 'AdminController', 'logout');


Router::add('/portfolio', 'BlogController', 'projets');
//Router::add('/portfolio', 'BlogController', 'index');
Router::add('/nouvelles', 'BlogController', 'nouvelles');


// Router::add('/services', 'services.php');
//Router::add('/nouveau-site-web', 'PagesController', 'nouveau_site');



Router::add('/portfolio/donald-royer-design', 'BlogController', 'donald');


//Router::add('/autologin', 'AdminController', 'autologin');

Router::add('*', 'PagesController', 'not_found');


