<?php
    //$form = $data['publication_form'];
?>
<title>Listing <?php echo $data['page']; ?></title>  
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
                <h1>Liste de <?php echo $data['page']; ?> administrateur</h1>      
                
            </div>

        </section>


        <section class="dashboard-content">
            <div class="sidebar">
                <?php include(APP_PATH.'/Admin/views/_menu.php'); ?>

                <h3></h3>
            </div>
            <div class="page-admin">                
                <div>
                    <a href="/admin/<?php echo $data['page']; ?>/add" class="btn-add">Ajouter un <?php echo $data['page']; ?></a>
                    <table>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>actions</th>
                        </tr>
                        <?php if( !empty($data['items']) ): ?>
                            <?php foreach($data['items'] as $item): ?>
                                <tr>
                                    <td><?= $item->id ?></td>
                                    <td><?= $item->title ?></td>
                                    <td>
                                        <a href="/admin/<?php echo $data['page']; ?>/edit/<?= $item->id ?>">edit</a>
                                        <a href="/admin/<?php echo $data['page']; ?>/delete/<?= $item->id ?>">delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">Aucun item dans la liste</td>
                            </tr>
                        <?php endif; ?>

                    </table>


                </div>
            </div>


        </section>
       

    </div>      


