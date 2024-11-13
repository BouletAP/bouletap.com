<?php

use Models\Core\Router;

Router::add('/ajax', 'ajax.php');

Router::add('/', 'PagesController', 'accueil');
Router::add('/accueil', 'PagesController', 'accueil');



Router::add('/a-propos', 'PagesController', 'a_propos');
Router::add('/contact', 'PagesController', 'contact');
Router::add('/credits', 'PagesController', 'credits');
Router::add('/confidentialite', 'PagesController', 'privacy_policy');


Router::add('/nouveau-site-web', 'PagesController', 'coming_soon');
Router::add('/carre-de-sable-interactif', 'SandboxController', 'index');



Router::add('/admin', 'AdminController', 'dashboard');
Router::add('/admin/dashboard', 'AdminController', 'dashboard');
Router::add('/admin/backup', 'AdminController', 'full_backup');

Router::add('/connexion', 'AuthController', 'login');
Router::add('/logout', 'AuthController', 'logout');



// --------------------------- //
Router::add('/admin/articles', 'BlogAdminController', 'list');
Router::add('/admin/articles/add', 'BlogAdminController', 'add');
Router::add('/admin/articles/edit/{INT}', 'BlogAdminController', 'edit');
Router::add('/admin/articles/delete/{INT}', 'BlogAdminController', 'delete');

Router::add('/nouvelles', 'BlogController', 'nouvelles');

Router::add('/nouvelle/{SLUG}', 'BlogController', 'nouvelle');
// --------------------------- //




Router::add('/services', 'PagesController', 'services');
Router::add('/services/creation-site-internet', 'ServicesController', 'creation_sites_internet');

Router::add('/services/performances', 'ServicesController', 'performances');
Router::add('/services/accessibilite', 'ServicesController', 'accessibilite');
Router::add('/services/seo', 'ServicesController', 'seo');
Router::add('/services/securite', 'ServicesController', 'securite');



Router::add('/portfolio', 'PortfolioController', 'projets');
Router::add('/projet/{SLUG}', 'PortfolioController', 'details_projet');


Router::add('/admin/portfolio', 'ProjectAdminController', 'list');
Router::add('/admin/portfolio/add', 'ProjectAdminController', 'add');
Router::add('/admin/portfolio/edit/{INT}', 'ProjectAdminController', 'edit');
Router::add('/admin/portfolio/delete/{INT}', 'ProjectAdminController', 'delete');
Router::add('/admin/portfolio/restore/{INT}', 'ProjectAdminController', 'restore');

//Router::add('/admin/portfolio/mergerino', 'ProjectAdminController', 'merge_old_project');
//Router::add('/admin/portfolio/mergerino', 'ProjectAdminController', 'fix_old_info');


Router::add('/admin/flag_read/{INT}', 'AdminController', 'flag_read');

Router::add('/admin/timesheet', 'TimeSheetController', 'index');
Router::add('/admin/timesheet/details', 'TimeSheetController', 'details');


Router::add('*', 'PagesController', 'not_found');


