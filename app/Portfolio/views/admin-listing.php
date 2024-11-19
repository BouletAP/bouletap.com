<?php
    //$form = $data['publication_form'];
?>
<title>Listing <?php echo $data['page']; ?></title>  
<link rel="stylesheet" href="/medias/css/admin.css" />    
<link rel="stylesheet" href="/medias/css/project-admin.css" />    
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
                    <p><a href="/admin/<?php echo $data['page']; ?>/mergerino">MERGE OLD PROJECTS</a></p>
                    <table>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>actions</th>
                        </tr>
                        <?php if( !empty($data['items']) ): ?>
                            <?php foreach($data['items'] as $item): ?>
                                <tr class="<?php echo $item->private === 1 ? 'private' : '' ?> <?php echo empty($item->langue) ? 'nolang' : '' ?>">
                                    <td><?= $item->id ?></td>
                                    <td><?= $item->title ?></td>
                                    <td>
                                        <?php if(!$data['show_trash']): ?>
                                            <a href="/admin/<?php echo $data['page']; ?>/edit/<?= $item->id ?>">edit</a>
                                            <a href="/admin/<?php echo $data['page']; ?>/delete/<?= $item->id ?>">trash</a>
                                            <?php else: ?> 
                                                <a href="/admin/<?php echo $data['page']; ?>/restore/<?= $item->id ?>">restore</a>
                                                <a href="/admin/<?php echo $data['page']; ?>/delete/<?= $item->id ?>">delete</a>
                                            <?php endif; ?> 
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">Aucun item dans la liste</td>
                            </tr>
                        <?php endif; ?>

                    </table>

                    <?php if(!$data['show_trash']): ?>
                        <p style="font-size:0.8em;margin-top:20px;"><a href="/admin/<?php echo $data['page']; ?>/trash"><i class="lni lni-trash-can"></i> trashed</a></p>
                    <?php else: ?>
                        <p style="font-size:0.8em;margin-top:20px;"><a href="/admin/portfolio">back to portfolo</a></p>
                    <?php endif; ?> 
                </div>
            </div>


        </section>
       

    </div>      


