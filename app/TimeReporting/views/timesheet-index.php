<title><?php echo $data['p']; ?> - Rapport de temps - André-P. Boulet</title>  
<link rel="stylesheet" href="/medias/css/admin.css" />    
<link rel="stylesheet" href="/medias/css/timereport.css" />    
<link rel="stylesheet" media="print"  href="/medias/css/report-print.css" />    
</head>

<body class="home">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="page-header">
                <span class="subtitle">Administration</span>
                <h1>Rapport de temps</h1>       
                
            </div>

        </section>


        <section class="dashboard-content">
            <div class="sidebar">
                <?php include(APP_PATH.'/Admin/views/_menu.php'); ?>
            </div>
            <div class="module-timesheet timesheet-index page-admin">                
                <?php include(__DIR__.'/_commands.php'); ?>

                <?php if($data['report']): ?>
                    <div class="report">
                        <?php include(__DIR__.'/_report.php'); ?>
                    </div>
                <?php endif; ?>
            </div>


        </section>
       

    </div>      


