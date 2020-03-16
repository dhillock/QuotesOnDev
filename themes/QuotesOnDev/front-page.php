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

            <!-- If there is a source, put a comma and a space after the author's name -->
            <?php $quotesource = trim( get_post_meta( get_the_ID(), '_qod_quote_source', true ) ); ?>
            <?php  if( ! empty( $quotesource ) ){ ?>

                <span class="author">— <?php echo the_title() . ",&nbsp;"; ?></span>

                <!-- if there is a source and a link, do the "a" tag, otherwise, no a tag -->
                <?php $sourceurl = trim( get_post_meta( get_the_ID(), '_qod_quote_source_url', true ) ); ?>
                <!-- <?php echo 'hello: ' . $sourceurl ?> -->

                <?php  if( ! empty( $sourceurl ) ){ ?>

                    <div class="source">

                        <a href="class="source-link" target="new" <?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>" > 
                
                        <span><?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a></span>

                    </div>


               <?php } else { ?>

                    <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>

               <?php } ?>



                


            <?php } else { ?>

                <span class="author">— <?php echo the_title() ; ?></span>

            <?php } ?>



        </div>
        
    <?php endforeach;?>

    <!-- The random quote generator button -->
    <button id="quote-button">Show Me Another!</button>

</section>

 </footer>

<!-- Footer -->
<?php get_footer();?>
