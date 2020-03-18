
<?php get_header(); ?>

<!-- This is the template that is executed for the search results. -->


<div class="search-results">

    <?php
        $args = array( 
            'post_type' => 'post', 
            'orderby' => 'title',
            'order' => 'ASC',
            'numberposts' => 10
            );
        $quotes = get_posts( $args ); 
    ?>

    <h1>Search Results for: <?php echo esc_html( get_search_query( false ) ); ?></h1><hr class="dotted-line">

    <?php if( have_posts() )  
        while( have_posts() ) : the_post(); ?>

            <div class = 'the-author'>
                <a  href="<?php the_permalink() ?>"><?php the_title();?></a>
            </div

            <p><?php the_content() ?></p>

            
        <?php endwhile;?>

   <!-- <?php the_posts_pagination(array (
        'prev_text' => __( 'Prev' ),
        'next_text' => __( 'Next' ),  
        'screen_reader_text' => __('  ')
    ));?> -->

</div>

<?php get_footer();?>
