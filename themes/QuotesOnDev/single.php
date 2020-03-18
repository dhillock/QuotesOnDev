
<!-- This is a copy-and-paste from home.php. It is executed if the user clicks on
Archive, and then Author...which is identical to the homepage. -->


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

            <q class = 'quote-content'>
                <?php the_content(); ?> 
            </q>

        </div>

        <div class="quote-section">

            <!-- If there is a source, put a comma and a space after the author's name -->
            <?php $quotesource = trim( get_post_meta( get_the_ID(), '_qod_quote_source', true ) ); ?>
            <?php  if( ! empty( $quotesource ) ){ ?>

                <span class="author"> &mdash; <?php echo the_title() . ",&nbsp;"; ?></span>

                <!-- if there is a source AND a link, add an "a" tag, otherwise, no a tag -->
                <?php $sourceurl = trim( get_post_meta( get_the_ID(), '_qod_quote_source_url', true ) ); ?>

                <?php  if( ! empty( $sourceurl ) ){ ?>

                    <div class="source">
                            <a class = "source-link" target = "new" href  = "<?php echo get_post_meta( get_the_ID(), '_qod_quote_source_url', true );?>" > 
                            <span> <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?></a> </span>
                    </div>

                <?php } else { ?>     

                    <div class="source">
                        <?php echo get_post_meta( get_the_ID(), '_qod_quote_source', true );?>
                    </div>

                <?php } ?>

            <?php } else { ?>

                <p class="author"> &mdash;
                    <?php echo the_title() ; ?>
                </p>

            <?php } ?>

        </div>

    <?php endforeach;?>

    <!-- The random quote generator button -->
    <button id="quote-button">Show Me Another!</button>

</section>

 </footer>

<!-- Footer -->
<?php get_footer();?>