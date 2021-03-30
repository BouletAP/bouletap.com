<?php
    $categories = wp_get_object_terms(get_the_ID(), 'type', array(
        'orderby' => 'count',
        'order'   => 'DESC',
        'suppress_filters' => false,
    ));
?>

<!-- Categories Section-->
<?php if( !empty($categories) ): ?>
    <div class="box">
        <h4>Categories</h4>
        <ul class="categories-list">
            <?php foreach( $categories as $category ): ?>
                <?php echo sprintf( '<li><a href="%1$s">%2$s<span><i class="fa fa-check" aria-hidden="true"></i></span></a></li>',
                    get_category_link( $category->term_taxonomy_id ), $category->name, $category->count
                ); ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>