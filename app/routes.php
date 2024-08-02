<?php

use Models\Core\Router;

Router::add('/ajax', 'ajax.php');

Router::add('/', 'PagesController', 'accueil');
Router::add('/accueil', 'PagesController', 'accueil');



Router::add('/a-propos', 'PagesController', 'a_propos');
Router::add('/contact', 'PagesController', 'contact');
Router::add('/confidentialite', 'PagesController', 'privacy_policy');


Router::add('/nouveau-site-web', 'PagesController', 'coming_soon');
Router::add('/carre-de-sable-interactif', 'PagesController', 'coming_soon');



Router::add('/admin', 'AdminController', 'dashboard');
Router::add('/dashboard', 'AdminController', 'dashboard');

Router::add('/connexion', 'AuthController', 'login');
Router::add('/logout', 'AuthController', 'logout');


Router::add('/admin/publication-add', 'CMSController', 'add_publications');

Router::add('/admin/portfolio', 'CMSController', 'portfolio_list');
Router::add('/admin/portfolio/add', 'CMSController', 'portfolio_add');


Router::add('/publications', 'BlogController', 'nouvelles');
Router::add('/nouvelles', 'BlogController', 'nouvelles');
Router::add('/cheatsheets', 'BlogController', 'nouvelles');
Router::add('/trucs-et-astuces', 'BlogController', 'nouvelles');


Router::add('/nouvelle/nouvelle-place-d-affaires', 'BlogController', 'nouvelle');
Router::add('/nouvelle/creer-une-page-service-pour-mieux-convertir-vos-visiteurs-en-clients', 'BlogController', 'nouvelle');
Router::add('/nouvelle/covid-bureau-ferme', 'BlogController', 'nouvelle');


// Router::add('/services', 'services.php');
//Router::add('/nouveau-site-web', 'PagesController', 'nouveau_site');

Router::add('/services', 'PagesController', 'coming_soon');
Router::add('/services/creation-site-internet', 'ServicesController', 'creation_sites_internet');

Router::add('/services/performances', 'ServicesController', 'performances');
Router::add('/services/accessibilite', 'ServicesController', 'accessibilite');
Router::add('/services/seo', 'ServicesController', 'seo');
Router::add('/services/securite', 'ServicesController', 'securite');



Router::add('/portfolio', 'PortfolioController', 'projets');
Router::add('/portfolio/donald-royer-design', 'PortfolioController', 'donald_royer_design');
Router::add('/portfolio/eugene-laplante', 'PortfolioController', 'donald_royer_design');
Router::add('/portfolio/le-gaboteur', 'PortfolioController', 'donald_royer_design');


//Router::add('/autologin', 'AdminController', 'autologin');


Router::add('/admin/portfolio/edit/{INT}', 'CMSController', 'portfolio_edit');
Router::add('/admin/portfolio/delete/{INT}', 'CMSController', 'portfolio_delete');



Router::add('*', 'PagesController', 'not_found');


