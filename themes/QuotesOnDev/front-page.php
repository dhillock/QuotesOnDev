<?php get_header(); ?>

<!-- Random quote loop -->
<section class="random-quote-home-page">

    <?php
        $args = array( 
            'post_type' => 'post', 
            'orderby' => 'rand',
            'numberposts' => 1
            );
        $quotes = get_posts( $args ); 
    ?>

    <?php foreach ( $quotes as $post ) : setup_postdata( $post ); ?>

        <!-- Display the random quote (the content) -->
        <div class="home-quote">
            <q>
                <?php the_content(); ?> 
            </q>
        </div>

    <div class="quote-section">

        <!-- add, If there is a source, add a ",&nbsp;" after the author name...otherwise, don't add it -->

        <span class="author">— <?php echo the_title() . ",&nbsp;"; ?></span>

        <div class="source">

            <a href="class="source-link" target="new" <?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>" > 
        
            <span><?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a></span>

        </div>

    </div>
        
    <?php endforeach;?>

    <!-- The random quote generator button -->
    <button id="quote-button">Show Me Another!</button>

</section>

 </footer>

<!-- Footer -->
<?php get_footer();?>
