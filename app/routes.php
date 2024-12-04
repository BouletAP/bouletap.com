<?php

use Models\Core\Router;

// New model:
// Case 1: Router::add("path/to/url", 'Namespace/Controller/Method');
// Case 2: Router::add("path/to/url/{Arg1}/{Arg2}", 'Folder/Controller/method');

// EX: Router::add("/", '/ajax', 'ajax.php');
// EX: Router::add("/admin/", 'Blog/add', 'ajax.php');
// EX: Router::add("/", '/ajax', 'ajax.php');


Router::add('/ajax', 'ajax.php');
Router::add('/ajax/get-phone-number', 'PagesController', 'ajax_get_phone_number');


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
Router::add('/admin/articles/edit/{ARGS}', 'BlogAdminController', 'edit');
Router::add('/admin/articles/delete/{ARGS}', 'BlogAdminController', 'delete');

Router::add('/nouvelles', 'BlogController', 'nouvelles');
Router::add('/nouvelles/{ARGS}/{ARGS}', 'BlogController', 'nouvelles');

Router::add('/nouvelle/{ARGS}', 'BlogController', 'nouvelle');
// --------------------------- //




Router::add('/services', 'PagesController', 'services');
Router::add('/services/creation-site-internet', 'ServicesController', 'creation_sites_internet');

Router::add('/services/performances', 'ServicesController', 'performances');
Router::add('/services/accessibilite', 'ServicesController', 'accessibilite');
Router::add('/services/seo', 'ServicesController', 'seo');
Router::add('/services/securite', 'ServicesController', 'securite');



Router::add('/portfolio', 'PortfolioController', 'projets');
Router::add('/portfolio/{ARGS}', 'PortfolioController', 'projets');
Router::add('/portfolio/{ARGS}/{ARGS}', 'PortfolioController', 'projets');

Router::add('/projet/{ARGS}', 'PortfolioController', 'details_projet');


Router::add('/admin/portfolio', 'ProjectAdminController', 'list');
Router::add('/admin/portfolio/trash', 'ProjectAdminController', 'show_trash');
Router::add('/admin/portfolio/add', 'ProjectAdminController', 'add');
Router::add('/admin/portfolio/edit/{ARGS}', 'ProjectAdminController', 'edit');
Router::add('/admin/portfolio/delete/{ARGS}', 'ProjectAdminController', 'delete');
Router::add('/admin/portfolio/restore/{ARGS}', 'ProjectAdminController', 'restore');

//Router::add('/admin/portfolio/mergerino', 'ProjectAdminController', 'merge_old_project');
//Router::add('/admin/portfolio/mergerino', 'ProjectAdminController', 'fix_old_info');


Router::add('/admin/flag_read/{ARGS}', 'AdminController', 'flag_read');

Router::add('/admin/timesheet', 'TimeSheetController', 'index');
Router::add('/admin/timesheet/details', 'TimeSheetController', 'details');
Router::add('/admin/timesheet/upload', 'TimeSheetController', 'upload');
Router::add('/admin/timesheet/delete/{ARGS}', 'TimeSheetController', 'delete');


Router::add('/admin/analytics', 'AnalyticsController', 'dashboard');
Router::add('/ajax/save-appdata', 'AnalyticsController', 'ajax_save_appdata');

Router::add('*', 'PagesController', 'not_found');


