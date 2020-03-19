<?php get_header(); ?>

<div class="selected-category-page">

    <h1 class="selected-category-title">Category: <?php $category = get_the_category(); echo $category[0]->cat_name;?> </h1>

    <?php
        $args = array( 
            'post_type' => 'post', 
            'category_name' => get_the_category(),
            'orderby' => 'title',
            'order' => 'ASC',
            'numberposts' => -1,
            'posts_per_page' => 5
            );
        $quotes = get_posts( $args ); 
    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

        <div class="category-quote">
            <?php the_content(); ?> 
        </div>


        <!-- If there is a source, put a comma and a space after the author's name -->
        <?php $quotesource = trim( get_post_meta( get_the_ID(), '_qod_quote_source', true ) ); ?>
        <?php  if( ! empty( $quotesource ) ){ ?>

            <span class="category-author"> &mdash; <?php echo the_title() . ", "; ?></span>

                <a href ="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>">
                    <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>
                </a>

        <?php } else { ?>

            <p class="category-author"> &mdash;
                <?php echo the_title(); ?>
            </p>

        <?php } ?>

        <hr class = 'line-bottom'>

    <?php endforeach;?>

       <?php qod_numbered_pagination()?> 
    
</div>

<?php get_footer();?>
