<?php



require_once __DIR__ . '/configs.php';
require_once __DIR__ . '/../vendor/autoload.php';


require_once __DIR__ . '/models/core/database.php';
require_once __DIR__ . '/models/core/router.php';
require_once __DIR__ . '/models/core/auth.php';
require_once __DIR__ . '/models/core/view.php';


require_once __DIR__ . '/models/entities/visitor.php';
require_once __DIR__ . '/models/entities/visit.php';
require_once __DIR__ . '/models/entities/page.php';
require_once __DIR__ . '/models/entities/entry.php';
// require_once __DIR__ . '/models/entities/service_offert.php';
require_once __DIR__ . '/models/entities/article.php';


require_once __DIR__ . '/models/services/analytics.php';

require_once __DIR__ . '/models/forms/audit_seo.php';
require_once __DIR__ . '/models/forms/login.php';

require_once __DIR__ . '/routes.php';


require_once __DIR__ . '/Pages/PagesController.php';
require_once __DIR__ . '/Blog/BlogController.php';
require_once __DIR__ . '/Services/ServicesController.php';

require_once __DIR__ . '/Admin/AdminController.php';
require_once __DIR__ . '/Admin/AuthController.php';
require_once __DIR__ . '/Admin/CMSController.php';

// autoload soon?
//
//
//
//
//



session_start();    

