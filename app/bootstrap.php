<?php


require_once __DIR__ . '/configs.php';
require_once __DIR__ . '/../vendor/autoload.php';


require_once __DIR__ . '/models/core/database.php';
require_once __DIR__ . '/models/core/router.php';


require_once __DIR__ . '/models/entities/visitor.php';
require_once __DIR__ . '/models/entities/visit.php';
require_once __DIR__ . '/models/entities/entry.php';
// require_once __DIR__ . '/models/entities/service_offert.php';
// require_once __DIR__ . '/models/entities/article.php';


require_once __DIR__ . '/models/services/analytics.php';


require_once __DIR__ . '/models/forms/audit_seo.php';


require_once __DIR__ . '/routes.php';

