<!-- Top Navigation -->
<div class="main-navigation"> 
  <!-- Navigation -->
  <nav class="navbar navbar-default">
    <div class="container"> 
      <!-- Brand and Toggle Get Grouped for Better Mobile Display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
	
      <!-- Collect The Nav Links, Forms, and Other Content for Toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
        <?php 
          wp_nav_menu(array( 
            'theme_location' => 'menu-primary',
            'container' => 'ul',
            'menu_class' => 'nav navbar-nav'
          ));
        ?>
      </div>
    </div>
  </nav>
</div>