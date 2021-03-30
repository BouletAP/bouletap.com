<!-- Portfolio Section -->
<section id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-md-12 section-heading text-center">
        <h2>Projets récents</h2>
      </div>
      <div class="col-md-12 text-center">
        <p>Cliquez sur l'icône d'un projet pour en apprendre davantage. Chaque projet est unique alors il nous fait toujours plaisir de discuter de sa vision et des innovations mises en place pour la réaliser.</p>
      </div>
    </div>
  </div>
  <div class="portfolio-main wow fadeInUp">
    <div class="row">
      <div class="work-filter">
        <ul class="text-center">
          <li><a href="javascript:;" data-filter="all" class="active filter"><span>All</span></a></li>
          <li><a href="javascript:;" data-filter=".website-wordpress" class="filter"><span>Site Internet - Wordpress</span></a></li>
          <li><a href="javascript:;" data-filter=".others" class="filter"><span>Others</span></a></li>
        </ul>
      </div>
    </div>
    <div class="project-wrapper" id="project-wrapper">
      <div class="mix work-item website-wordpress">
        <figure class="effect-zoe">
          <img src="<?php echo wp_get_attachment_url(257); ?>" alt="">
          <figcaption>
            <div class="project-title">
              <div class="project-title-h4"><a data-toggle="modal" data-target="#myModal">Avocats - Boulet Desrosiers Lagüe</a></div>
              <p>Site Internet - Wordpress</p>
            </div>
            <p class="icon-links project-view"><a data-toggle="modal" data-target="#myModal"><i class="fa fa-eye has-circle"></i></a></p>
          </figcaption>
        </figure>
      </div>
      <div class="mix work-item website-wordpress">
        <figure class="effect-zoe">
          <img src="<?php echo wp_get_attachment_url(256); ?>" alt="">
          <figcaption>
            <div class="project-title">
              <div class="project-title-h4"><a data-toggle="modal" data-target="#myModal">Vision carrière</a></div>
              <p>Site Internet - Wordpress</p>
            </div>
            <p class="icon-links project-view"><a data-toggle="modal" data-target="#myModal"><i class="fa fa-eye has-circle"></i></a></p>
          </figcaption>
        </figure>
      </div>
      <div class="mix work-item website-wordpress">
        <figure class="effect-zoe">
          <img src="<?php echo wp_get_attachment_url(270); ?>" alt="">
          <figcaption>
            <div class="project-title">
              <div class="project-title-h4"><a data-toggle="modal" data-target="#myModal">Social Success</a></div>
              <p>Site Internet - Wordpress</p>
            </div>
            <p class="icon-links project-view"><a data-toggle="modal" data-target="#myModal"><i class="fa fa-eye has-circle"></i></a></p>
          </figcaption>
        </figure>
      </div>
      
      <div class="mix work-item website-wordpress">
        <figure class="effect-zoe">
          <img src="<?php echo wp_get_attachment_url(254); ?>" alt="">
          <figcaption>
            <div class="project-title">
              <div class="project-title-h4"><a data-toggle="modal" data-target="#myModal">École Love Energetics</a></div>
              <p>Site Internet - Wordpress</p>
            </div>
            <p class="icon-links project-view"><a data-toggle="modal" data-target="#myModal"><i class="fa fa-eye has-circle"></i></a></p>
          </figcaption>
        </figure>
      </div>
    </div>
    <!-- Modal For Portfolio Item 1 -->
    <div class="modal fade" id="Modal-1" tabindex="-1" role="dialog" aria-labelledby="Modal-label-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="Modal-label-1">Dean & Letter</h4>
          </div>
          <div class="modal-body">
            <img src="<?php echo get_template_directory_uri() . '/medias/images/works/item-1.jpg' ?>" alt="">
            <div class="modal-works"><span>Branding</span><span>Web Design</span></div>
            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>