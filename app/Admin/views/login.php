<title>Connexion - André-Philippe Boulet</title>  
<style>
    .login-form {
        width: 500px;
        margin: 30px auto;
    }
</style>
</head>

<body class="home">
    <div class="header-container">        
        <?php include(APP_PATH.'/Pages/views/_header.php'); ?>
    </div>
    <div class="page-content">     
       
        <section class="hero">

            <div class="page-header">
                <span class="subtitle">Un compte est requis</span>
                <h2>Connexion à votre compte utilisateur</h2>     
                <p>Merci de valider vos informations de compte avant de continuer vers la prochaine section</p>           
            </div>

        </section>

        <div class="login-form">
            <form action="/connexion" class="form-underlined" method="post" enctype="multipart/form-data">
                <div class="form-col2">
                    <?php echo $data['login_form']->getField('courriel')->display(); ?>
                    <?php echo $data['login_form']->getField('password')->display(); ?>
                    <button type="submit"><i class="lni lni-arrow-right"></i></span></button>
                </div>                    
                
            </form>
        </div>       


    </div>      


