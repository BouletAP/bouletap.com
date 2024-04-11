<title>Administration André-Philippe Boulet</title>  
</head>

<body class="home">
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

            <div class="col">
                <h2>Formulaires</h2>

                <?php if( !empty($data['entries']) ): ?>
                    <ul>
                    <?php foreach($data['entries'] as $entry): ?>
                        <li><a href="#?id=<?php $entry['id']; ?>">
                        <?php
                            echo $entry['data'];
                        ?>
                        </a></li>
                    <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    Aucune entrée récente
                <?php endif; ?>
            </div>

            <div class="col">
                <h2>Récents utilisateur</h2>
            </div>

            <div class="col">
                <h2>Pages visitées</h2>
            </div>


        </section>
       



    </div>      


