<title>Administration André-Philippe Boulet</title>
<link rel="stylesheet" href="/medias/css/admin.css" />         
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
            <div class="sidebar">
                <?php include(APP_PATH.'/Admin/views/_menu.php'); ?>
            </div>
            <div class="page-admin dashboard-col">
                <div class="col">
                    
                    <div class="message-bloc">
                        <h2>Messages</h2>

                        <h3>Demandes d'audit</h3>
                        <table>
                            <tr>
                                <th>couriel</th>
                                <th>site web</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach($data['messages_audit'] as $id => $message): ?>
                                <tr>
                                    <td><?php echo $message['courriel'] ?></td>
                                    <td><?php echo $message['website'] ?></td>
                                    <td><a href="/admin/flag_read/<?php echo $id ?>">Lu</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    
                    
                    <div class="message-bloc">
                        <h3>Message de contact</h3>
                        <table>
                            <tr>
                                <th>Courriel</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach($data['messages_contact'] as $id => $message): ?>
                                <tr>
                                    <td><?= $message['email'] ?></td>
                                    <td>
                                        <strong><?php echo $message['subject'] ?></strong><br>
                                        <?php echo $message['message'] ?>
                                    </td>
                                    <td><a href="/admin/flag_read/<?php echo $id ?>">Lu</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        
                    </div>
                    
                </div>

            </div>          


        </section>
       
        <section>
            <div class="dashboard-col">
                <div class="col">
                    <h2>Dernières visites</h2>
                    <?php if( !empty($data['visitors']) ): ?>
                        <ul>
                        <?php foreach($data['visitors'] as $visitor): ?>
                            <li><a href="#?id=<?php $visitor['id']; ?>">
                                <?php echo $visitor['ip_address']; ?> &ndash; <?php echo $visitor['user_agent']; ?>
                            </a></li>
                        <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        Aucune visite récente
                    <?php endif; ?>
                </div>
            </div>
        </section>


    </div>      


