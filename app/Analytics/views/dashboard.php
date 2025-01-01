<title>Statistiques du site - APB</title>  
<link rel="stylesheet" href="/medias/css/admin.css" />    
<link rel="stylesheet" href="/medias/css/analytics.css" />    

</head>

<body class="home admin-analytics">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="page-header">
                <span class="subtitle">Administration</span>
                <h1>Taleau de bord administrateur</h1>       
                
            </div>

        </section>


        <section class="dashboard-content">
            <div class="sidebar">
                <?php include(APP_PATH.'/Admin/views/_menu.php'); ?>

                <h3></h3>
            </div>
            <div class="analytics page-admin">
               
                <div class="controls">
                    <ul>
                        <li><a href="#">LIVE</a></li>
                        <li class="active"><a href="#">Today</a></li>
                        <li><a href="#">7 days</a></li>
                        <li><a href="#">4 weeks</a></li>
                    </ul>
                    <ul>
                        <li><a href="">refresh</a></li>
                    </ul>
                </div>

                <div class="charts">
                    <div class="chart">
                        <h3><i class="lni lni-user-4"></i> Visitors</h3>
                        <canvas id="visitors"></canvas>
                    </div>
                    <div class="chart">
                        <h3><i class="lni lni-www-cursor"></i> Page visits</h3>
                        <canvas id="pages-visited"></canvas>
                    </div>
                    <div class="chart">
                        <h3><i class="lni lni-laptop-phone"></i> Devices</h3>
                        <canvas id="devices"></canvas>
                    </div>
                    <div class="chart">
                        <h3><i class="lni lni-monitor-mac"></i> Resolutions</h3>
                        <canvas id="resolutions"></canvas>
                    </div>
                    <div class="chart">
                        <h3><i class="lni lni-globe-1"></i> Origin</h3>
                        <canvas id="origin"></canvas>
                    </div>
                </div>

                <div class="lists">

                    <div class="list">
                        <h3><i class="lni lni-users"></i> Top Pages</h3>
                        <table>
                            <tr>
                                <th>Slug</th>
                                <th>Views</th>
                                <th>Time</th>
                                <th>Bounce Rate</th>
                            </tr>
                            <?php if( !empty($data['top_pages']) ): ?>
                                <?php foreach($data['top_pages'] as $visit): ?>
                                    <?php //$visitor = $data['visitors'][$visit->visitor_id]; ?>
                                    <tr>
                                        <td><?php echo $visit->slug;?></td>
                                        <td><?php echo $visit->visited;?></td>
                                        <td><?php echo $visit->getAverageTime(); ?></td>
                                        <td><?php echo $visit->getBounceRate(); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>

                    <div class="list">
                        <h3><i class="lni lni-users"></i> Last visits</h3>
                        <table>
                            <tr>
                                <th>IP</th>
                                <th>Device</th>
                                <th>Browser</th>
                                <th>Resolution</th>
                                <th>Date</th>
                            </tr>
                            <?php if( !empty($data['last_visits']) ): ?>
                                <?php foreach($data['last_visits'] as $visit): ?>
                                    <?php $visitor = $data['visitors'][$visit->visitor_id]; ?>
                                    <tr>
                                        <td><?php echo $visitor->ip_address;?></td>
                                        <td><?php echo $visitor->getDevice();?></td>
                                        <td><?php echo $visitor->getBrowser();?></td>
                                        <td><?php echo $visitor->getResolution();?></td>
                                        <td><?php echo $visit->getDate();?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>

            </div>

        </section>
       

    </div>      


