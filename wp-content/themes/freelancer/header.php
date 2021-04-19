<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo site_url() . '/favicon.png' ?>">
  <?php wp_head(); ?>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if gte IE 9]><link rel="stylesheet" type="text/css" href="css/ie9.css" /><![endif]-->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body id="page-top" <?php body_class(); ?> >
  <div id="wrapper" class="wrapper-main">
  
    <?php get_template_part('sections/header-part'); ?>