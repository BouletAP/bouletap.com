<?php
    
    $connected = false;
    if( !$connected ) {
        header("Location: https://bouletap.com/login");
        die();
    }
?>

<title>Administration André-Philippe Boulet</title>  
</head>

<body class="home">
    <div class="header-container">        
        <?php include('templates/header.php'); ?>
    </div>
    <div class="page-content">     
       

        <div class="login-form">
            <form action="/" class="form-underlined" method="post" enctype="multipart/form-data">
                <div class="form-col2">
                    <?php echo $login_form->getField('courriel')->display(); ?>
                    <?php echo $login_form->getField('password')->display(); ?>
                    <button type="submit"><i class="lni lni-arrow-right"></i></span></button>
                </div>                    
                
            </form>
        </div>       


    </div>      


