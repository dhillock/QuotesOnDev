
<?php get_header(); ?>

<!-- This is the template that is executed for the search results. -->


<div class="search-results">

    <h1>Search Results for: <?php echo esc_html( get_search_query( false ) ); ?></h1><hr class="dotted-line">

    <?php if( have_posts() )  
        while( have_posts() ) : the_post(); ?>

            <a href="<?php the_permalink() ?>"><?php the_title();?></a>
            <p><?php the_content() ?></p>

            
        <?php endwhile;?>

    <?php the_posts_navigation();?>

</div>

<?php get_footer();?>
