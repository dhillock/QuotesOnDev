<?php get_header(); ?>

<section class = 'selected-author-page'>

<?php if( have_posts() ) :
//The WordPress Loop: loads post content 
    while( have_posts() ) :
        the_post(); ?>
    



    
    
    
    
    
    
    
    
    
    <div class="author-quote">
        <?php the_content(); ?> 
    </div>

    <span class="author-author">- <?php echo the_title() . ", "; ?></span>

    <!-- <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?> -->
    <!-- <?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?> -->

    <a href ="<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>">
        <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>
    </a>





    <!-- Loop ends -->
    <?php endwhile;?>

    <?php the_posts_navigation();?>

<?php else : ?>
        <p>No posts found</p>
<?php endif;?>

    
    <!-- The random quote generator button -->
    <button id="quote-button">Show Me Another!</button>

</section>

<?php get_footer();?>