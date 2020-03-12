<?php get_header(); ?>

<!-- Random quote loop -->
<div class="random-quote-home-page">

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
            <?php the_content(); ?> 
        </div>

        <!-- Display the random quote title -->
        <span class="author">- <?php the_title(); ?></span>
        
    <?php endforeach;?>

</div>

<!-- The random quote generator button -->
<button id="quote-button">Show Me Another!</button>

<div class = 'my-fonts'>
  <p> 1</p>
  <p> 2</p>
  <p> 3</p>
  <p> 4</p>
  <p> 5</p>
  <p class = 'test-font'> This is a test, Exo-Italic</p>

  <p style = "font-size: 2rem;background-color: white;font-family: Exo-Light; color: #000000;"> This is a test, Exo-Italic</p>
  <p style = "font-size: 2rem;background-color: white;font-family: Exo-Light-Italic; color: #000000;"> This is a test, Exo-Light-Italic</p>
  <p style = "font-size: 2rem;background-color: white;font-family: Exo-Medium; color: #000000;"> This is a test, Exo-Medium</p>
  <p style = "font-size: 2rem;background-color: white;font-family: Exo-Medium-Italic; color: #000000;"> This is a test, Exo-Medium-Italics</p>
  <p style = "font-size: 2rem;background-color: white;font-family: Exo-Light; color: #000000;"> About, Archives, Submit a Quote</p>

</div> 
  
</footer>


<!-- Footer -->
<?php get_footer();?>



