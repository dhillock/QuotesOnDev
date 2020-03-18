<?php get_header(); ?>

<div class="selected-tag-page">

   <h1 class="selected-tag-title">Tag: <?php echo single_term_title( '', false ) ;?> </h1>

    <?php

        $args = array(
            'orderby' => 'title',
            'order' => 'ASC', 
            'hide_empty' => 1,
            'numberposts' => -1,
            'posts_per_page' => 5
            // 'number' => 5
        ); 
            
        $quotes = get_posts( $args ); 
    ?> 

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

        <div class="tag-quote">
            <?php the_content(); ?> 
        </div>


        <!-- If there is a source, put a comma and a space after the author's name -->
        <?php $quotesource = trim( get_post_meta( get_the_ID(), '_qod_quote_source', true ) ); ?>
        <?php  if( ! empty( $quotesource ) ){ ?>

            <span class="tag-author"> &mdash; <?php echo the_title() . ", "; ?></span>

                <a href ="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>">
                    <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>
                </a>

        <?php } else { ?>

            <p class="tag-author"> &mdash;
                <?php echo the_title(); ?>
            </p>

        <?php } ?>

    <hr class = 'line-bottom'>

    <?php endforeach;?>

        <?php qod_numbered_pagination()?> 

</div>

<?php get_footer();?>
