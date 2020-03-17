<?php get_header(); ?>

<div class="selected-category-page">

    <h1 class="selected-category-title">Category: <?php $category = get_the_category(); echo $category[0]->cat_name;?> </h1>

    <!-- <hr class = 'line-top'> -->

    <?php
        $args = array( 
            'post_type' => 'post', 
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
            );
        $quotes = get_posts( $args ); 

    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

    <div class="category-quote">
        <?php the_content(); ?> 
    </div>

    <span class="category-author"> &mdash; <?php echo the_title() . ", "; ?></span>


<!-- <php

 we can use this to display or not display the , after the author's name

 echo get_post_meta( get_the_ID(), '_qod_quote_source', true );

?> -->


    <a href ="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>">
        <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>
    </a>


    <hr class = 'line-bottom'>

    <?php endforeach;?>

    <div class="selected-category-navigation">

        <?php the_posts_pagination(array (
            'prev_text' => __( 'Prev' ),
            'next_text' => __( 'Next' ),  
            'screen_reader_text' => __('  ')
        ));?>

    </div>

</div>

<?php get_footer();?>
