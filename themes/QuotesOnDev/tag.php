<?php get_header(); ?>

<div class="selected-tag-page">

    <h1 class="selected-tag-title">Tag: <?php echo single_term_title( '', false ) ;?> </h1>

    <hr class = 'line-top'>

    <?php

        $args = array( 
            'post_type' => 'post', 
            'tag' => single_term_title( '', false ),
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => 4
            );


        $args = array(
            'orderby' => 'slug',
            'order' => 'ASC', 
            'hide_empty' => 1,
            'number' => 999
        ); 

            
        $quotes = get_posts( $args ); 
    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

        <div class="tag-quote">
            <?php the_content(); ?> 
        </div>

        <span class="tag-author"> - <?php the_title(); ?></span>
        <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>

        <hr class = 'line-bottom'>

    <?php endforeach;?>

    <div class="selected-tag-navigation">

        <?php the_posts_pagination(array (
            'prev_text' => __( 'Prev' ),
            'next_text' => __( 'Next' ),  
            'screen_reader_text' => __('  ')
        ));?>

    </div>

</div>

<?php get_footer();?>



