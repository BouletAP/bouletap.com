<?php
    $categories = get_categories(array(
        'orderby' => 'count',
        'order'   => 'DESC',
        'type'    => 'projects',
        'taxonomy' => 'type',
        'suppress_filters' => false,
    ));
?>

<!-- Categories Section-->
<?php if( !empty($categories) ): ?>
    <div class="box">
        <h4>Categories</h4>
        <ul class="categories-list">
            <?php foreach( $categories as $category ): ?>
                <?php echo sprintf( '<li><a href="%s">%s<span>%s</span></a></li>',
                    get_category_link( $category->cat_ID ), $category->name, $category->category_count
                ); ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>