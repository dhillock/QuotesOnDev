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
        <div class="home-page-quote">
            <q>
                <?php the_content(); ?> 
            </q>
        </div>

        <!-- Display the random quote title -->
        <p class="author">- <?php the_title(); ?></p>
        
    <?php endforeach;?>

    <!-- The random quote generator button -->
    <button id="quote-button">Show Me Another!</button>

</section>


  
</footer>

<!-- Footer -->
<?php get_footer();?>



