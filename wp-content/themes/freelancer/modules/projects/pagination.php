<!-- Blog Pagination -->
<div class="post-pagination-section pagination-section-2">
    <div class="post-pagination">
        
    
        <?php //previous_posts_link( '<i class="fa fa-fast-backward"></i>' ); ?>
        
        <?php echo paginate_links(array(
            'prev_text'          => '<i class="fa fa-backward"></i>',
            'next_text'          => '<i class="fa fa-forward"></i>'
        )); ?>
        
        <div class="page-links hide">

            <?php /*for($i=1; $i<=$the_query->max_num_pages; $i++): ?>
                <span class="active">1</span>
                <?php if($i === 1): ?>       
                    <span class="active"><?php echo $i; ?></span>         
                <?php else: ?>
                            <a href="javascript:void(0);" data-page-num="2">2</a>
                <?php endif;?>
            <?php endfor; */ ?>

            <a href="javascript:void(0);" data-page-num="2">2</a>
            <a href="javascript:void(0);" data-page-num="3">3</a> 
        </div>

        <?php //next_posts_link( '<i class="fa fa-fast-forward"></i>', $the_query->max_num_pages ); ?>
        



    </div>
</div>